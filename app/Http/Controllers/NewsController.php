<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::latest()->paginate(12);

        return view('page.admin.news.news', ['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();

        return view('page.admin.news.create_news', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'thumbnail' => 'required',
            'content' => 'required',
            'category' => 'required'
        ]);
        if ($request->hasFile('thumbnail')) {
            $path = $request->thumbnail->store('public/thumbnail');
            $thumbnail_url = str_replace('public/', '', $path);
        }
        $news = News::create([
            'title' => Str::title($request->title),
            'title_slug' => Str::slug($request->title, '-'),
            'thumbnail' => 'storage/' . $thumbnail_url,
            'content' => $request->content
        ]);
        $news->categories()->attach($request->category);
        return redirect()->route('news.index')->with('status', 'Berita Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $categories = Category::get();
        $news = News::where('title_slug', $slug)->firstOrFail();
        return view('page.visitor.news.detail_news', ['news' => $news, 'categories' => $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $news = News::find($id);
        $categories = Category::get();
        return view('page.admin.news.edit_news', [
            'news' => $news, 'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required'
        ]);
        $news = News::find($id);
        $thumbnail = Str::after($news->thumbnail, 'storage/');
        $update_news = [
            'title' => Str::title($request->title),
            'title_slug' => Str::slug($request->title, '-'),

            'content' => $request->content
        ];
        if ($request->hasFile('thumbnail')) {
            Storage::delete($thumbnail);
            $path = $request->thumbnail->store('public/thumbnail');
            $thumbnail_url = str_replace('public/', '', $path);
            $update_news['thumbnail'] =   'storage/' .  $thumbnail_url;
        }
        $news->update($update_news);
        $news->categories()->sync($request->category);
        return redirect()->route('news.index')->with('status', 'Berita Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::find($id);

        $thumbnail = Str::after($news->thumbnail, 'storage/');

        if ($thumbnail) {
            Storage::delete($thumbnail);
        }
        $news->delete();
        return redirect()->route('news.index')->with('status', 'Berita Berhasil Dihapus');
    }
}

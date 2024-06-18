<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

use function Laravel\Prompts\search;

class NewsController extends Controller
{
    public function index()
    {
        $news_baru = News::with("categories")->orderBy('created_at', 'desc')->get()->take(4)->values();
        $trendings = News::with("categories")->orderBy('created_at', 'desc')->get()->skip(4)->take(4)->values();
        $recomendation = News::with("categories")->orderBy('created_at', 'desc')->get()->skip(8)->take(4)->values();

        return response()->json(["status" => 200, "data" => ["news_baru" => $news_baru, "trendings" => $trendings, "recomendation" => $recomendation]], 200);
    }
    public function show(string $slug)
    {

        $news = News::with('comments')->with("categories")->where('title_slug', $slug)->firstOrFail();
        $newsArray = $news->toArray();
        $keysToUnset = ['email_verified_at', 'role', 'created_at', 'updated_at'];
        $pivotKeysToUnset = ['news_id', 'user_id', 'updated_at'];
        foreach ($newsArray['comments'] as &$comment) {
            foreach ($keysToUnset as $key) {
                unset($comment[$key]);
            }
            foreach ($pivotKeysToUnset as $key) {
                unset($comment['pivot'][$key]);
            }
        }
        return response()->json(["status" => 200, "data" => $newsArray], 200);
    }

    public function search(Request $request)
    {
        if ($request->has('berita')) {
            $searches =  News::with("categories")->where('title', 'like', '%' . $request->berita . '%')->orderBy('created_at', 'desc')->get();
            return response()->json(["status" => 200, "data" => $searches]);
        }
    }
}

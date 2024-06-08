<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CommentController;
use App\Models\News;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function (Request $request) {
    $categories = Category::get();
    $news_baru = News::latest()->first();
    $news_baru2 =  News::orderBy('created_at', 'desc')->skip(1)->take(4)->get();
    $trendings =  News::orderBy('created_at', 'desc')->skip(5)->take(4)->get();
    $untukmu1 =  News::orderBy('created_at', 'desc')->skip(9)->take(4)->get();
    $untukmu2 =  News::orderBy('created_at', 'desc')->skip(13)->first();
    return view('welcome', ['categories' => $categories, 'news_baru' => $news_baru, 'news_baru2' => $news_baru2, "trendings" => $trendings, "untukmu1" => $untukmu1, "untukmu2" => $untukmu2]);
})->name('welcome');
Route::get('/search', function (Request $request) {
    $categories = Category::get();
    if ($request->has('berita')) {
        if ($request->berita != "") {
            $searches =  News::where('title', 'like', '%' . $request->berita . '%')->paginate(10);
            return view('page.visitor.news.search_news', ['categories' => $categories, 'searches' => $searches]);
        } else {
            return redirect()->route('welcome');
        }
    }
})->name('search');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/news/{id}/comment', [CommentController::class, 'store'])->name('comment.store');
    Route::delete('/news/{comment_id}/{id}/comment', [CommentController::class, 'destroy'])->name('comment.destroy');
    Route::middleware(['role'])->group(function () {
        Route::resource('/admin/category', CategoryController::class)->except(['index', 'show']);
        Route::resource('/admin/news', NewsController::class)->except(['index', 'show']);
    });
});
Route::resource('/category', CategoryController::class)->only(['index', 'show'])->parameters([
    'category' => 'slug',
]);;
Route::resource('/news', NewsController::class)->only(['index', 'show'])->parameters([
    'news' => 'slug',
]);

require __DIR__ . '/auth.php';

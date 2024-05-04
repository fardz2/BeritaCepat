<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Middleware\UserRoleIsValid;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $categories = Category::get();

    return view('welcome', ['categories' => $categories]);
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::middleware(['role'])->group(function () {
        Route::resource('/admin/category', CategoryController::class)->except(['index', 'show']);
        Route::resource('/admin/news', NewsController::class)->except(['index', 'show']);
    });
});
Route::resource('/category', CategoryController::class)->only(['index', 'show']);
Route::resource('/news', NewsController::class)->only(['index', 'show'])->parameters([
    'news' => 'slug',
]);;

require __DIR__ . '/auth.php';

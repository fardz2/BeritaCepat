<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\NewsController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get('category', [CategoryController::class, 'index']);
Route::get('news', [NewsController::class, 'index']);
Route::get('news/{slug}', [NewsController::class, 'show']);
Route::get('search', [NewsController::class, 'search']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('news/{slug}/comment', [CommentController::class, 'store']);
    Route::delete('news/{comment_id}/comment', [CommentController::class, 'destroy']);
    Route::post('logout', [AuthController::class, 'logout']);
});

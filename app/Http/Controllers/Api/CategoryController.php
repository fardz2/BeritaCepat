<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();
        return response()->json(["status" => 200, "data" => $categories]);
    }

    public function show(String $slug)
    {
        $category_news = Category::with("news")->where("category_slug", $slug)->firstOrFail();

        return response()->json(["status" => 200, "data" => $category_news]);
    }
}

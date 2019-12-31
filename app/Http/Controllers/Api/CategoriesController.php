<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    // 获取分类
    public function index()
    {
        $category = Category::with('allChildren')->where('level', 0)->get();

        CategoryResource::wrap('data');
        return CategoryResource::collection($category);
    }
}

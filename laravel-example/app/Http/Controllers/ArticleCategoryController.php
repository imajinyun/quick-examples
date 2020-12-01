<?php

namespace App\Http\Controllers;

use App\Models\ArticleCategory;
use Illuminate\Http\Request;

class ArticleCategoryController extends Controller
{
    public function test(Request $request)
    {
        $id = $request->get('id');

        // 通过文章分类 ID 获取分类，关联文章
        $data = ArticleCategory::query()->with('articles:category_id,title,subtitle')->find($id);

        return response()->json($data);
    }

    public function index(Request $request)
    {
        $data = ArticleCategory::all();

        return response()->json($data);
    }

    public function show(Request $request, int $id)
    {
        $data = ArticleCategory::query()->find($id);

        return response()->json($data);
    }
}

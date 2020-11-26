<?php

namespace App\Http\Controllers;

use App\Models\ArticleCategory;
use Illuminate\Http\Request;

class ArticleCategoryController extends Controller
{
    public function test(Request $request)
    {
        $id = $request->get('id');
        $data = ArticleCategory::query()
            ->with(['articles' => function ($query) {
                $query->select(['id', 'category_id', 'title']);
            }])
            ->find($id);

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

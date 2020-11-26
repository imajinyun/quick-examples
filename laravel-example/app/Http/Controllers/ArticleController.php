<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $article = Article::with(['comments' => function ($query) {
            $query->select(['id', 'article_id', 'title']);
        }])
        ->with(['category' => function ($query) {
            $query->select(['id', 'name']);
        }])
        ->simplePaginate();

        return response()->json($article);
    }

    public function show(Request $request, int $id)
    {
        $article = Article::query()->find($id);

        return response()->json($article);
    }

    public function store(Request $request)
    {
        return response()->json([]);
    }

    public function update(Request $request)
    {
        return response()->json([]);
    }

    public function destroy(Request $request)
    {
        return response()->json([]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function test(Request $request)
    {
        $id = $request->get('id');
        $data = Article::with(['user', 'category', 'comments'])->find($id);

        return response()->json($data);
    }

    public function index(Request $request)
    {
        $article = Article::with(['user' => function ($query) {
            $query->select(['id', 'name']);
        }])
        ->with(['category' => function ($query) {
            $query->select(['id', 'name']);
        }])
        ->with(['comments' => function ($query) {
            $query->select(['id', 'article_id', 'title']);
        }])
        ->simplePaginate();

        return response()->json($article);
    }

    public function show(Request $request, int $id)
    {
        $article = Article::with(['user' => function ($query) {
            $query->select(['id', 'name']);
        }])
        ->with(['category' => function ($query) {
            $query->select(['id', 'name']);
        }])
        ->with(['comments' => function ($query) {
            $query->select(['id', 'article_id', 'title']);
        }])
        ->find($id);

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

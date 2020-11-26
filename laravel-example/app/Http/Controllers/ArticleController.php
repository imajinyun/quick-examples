<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function test(Request $request)
    {
        $id = $request->get('id');

        // 获取给定文章，并处理文章关联的用户、分类、评论
        $data = Article::with(['user', 'category', 'comments'])->find($id);

        // 获取给定文章的创作者
        $data = Article::find($id)->user;

        // 获取给定文章下的所有评论
        $data = Article::find($id)->comments;

        // 获取给定文章所属的分类
        $data = Article::find($id)->category;

        // 获取给定文章下的给定 ID 评论
        $data = Article::find($id)->comments->where('id', '18')->first();

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

<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function test(Request $request)
    {
        $id = $request->get('id');

        // 通过文章 ID 获取文章，关联用户、分类、评论
        $data = Article::with(['user', 'category', 'comments'])->find($id);

        // 通过文章 ID 获取文章的作者
        $data = Article::find($id)->user;

        // 通过文章 ID 获取文章的评论
        $data = Article::find($id)->comments;

        // 通过文章 ID 获取文章所属的分类
        $data = Article::find($id)->category;

        // 获取给定文章下的给定 ID 评论
        $data = Article::find($id)->comments->where('id', 3)->first();

        // 获取给定文章的图片
        $data = Article::find($id)->image;

        return response()->json($data);
    }

    public function index(Request $request)
    {
        $articles = Article::query()
            ->with('user:id,name')
            ->with('category:id,name')
            ->with('comments:id,article_id,title')
            ->simplePaginate();

        return response()->json($articles);
    }

    public function show(Request $request, int $id)
    {
        $article = Article::query()
            ->with('user:id,name')
            ->with('category:id,name')
            ->with('comments:id,article_id,title')
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

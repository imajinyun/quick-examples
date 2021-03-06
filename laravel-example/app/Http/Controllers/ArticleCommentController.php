<?php

namespace App\Http\Controllers;

use App\Models\ArticleComment;
use Illuminate\Http\Request;

class ArticleCommentController extends Controller
{
    public function test(Request $request)
    {
        $id = $request->get('id');

        // 获取给定的文章评论
        $data = ArticleComment::find($id);

        // 获取给定的文章评论所属的文章
        $data = ArticleComment::find($id)->article;

        return response()->json($data);
    }

    public function index()
    {
        $data = ArticleComment::query()
            ->with('article:id,title,subtitle')
            ->simplePaginate();

        return response()->json($data);
    }

    public function show(Request $request, int $id)
    {
        $data = ArticleComment::query()
            ->with('article:id,title,subtitle')
            ->with('user:id,name')
            ->find($id);

        return response()->json($data);
    }
}

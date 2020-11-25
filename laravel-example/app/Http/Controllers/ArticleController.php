<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $article = Article::with(['category' => function ($query) {
            $query->select(['id', 'name']);
        }])
        ->with(['user' => function ($query) {
            $query->select(['id', 'name']);
        }])
        ->paginate();
        return response()->json($article);
    }

    public function show()
    {
    }

    public function create()
    {
    }

    public function update()
    {
    }
}

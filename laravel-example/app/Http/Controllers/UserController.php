<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data = User::all();
        return response()->json($data);
    }

    public function show(Request $request, int $id)
    {
        $data = User::query()->with(['degree' => function ($query) {
            $query->select(['id', 'user_id', 'school_code', 'school_name']);
        }])->find($id);
        return response()->json($data);
    }
}

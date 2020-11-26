<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function test(Request $request)
    {
        $id = $request->get('id');

        // 获取给定用户的学位信息
        $data = User::query()->find($id)->degree;

        // 获取给定用户的角色
        $data = User::query()->find($id)->roles;

        // 获取给定用户按角色 ID 排序的角色信息
        $data = User::query()->find($id)->roles()->orderBy('id')->get();

        return response()->json($data);
    }

    public function index(Request $request)
    {
        $data = User::with(['degree' => function ($query) {
            $query->select(['id', 'user_id', 'school_code', 'school_name']);
        }])
        ->simplePaginate();

        return response()->json($data);
    }

    public function show(Request $request, int $id)
    {
        $data = User::query()->with(['degree' => function ($query) {
            $query->select(['id', 'user_id', 'school_code', 'school_name']);
        }])
        ->find($id);

        return response()->json($data);
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

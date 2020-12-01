<?php

namespace App\Http\Controllers;

use App\Models\UserDegree;
use Illuminate\Http\Request;

class UserDegreeController extends Controller
{
    public function test(Request $request)
    {
        $userId = $request->get('user_id');

        // 获取给定用户的学位
        $data = UserDegree::query()
            ->where('user_id', $userId)
            ->first();

        // 通过查询用户的学位获取用户
        $data = UserDegree::query()
            ->where('user_id', $userId)
            ->first()
            ->user;

        return response()->json($data);
    }

    public function index()
    {
        $data = UserDegree::query()
            ->with('user:id,name,phone,email')
            ->simplePaginate();

        return response()->json($data);
    }

    public function show(Request $request, int $id)
    {
        $data = UserDegree::query()
            ->with('user:id,name,phone,email')
            ->find($id);

        return response()->json($data);
    }
}

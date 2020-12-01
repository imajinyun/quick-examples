<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function test(Request $request)
    {
        $id = $request->get('id');

        // 获取给定用户的学位
        $data = User::query()->find($id)->degree;

        // 获取给定用户的角色
        $data = User::query()->find($id)->roles;

        $data = User::query()->find($id);
        foreach ($data->roles as $role) {
            // dd($role->userRolePivot->created_at);
        }

        return response()->json($data);
    }

    public function index(Request $request)
    {
        $data = User::query()
            ->with('degree:user_id,school_code,school_name,major_code,major_name')
            ->simplePaginate()
            ->appends('status');

        return response()->json($data);
    }

    public function show(Request $request, int $id)
    {
        $data = User::query()
            ->with('degree:user_id,school_code,school_name,major_code,major_name')
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

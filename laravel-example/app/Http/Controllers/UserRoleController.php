<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function test(Request $request)
    {
        $roleId = $request->get('role_id');

        // 通过角色 ID 获取角色
        $data = UserRole::query()->with('role:id,name')->where('role_id', $roleId)->get();

        // 通过角色 ID 获取用户
        $data = UserRole::query()->with('user:id,name')->where('role_id', $roleId)->get();

        // 通过角色 ID 获取用户和角色
        $data = UserRole::query()->with('user:id,name')->with('role:id,name')->where('role_id', $roleId)->get();

        return response()->json($data);
    }

    public function index()
    {
        $userRoles = UserRole::query()
            ->with('user:id,name')
            ->with('role:id,name')
            ->simplePaginate();

        return response()->json($userRoles);
    }

    public function show(Request $request, int $id)
    {
        $userRole = UserRole::query()
            ->with('user:id,name')
            ->with('role:id,name')
            ->find($id);

        return response()->json($userRole);
    }
}

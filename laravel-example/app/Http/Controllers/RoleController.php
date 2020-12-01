<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function test(Request $request)
    {
        $id = $request->get('id');

        // 通过角色 ID 获取角色列表，关联用户
        $data = Role::query()->with('users:id,name,email')->find($id);

        // 通过角色 ID 获取此角色下的所有用户
        $data = Role::query()->find($id)->users;

        return response()->json($data);
    }

    public function index()
    {
        $roles = Role::query()
            ->with('users:id,name')
            ->simplePaginate();

        return response()->json($roles);
    }

    public function show(Request $request, int $id)
    {
        $role = Role::query()
            ->with('users:id,name')
            ->find($id);

        return response()->json($role);
    }
}

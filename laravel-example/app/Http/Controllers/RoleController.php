<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function test(Request $request)
    {
        $id = $request->get('id');

        // 获取给定角色的所有用户
        $data = Role::query()
            ->with('users:id,name,email')
            ->find($id);

        return response()->json($data);
    }

    public function index()
    {
        $roles = Role::all();

        return response()->json($roles);
    }

    public function show(Request $request, int $id)
    {
        $role = Role::query()->find($id);

        return response()->json($role);
    }
}

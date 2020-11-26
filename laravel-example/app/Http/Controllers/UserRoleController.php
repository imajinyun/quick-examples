<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function test(Request $request)
    {
        $id = $request->get('id');

        // 获取给定角色的所属用户
        $data = UserRole::query()
            ->with('user:id,name')
            ->find($id);

        return response()->json($data);
    }

    public function index()
    {
        $userRoles = UserRole::query()
            ->get();

        return response()->json($userRoles);
    }

    public function show(Request $request, int $id)
    {
        $userRole = UserRole::query()->find($id);

        return response()->json($userRole);
    }
}

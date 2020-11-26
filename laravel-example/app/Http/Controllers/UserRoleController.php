<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
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

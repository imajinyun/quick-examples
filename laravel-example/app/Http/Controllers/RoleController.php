<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function test(Request $request)
    {
        return response()->json();
    }

    public function index()
    {
        return response()->json();
    }

    public function show(Request $request, int $id)
    {
        return response()->json();
    }
}

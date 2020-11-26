<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function test(Request $request)
    {
        $userId = $request->get('user_id');
        $data = User::query()->find($userId)->degree;

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

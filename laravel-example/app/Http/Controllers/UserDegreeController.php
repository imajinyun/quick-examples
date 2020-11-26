<?php

namespace App\Http\Controllers;

use App\Models\UserDegree;
use Illuminate\Http\Request;

class UserDegreeController extends Controller
{
    public function test(Request $request)
    {
        $id = $request->get('id');
        $data = UserDegree::query()->find($id)->user;

        return response()->json($data);
    }

    public function index()
    {
        $data = UserDegree::with(['user' => function ($query) {
            $query->select(['id', 'name', 'phone', 'email']);
        }])
        ->simplePaginate();

        return response()->json($data);
    }

    public function show(Request $request, int $id)
    {
        $data = UserDegree::query()->with(['user' => function ($query) {
            $query->select(['id', 'name', 'phone', 'email']);
        }])
        ->find($id);

        return response()->json($data);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function test(Request $request)
    {
        $id = $request->get('id');

        // 获取给定车主的信息
        $data = Owner::query()->find($id);

        return response()->json($data);
    }
}

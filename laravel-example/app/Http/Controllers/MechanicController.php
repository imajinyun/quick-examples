<?php

namespace App\Http\Controllers;

use App\Models\Mechanic;
use Illuminate\Http\Request;

class MechanicController extends Controller
{
    public function test(Request $request)
    {
        $id = $request->get('id');

        // 获取给定修车师信息
        $data = Mechanic::query()->find($id);

        // 获取给定修车师的车辆信息
        $data = Mechanic::query()->find($id)->carOwner;

        return response()->json($data);
    }

    public function index()
    {
        $mechanics = Mechanic::query()->simplePaginate();

        return response()->json($mechanics);
    }
}

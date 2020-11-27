<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function test(Request $request)
    {
        $id = $request->get('id');

        // 获取给定的国家
        $data = Country::query()->find($id);

        // 获取给定的国家的文章
        $data = Country::find($id)->articles;

        return response()->json($data);
    }
}

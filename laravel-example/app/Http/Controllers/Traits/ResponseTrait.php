<?php

namespace App\Http\Controllers\Traits;

trait ResponseTrait
{
    public static function success(
        array $data = [],
        string $message = 'Success',
        int $status = 200
    ) {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data
        ]);
    }

    public static function failure(
        array $data = [],
        string $message = 'Failure',
        int $status = 400
    ) {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data
        ]);
    }
}

<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

// This Class For Response Result To return Success or error based on status comes from api
class ResponsHelper
{

    // This Function To return Success result , string $message = 'Success'
    public static function success($data , int $code = 200): JsonResponse
    {
        return response()->json([
            // 'status' => $code,
            // 'message' => $message,
            'data' => $data
        ], $code);
    }

    // This Function To return Error result, string $message = 'Error'
    public static function error($data , int $code = 400): JsonResponse
    {
        return response()->json([
            // 'status' => $code,
            // 'message' => $message,
            'data' => $data
        ], $code);
    }
}

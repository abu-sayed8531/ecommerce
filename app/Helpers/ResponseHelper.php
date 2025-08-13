<?php

namespace App\Helpers;

class ResponseHelper
{
    public static function success($data = null, $message = 'success', $success = true, $code = 200,)
    {
        return response()->json([
            'data' => $data,
            'message' => $message,
            'success' => $success,
        ], $code);
    }

    public static function error(\Throwable $err, $success = false, $code = 400, $data = null)
    {
        $message = $err->getMessage();
        if (!app()->environment('local')) {
            $message = 'There is something wrong';
        }

        return response()->json([
            'data' => $data,
            'message' => $message,
            'success' => $success,

        ], $code);
    }
}

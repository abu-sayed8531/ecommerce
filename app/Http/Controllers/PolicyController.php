<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use GuzzleHttp\Psr7\Response;

class PolicyController extends Controller
{
    public function PolicyByType(Request $request)
    {
        try {
            $policy = Policy::where('type', '=', $request->type)->first();
            if (!$policy) {
                throw new \Exception('Policy not found for this given type.');
            }
            return ResponseHelper::success($policy, 'Policy retrieved successfully.');
        } catch (\Throwable $e) {
            return ResponseHelper::error($e);
        }
    }
}

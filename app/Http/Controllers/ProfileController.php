<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Models\CustomerProfile;
use Illuminate\Http\JsonResponse;

class ProfileController extends Controller
{
    public function  CreateProfile(Request $request): JsonResponse
    {
        try {
            $user_id = $request->get('user_id');
            //$request->merge(['user_id' => $user_id]);
            $data = CustomerProfile::updateOrCreate(
                ['user_id' => $user_id],
                $request->input(),

            );
            return ResponseHelper::success($data, ' Profile Created Successfully');
        } catch (\Throwable $e) {
            return ResponseHelper::error($e);
        }
    }
    public function ReadProfile(Request $request)
    {
        try {
            $user_id = $request->get('user_id');

            $data = CustomerProfile::where('user_id', $user_id)->with('user')->first();
            if (!$data) {
                throw new \Exception('Profile not found', 404);
            }
            return ResponseHelper::success($data, 'Profile Retrieved Successfully');
        } catch (\Throwable $e) {
            return ResponseHelper::error($e);
        }
    }
}

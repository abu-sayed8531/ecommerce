<?php

namespace App\Http\Controllers;

use App\Helpers\JWTToken;
use App\Models\User;
use App\Mail\OTPMail;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function login(Request $request)
    {
        try {
            $user_email = $request->user_email;

            $otp = rand(100000, 999999);
            $details = ['code' => $otp];
            Mail::to($user_email)->send(new OTPMail($details));
            $user =  User::updateOrCreate(['email' => $user_email], ['otp' => $otp]);
            return  ResponseHelper::success($user, "A 6 Digit OTP has been sent to your email address");
        } catch (\Throwable $e) {
            return ResponseHelper::error($e);
        }
    }

    public function VerifyLogin(Request $request)
    {
        try {

            $user_email = $request->user_email;
            $otp = $request->otp;
            //dd($user_email, $otp);
            $verification = User::where('email', $user_email)->where('otp', $otp)->first();
            if ($verification) {
                User::where(['email' => $user_email, 'otp' => $otp])->update(['otp' => '0']);
                $token = JWTToken::CreateToken($user_email, $verification->id);
                return ResponseHelper::success($verification, 'Login successful')->cookie('token', $token, 60 * 24 * 30);
            } else {
                throw new \Exception('Invalid OTP or email');
            }
        } catch (\Throwable $e) {
            return ResponseHelper::error($e);
        }
    }
    public function logout()
    {
        return ResponseHelper::success(null, 'Logout successful')->cookie('token', '', -1);
    }
}

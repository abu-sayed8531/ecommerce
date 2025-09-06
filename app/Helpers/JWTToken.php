<?php

namespace App\Helpers;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTToken
{

    public static function CreateToken($user_email, $user_id): string
    {
        $key = env('JWT_KEY');
        $payload = [
            'iss' => 'laravel-token',
            'iat' => time(),
            'exp' => time() + 30 *  24 * 60 * 60, // 30 days expiration
            'user_email' => $user_email,
            'user_id' => $user_id,
        ];
        return JWT::encode($payload, $key, 'HS256');
    }
    public static function VerifyToken($token): string|object
    {
        if (!$token) {
            return false;
        }
        return JWT::decode($token, new Key(env('JWT_KEY'), 'HS256'));
    }
}

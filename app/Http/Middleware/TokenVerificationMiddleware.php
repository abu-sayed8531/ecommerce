<?php

namespace App\Http\Middleware;

use App\Helpers\JWTToken;
use App\Helpers\ResponseHelper;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenVerificationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Here you can implement your token verification logic
        // For example, check if a token is present in the request headers
        $token = $request->cookie('token');
        $payload = JWTToken::verifyToken($token);
        if (!$payload) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized',
            ], 400);
        }

        $request->attributes->set('user_email', $payload->user_email);
        $request->attributes->set('user_id', $payload->user_id);
        return $next($request);
    }
}

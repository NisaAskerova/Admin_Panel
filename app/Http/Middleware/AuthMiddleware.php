<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // İstifadəçinin autentifikasiyasını yoxlayır
        if (!Auth::check()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized access',
            ], 401); // İstifadəçi daxil olmayıbsa, 401 qaytarır
        }

        return $next($request); // Əks halda davam edir
    }
}

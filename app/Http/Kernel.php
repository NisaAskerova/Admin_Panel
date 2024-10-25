<?php
namespace App\Http;

use App\Http\Middleware\Cors;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // Global middleware
    ];

    protected $middlewareGroups = [
        'web' => [
            // Web middleware
        ],

        'api' => [
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
         Cors::class, // CORS middleware burada
        ],
    ];

    protected $routeMiddleware = [
        // Route middleware
    ];
}

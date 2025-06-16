<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's route middleware.
     *
     * @var array<string, class-string>
     */
  protected $routeMiddleware = [
    'auth' => \App\Http\Middleware\Authenticate::class,
    'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
    'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
    'can' => \Illuminate\Auth\Middleware\Authorize::class,
    'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
    'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
    'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
    'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
    // 'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
    'approved' => \App\Http\Middleware\CheckUserApproved::class,
    'admin' => \App\Http\Middleware\AdminMiddleware::class, // 👈 Add this line
    // other middleware...
    // 'approved' => \App\Http\Middleware\Approved::class,
];



    // ... rest of the file
}
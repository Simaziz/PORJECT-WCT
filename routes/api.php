<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/login', function (Request $request) {
    $email = $request->input('email');
    $password = $request->input('password');

    if ($email === 'test@example.com' && $password === 'password123') {
        return response()->json([
            'status' => 'success',
            'message' => 'Login successful',
        ]);
    } else {
        return response()->json([
            'status' => 'error',
            'message' => 'Invalid email or password',
        ], 401);
    }
});

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        // Dummy check
        if ($email === 'test@example.com' && $password === 'password123') {
            return response()->json([
                'status' => 'success',
                'message' => 'Login successful',
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Invalid email or password',
        ], 401);
    }
}

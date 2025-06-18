<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $redirectTo = '/home';

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->status === 'rejected') {
                Auth::logout();
                return back()->with('error', 'Your account was rejected.');
            }

            // ✅ Role-based redirect
            if ($user->role === 'employer') {
                return redirect()->route('employer.dashboard')->with('message', 'Welcome, Employer!');
            }

            return redirect('/home')->with('message', 'Login successful!');
        }

        return back()->with('error', 'Invalid email or password.');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out.');
    }
}

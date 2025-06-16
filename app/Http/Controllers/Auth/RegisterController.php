<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Show registration form
    public function showForm()
    {
        return view('auth.register');
    }

    // Handle registration form submission
    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
        ]);

        // Create user
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Log the user in
        Auth::login($user);

        // Redirect to home with success message
        return redirect()->route('home')->with('success', 'Registration successful! Welcome.');
    }
}

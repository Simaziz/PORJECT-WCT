<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // ✅ Import the User model
use Illuminate\Support\Facades\Mail; // ✅ Import Mail
use App\Mail\AccountApprovedMail; // ✅ Import the mailable class

class AdminController extends Controller
{
    public function pendingUsers()
    {
        $users = User::where('is_approved', false)->get();
        return view('admin.pending-users', compact('users'));
    }

    public function approveUser($id)
    {
        $user = User::findOrFail($id);
        $user->update(['is_approved' => true]);

        // Notify user via email
        Mail::to($user->email)->send(new AccountApprovedMail($user));

        return back()->with('success', 'User approved!');
    }
}

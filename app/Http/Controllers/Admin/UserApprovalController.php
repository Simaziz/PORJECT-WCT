<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserApprovalController extends Controller
{
    public function index()
    {
        $pendingUsers = User::where('status', 'pending')->get();
        return view('admin.users.index', compact('pendingUsers'));
    }

    public function approve($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'approved';
        $user->save();

        return back()->with('success', 'User approved successfully.');
    }

    public function reject($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'rejected';
        $user->save();

        return back()->with('success', 'User rejected.');
    }
}

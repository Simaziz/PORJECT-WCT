<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $favorites = $user->favorites()->paginate(10);

        return view('favorites', compact('favorites'));
    }
}

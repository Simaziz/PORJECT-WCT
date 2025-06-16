<?php

// app/Http/Controllers/TodoController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('dashboard', compact('todos'));
    }
}


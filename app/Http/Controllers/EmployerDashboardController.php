<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployerDashboardController extends Controller
{
    public function index()
    {
        // Return your employer dashboard view here
        return view('employer.dashboard');
    }
}

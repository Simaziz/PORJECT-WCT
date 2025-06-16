<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function home()
    {
        $jobs = Job::paginate(10);
        return view('home', compact('jobs'));
    }

    public function search(Request $request)
    {
        $query = Job::query();

        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%$keyword%")
                  ->orWhere('company', 'like', "%$keyword%")
                  ->orWhere('category', 'like', "%$keyword%");
            });
        }

        if ($request->filled('location')) {
            $query->where('location', $request->input('location'));
        }

        $jobs = $query->paginate(10)->withQueryString();

        return view('home', compact('jobs'));
    }
}

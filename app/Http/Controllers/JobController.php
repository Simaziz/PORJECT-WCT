<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
    /**
     * Show paginated job listings.
     */
    public function index()
    {
        $jobs = Job::latest()->paginate(10);
        return view('home', compact('jobs'));
    }

    /**
     * Handle job search by keyword and location.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        $query = Job::query();

        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")
                  ->orWhere('company', 'like', "%{$keyword}%")
                  ->orWhere('category', 'like', "%{$keyword}%");
            });
        }

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        $jobs = $query->latest()
                      ->paginate(10)
                      ->withQueryString();

        return view('home', compact('jobs'));
    }

    /**
     * Show the "apply for this job" form.
     *
     * @param \App\Models\Job $job
     * @return \Illuminate\View\View
     */
    public function showApplyForm(Job $job)
    {
        return view('apply', compact('job'));
    }

    /**
     * Process the job application form submission.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Job $job
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitApplication(Request $request, Job $job)
    {
        $validated = $request->validate([
            'applicant_name'  => 'required|string|max:255',
            'applicant_email' => 'required|email|max:255',
            'cover_letter'    => 'nullable|string',
            'resume'          => 'nullable|file|mimes:pdf|max:2048',
        ]);

        // Store resume if uploaded
        if ($request->hasFile('resume')) {
            $validated['resume_path'] = $request->file('resume')->store('resumes', 'public');
        }

        // Save job application
        JobApplication::create([
            'job_id'          => $job->id,
            'user_id'         => Auth::id(),  // Optional: store logged-in user
            'applicant_name'  => $validated['applicant_name'],
            'applicant_email' => $validated['applicant_email'],
            'cover_letter'    => $validated['cover_letter'] ?? null,
            'resume_path'     => $validated['resume_path'] ?? null,
        ]);

        return redirect()
            ->route('jobs.apply.form', $job)
            ->with('success', 'Your application has been submitted!');
    }
}

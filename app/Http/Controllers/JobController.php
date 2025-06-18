<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;




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
            $loc = strtolower(trim($request->location));
            if ($loc !== 'non location' && $loc !== 'any') {
                $query->where('location', $request->location);
            }
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

        if ($request->hasFile('resume')) {
            $validated['resume_path'] = $request->file('resume')->store('resumes', 'public');
        }

        JobApplication::create([
            'job_id'          => $job->id,
            'user_id'         => Auth::id(),
            'applicant_name'  => $validated['applicant_name'],
            'applicant_email' => $validated['applicant_email'],
            'cover_letter'    => $validated['cover_letter'] ?? null,
            'resume_path'     => $validated['resume_path'] ?? null,
        ]);

        return redirect()
            ->route('jobs.apply.form', $job)
            ->with('success', 'Your application has been submitted!');
    }

    /**
     * Toggle job favorite status for the authenticated user.
     *
     * @param \App\Models\Job $job
     * @return \Illuminate\Http\RedirectResponse
     */
  public function toggleFavorite(Job $job)
{
    /** @var \App\Models\User|null $user */
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login')->with('error', 'Please login to favorite jobs.');
    }

    if ($user->favorites()->where('job_id', $job->id)->exists()) {
        $user->favorites()->detach($job->id);
    } else {
        $user->favorites()->attach($job->id);
    }

    return back();
}
public function favorites()
{
    /** @var \App\Models\User $user */
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login')->with('error', 'Please log in to view favorites.');
    }

    $favorites = $user->favorites()->latest()->paginate(10);

    return view('favorites', compact('favorites'));
}



}

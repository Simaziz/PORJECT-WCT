<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Storage;

class JobApplicationController extends Controller
{
    public function store(Request $request, Job $job)
    {
        $validated = $request->validate([
            'applicant_name' => 'required|string|max:255',
            'applicant_email' => 'required|email|max:255',
            'cover_letter' => 'nullable|string',
            'resume' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        if ($request->hasFile('resume')) {
            $path = $request->file('resume')->store('resumes', 'public');
            $validated['resume'] = $path;
        }

        $validated['job_id'] = $job->id;

        JobApplication::create($validated);

        return redirect()->back()->with('success', 'Your application has been submitted!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;


class EmployerJobController extends Controller
{
    /**
     * Show the job creation form for employers.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('employer.jobs.create');
    }

    /**
     * Handle the submission of a new job posting.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
  public function store(Request $request)
{
 $validated = $request->validate([
    'title' => 'required|string|max:255',
    'company' => 'required|string|max:255',
    'location' => 'required|string|max:255',
    'description' => 'required|string',
    'employment_type' => 'required|string|max:255',
    'category' => 'required|string|max:255',
    'level' => 'required|string|max:255',  // Add this line
]);

$job = new Job();
$job->title = $validated['title'];
$job->company = $validated['company'];
$job->location = $validated['location'];
$job->description = $validated['description'];
$job->employment_type = $validated['employment_type'];
$job->category = $validated['category'];
$job->level = $validated['level'];    // Set level here
$job->user_id = Auth::id();
$job->save();


    return redirect()->route('employer.dashboard')->with('message', 'Job posted successfully!');
}

}

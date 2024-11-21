<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Application;
use Illuminate\Http\Request;

class EmployeeJobController extends Controller
{
    /**
     * Show the employee dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        return view('employee.jobs.dashboard');
    }

    /**
     * Display a listing of all active jobs.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $jobs = Job::where('is_active', true)->paginate(10); // Paginate active jobs
        return view('employee.jobs.index', compact('jobs'));
    }

    /**
     * Display the specified job details.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\View\View
     */
    public function show(Job $job)
    {
        // Only show active jobs
        if (!$job->is_active) {
            abort(404, 'Job not found.');
        }

        return view('employee.jobs.show', compact('job'));
    }

    /**
     * Show the form to apply for the specified job.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\View\View
     */
    public function applyForm(Job $job)
    {
        // Check if job is active before showing the apply form
        if (!$job->is_active) {
            abort(404, 'Job not available for application.');
        }

        return view('employee.jobs.apply', compact('job'));
    }

    /**
     * Apply for the specified job.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\RedirectResponse
     */
    public function apply(Request $request, $id)
{
    $job = Job::where('id', $id)->where('is_active', true)->firstOrFail();

    // Check if the employee has already applied
    $existingApplication = Application::where('job_id', $job->id)
        ->where('employee_id', $request->employee_id)
        ->first();

    if ($existingApplication) {
        return redirect()->back()->with('error', 'You have already applied for this job.');
    }

    // Validate the input
    $request->validate([
        'resume' => 'required|mimes:pdf,doc,docx|max:2048', // Only allow PDF, DOC, DOCX files
    ]);

    // Handle the file upload
    // if ($request->hasFile('resume')) {
        $resumePath = $request->file('resume')->store('resumes', 'public');
    // }

    // Create a new application
    Application::create([
        'job_id' => $job->id,
        'employee_id' => $request->employee_id,
        'resume' => $resumePath , // Save the file path in the database
    ]);

    return redirect()->route('employee.jobs.index')->with('success', 'You have successfully applied for the job!');
}



    public function create(Job $job)
    {
        return view('employee.jobs.create', compact('job'));
    }


    public function store(Request $request, Job $job)
    {
        $request->validate([
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);
    
        // Save the resume
        $resumePath = $request->file('resume')->store('resumes', 'public');
    
        // Create an application record
        Application::create([
            'job_id' => $job->id,
            'employee_id' => auth()->id(), // Assuming authentication is in place
            'resume' => $resumePath,
        ]);
    
        return redirect()->route('employee.jobs.index')->with('success', 'You have successfully applied for the job!');
    }
    


}



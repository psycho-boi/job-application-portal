<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class EmployerJobController extends Controller
{
    public function dashboard()
    {
        // Fetch jobs posted by the employer (assuming no authentication, just showing all jobs)
        // $jobs = Job::where('is_active', true)->get(); // Get all active jobs

        return view('employer.jobs.dashboard');
    }



    public function index()
    {
    $jobs = Job::all(); // Fetch all jobs
    return view('employer.jobs.index', compact('jobs')); // Send the jobs to the view
    }



    // Show the form to create a new job
    public function create()
    {
        return view('employer.jobs.create');
    }

    // Store a newly created job
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Job::create([
            'title' => $request->title,
            'company_name' => $request->company_name,
            'location' => $request->location,
            'description' => $request->description,
            'is_active' => true,  
        ]);

        return redirect()->route('employer.dashboard')->with('success', 'Job posted successfully!');
    }

    // Show the form to edit a job
    public function edit(Job $job)
    {
        return view('employer.jobs.edit', compact('job'));
    }

    // Update an existing job
    public function update(Request $request, Job $job)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $job->update([
            'title' => $request->title,
            'company_name' => $request->company_name,
            'location' => $request->location,
            'description' => $request->description,
        ]);

        return redirect()->route('jobs.index')->with('success', 'Job updated successfully!');
    }

    // Delete a job
    public function destroy(Job $job)
    {
        $job->update(['is_active' => false]); // Don't delete, just mark as inactive
        return redirect()->route('employer.dashboard')->with('success', 'Job removed successfully!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    // List all jobs for the employer
    public function index()
    {
        $jobs = Job::all(); // Fetch all jobs for the logged-in employer
        return view('employer.jobs.index', compact('jobs'));
    }

    // Show form to create a new job
    public function create()
    {
        return view('employer.jobs.create');
    }

    // Store a new job in the database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
        ]);

        Job::create([
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'company_name' => $request->company_name,
            'is_active' => true,
        ]);

        return redirect()->route('employer.jobs.index')->with('success', 'Job posted successfully!');
    }

    // Show form to edit a job
    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('employer.jobs.edit', compact('job'));
    }

    // Update a job in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
        ]);

        $job = Job::findOrFail($id);
        $job->update($request->all());

        return redirect()->route('employer.jobs.index')->with('success', 'Job updated successfully!');
    }

    // Toggle job active/inactive status
    public function toggleActive($id)
    {
        $job = Job::findOrFail($id);
        $job->is_active = !$job->is_active;
        $job->save();

        return redirect()->route('employer.jobs.index')->with('success', 'Job status updated!');
    }
}

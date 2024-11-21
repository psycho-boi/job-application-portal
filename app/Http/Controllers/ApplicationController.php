<?php

namespace App\Http\Controllers;
use App\Models\Application;

use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'job_id' => 'required|exists:jobs,id',
        'resume' => 'required|mimes:pdf|max:2048',
    ]);

    $filePath = $request->file('resume')->store('resumes');

    Application::create([
        'job_id' => $request->job_id,
        'user_id' => auth()->id(),
        'resume' => $filePath,
    ]);

    return redirect()->back()->with('success', 'Application submitted successfully.');
}

}

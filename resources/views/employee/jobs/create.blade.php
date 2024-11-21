@extends('employee.layouts.app')

@section('content')
<div class="container">
    <h1>{{ $job->title }}</h1>
    <p><strong>Company:</strong> {{ $job->company_name }}</p>
    <p><strong>Location:</strong> {{ $job->location }}</p>
    <p><strong>Description:</strong> {{ $job->description }}</p>

    <!-- Display success or error messages -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Job application form -->
    <form action="{{ route('employee.jobs.apply', $job->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="resume">Upload Resume (PDF, DOC, DOCX)</label>
            <input type="file" class="form-control" id="resume" name="resume" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Apply</button>
    </form>
</div>
@endsection

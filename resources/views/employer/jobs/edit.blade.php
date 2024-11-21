@extends('employer.layouts.app')

@section('content')
<div class="container">
    <h1>Edit Job</h1>
    <form action="{{ route('employer.jobs.update', $job->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Job Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $job->title }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Job Description</label>
            <textarea name="description" id="description" class="form-control" rows="5" required>{{ $job->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ $job->location }}" required>
        </div>
        <div class="mb-3">
            <label for="company_name" class="form-label">Company Name</label>
            <input type="text" name="company_name" id="company_name" class="form-control" value="{{ $job->company_name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Job</button>
    </form>
</div>
@endsection

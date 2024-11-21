@extends('employee.layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
        <div class="col-12">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h1 class="h3 mb-0">{{ $job->title }}</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <h5 class="text-muted">Job Details</h5>
                                <p><strong>Company:</strong> {{ $job->company_name }}</p>
                                <p><strong>Location:</strong> {{ $job->location }}</p>
                            </div>
                            
                            <div class="mb-3">
                                <h5 class="text-muted">Description</h5>
                                <p class="text-justify">{{ $job->description }}</p>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Quick Actions</h5>
                                    <a href="{{ route('employee.jobs.create', $job->id) }}" class="btn btn-primary w-100 mb-2">Apply Now</a>
                                    
                                    <a href="{{ route('employee.jobs.index') }}" class="btn btn-outline-secondary w-100">
                                        <i class="bi bi-arrow-left me-2"></i>Back to Job Listings
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .text-justify {
        text-align: justify;
    }
</style>
@endsection
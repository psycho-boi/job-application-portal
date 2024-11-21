@extends('employer.layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="display-5">Employer Name</h1>
                <a href="#" class="btn btn-outline-secondary">Edit Profile</a>
            </div>

            @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card border-primary h-100 shadow-sm">
                        <div class="card-body text-center">
                            <i class="bi bi-briefcase-fill text-primary mb-3" style="font-size: 3rem;"></i>
                            <h5 class="card-title">Total Jobs</h5>
                            <p class="card-text display-6">{{ $totalJobs ?? 0 }}</p>
                            <a href="{{ route('employer.jobs.index') }}" class="btn btn-primary">Manage Jobs</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="card border-success h-100 shadow-sm">
                        <div class="card-body text-center">
                            <i class="bi bi-check-circle-fill text-success mb-3" style="font-size: 3rem;"></i>
                            <h5 class="card-title">Active Jobs</h5>
                            <p class="card-text display-6">{{ $activeJobs ?? 0 }}</p>
                            <a href="#" class="btn btn-success">View Active</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="card border-warning h-100 shadow-sm">
                        <div class="card-body text-center">
                            <i class="bi bi-clock-fill text-warning mb-3" style="font-size: 3rem;"></i>
                            <h5 class="card-title">Pending Jobs</h5>
                            <p class="card-text display-6">{{ $pendingJobs ?? 0 }}</p>
                            <a href="#" class="btn btn-warning">Review Pending</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-4 shadow-sm">
                <div class="card-header bg-light">
                    <h4 class="mb-0">Quick Actions</h4>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <a href="{{ route('employer.jobs.create') }}" class="btn btn-outline-primary w-100">
                                <i class="bi bi-plus-circle me-2"></i>Post New Job
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="#" class="btn btn-outline-secondary w-100">
                                <i class="bi bi-file-earmark-text me-2"></i>View Applications
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="#" class="btn btn-outline-info w-100">
                                <i class="bi bi-graph-up me-2"></i>Job Performance
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
</style>
@endsection

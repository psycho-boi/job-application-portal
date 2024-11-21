@extends('employee.layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="display-5">Employee Dashboard</h1>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card border-primary h-100 shadow-sm">
                        <div class="card-body text-center">
                            <i class="bi bi-briefcase-fill text-primary mb-3" style="font-size: 3rem;"></i>
                            <h5 class="card-title">Available Jobs</h5>
                            <p class="card-text display-6">{{ $availableJobs ?? 0 }}</p>
                            <a href="{{ route('employee.jobs.index') }}" class="btn btn-primary">Browse Jobs</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="card border-success h-100 shadow-sm">
                        <div class="card-body text-center">
                            <i class="bi bi-check-circle-fill text-success mb-3" style="font-size: 3rem;"></i>
                            <h5 class="card-title">Applied Jobs</h5>
                            <p class="card-text display-6">{{ $appliedJobs ?? 0 }}</p>
                            <a href="#" class="btn btn-success">My Applications</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="card border-warning h-100 shadow-sm">
                        <div class="card-body text-center">
                            <i class="bi bi-clock-fill text-warning mb-3" style="font-size: 3rem;"></i>
                            <h5 class="card-title">Pending Responses</h5>
                            <p class="card-text display-6">{{ $pendingResponses ?? 0 }}</p>
                            <a href="#" class="btn btn-warning">View Status</a>
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
                            <a href="#" class="btn btn-outline-primary w-100">
                                <i class="bi bi-person me-2"></i>Update Profile
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="#" class="btn btn-outline-secondary w-100">
                                <i class="bi bi-file-earmark-text me-2"></i>Manage Resume
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="#" class="btn btn-outline-info w-100">
                                <i class="bi bi-star me-2"></i>Job Recommendations
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
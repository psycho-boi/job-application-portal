@extends('employee.layouts.app')

@section('content')
<style>
    :root {
        --primary-color: #3498db;
        --secondary-color: #2ecc71;
        --accent-color: #e74c3c;
        --background-color: #f4f6f7;
        --card-shadow: rgba(0, 0, 0, 0.15);
    }

    .job-card {
        transition: all 0.3s ease;
        border: 1px solid rgba(0, 0, 0, 0.1);
        background-color: white;
        box-shadow: 0 4px 6px var(--card-shadow);
    }

    .job-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
    }

    .job-card-featured {
        border-left: 5px solid var(--accent-color);
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% { box-shadow: 0 0 0 0 rgba(231, 76, 60, 0.4); }
        70% { box-shadow: 0 0 0 10px rgba(231, 76, 60, 0); }
        100% { box-shadow: 0 0 0 0 rgba(231, 76, 60, 0); }
    }

    .dropdown-menu {
        background-color: white;
        border: 1px solid var(--primary-color);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)) !important;
        color: white !important;
    }

    .btn-outline-light {
        color: white !important;
        border-color: rgba(255, 255, 255, 0.5);
    }

    .btn-outline-light:hover {
        background-color: rgba(255, 255, 255, 0.2);
    }

    .job-action-btn-group .btn {
    transition: all 0.3s ease;
    font-weight: 500;
    letter-spacing: 0.5px;
    border-width: 2px;
    line-height: 1.2;
}

    .job-action-btn-group .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }

    .job-action-btn-group .btn-outline-primary {
        color: var(--primary-color);
        border-color: var(--primary-color);
    }

    .job-action-btn-group .btn-outline-primary:hover {
        background-color: var(--primary-color);
        color: white;
    }

    .job-action-btn-group .btn-primary {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }

    .job-action-btn-group .btn-primary:hover {
        background-color: #2980b9;
        border-color: #2980b9;
    }
</style>

<div class="container-fluid px-4 py-5">
    <div class="row">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="col-12 col-xl-10 offset-xl-1">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center">
                    <h2 class="h4 mb-0">
                        <i class="bi bi-briefcase me-2"></i>Explore Job Opportunities
                    </h2>
                    <div class="d-flex align-items-center">
                        <div class="dropdown me-3">
                            <button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <i class="bi bi-filter me-1"></i>Filters
                            </button>
                            <div class="dropdown-menu dropdown-menu-end p-3" style="min-width: 250px;">
                                <div class="mb-3">
                                    <label class="form-label">Location</label>
                                    <select class="form-select" id="locationFilter">
                                        <option value="">All Locations</option>
                                        <!-- Location options would be dynamically populated -->
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Job Type</label>
                                    <select class="form-select" id="typeFilter">
                                        <option value="">All Types</option>
                                        <option value="Full-time">Full-time</option>
                                        <option value="Part-time">Part-time</option>
                                        <option value="Remote">Remote</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Sort By</label>
                                    <select class="form-select" id="sortFilter">
                                        <option value="newest">Newest First</option>
                                        <option value="oldest">Oldest First</option>
                                        <option value="featured">Featured First</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="input-group" style="width: 250px;">
                            <span class="input-group-text bg-white border-end-0"><i class="bi bi-search"></i></span>
                            <input type="search" class="form-control border-start-0" id="jobSearch" placeholder="Search jobs...">
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row" id="jobListingsContainer">
                        @forelse($jobs as $job)
                            <div class="col-md-4 mb-4 job-card-wrapper" 
                                 data-location="{{ $job->location }}" 
                                 data-type="{{ $job->type }}"
                                 data-title="{{ $job->title }}">
                                <div class="card job-card h-100 {{ $job->is_featured ? 'job-card-featured' : '' }}">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-start mb-3">
                                            <h5 class="card-title mb-0">
                                                @if($job->is_featured)
                                                    <span class="badge bg-warning text-dark me-2" title="Featured Job">
                                                        <i class="bi bi-star-fill"></i>
                                                    </span>
                                                @endif
                                                {{ $job->title }}
                                            </h5>
                                        </div>
                                        <p class="card-text text-muted mb-2">
                                            <i class="bi bi-building me-2"></i>{{ $job->company_name }}
                                        </p>
                                        <p class="card-text">
                                            <i class="bi bi-geo-alt me-2"></i>{{ $job->location }}
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <small class="text-muted">
                                                <i class="bi bi-clock me-1"></i>{{ $job->created_at->diffForHumans() }}
                                            </small>
                                            <div class="job-action-btn-group d-flex gap-1 align-items-center">
                                                <a href="{{ route('employee.jobs.show', $job->id) }}" 
                                                   class="btn btn-outline-primary btn-sm d-flex align-items-center rounded-pill px-2 py-1 text-decoration-none" style="font-size: 0.75rem;">
                                                    <i class="bi bi-info-circle me-1"></i>
                                                    <span class="btn-text">Details</span>
                                                </a>
                                                <a href="{{ route('employee.jobs.create', $job->id) }}" 
                                                   class="btn btn-primary btn-sm d-flex align-items-center rounded-pill px-2 py-1 text-decoration-none" style="font-size: 0.75rem;">
                                                    <i class="bi bi-send me-1"></i>
                                                    <span class="btn-text">Apply</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="alert alert-info text-center">
                                    <i class="bi bi-info-circle me-2"></i>
                                    No jobs available at the moment. Check back later!
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-between align-items-center">
                    <div>
                        {{ $jobs->links('pagination::bootstrap-5') }}
                    </div>
                    <small class="text-muted">
                        Showing {{ $jobs->firstItem() }} - {{ $jobs->lastItem() }} of {{ $jobs->total() }} jobs
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
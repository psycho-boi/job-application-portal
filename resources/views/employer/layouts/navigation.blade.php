<style>
    .nav-item {
        transition: transform 0.3s ease, color 0.3s ease;
    }
    .nav-item:hover {
        transform: scale(1.05);
        color: #007bff;
    }
    .navbar-brand {
        transition: all 0.3s ease;
    }
    
    .navbar {
        animation: fadeInDown 0.7s ease;
    }
    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .logout-btn {
        transition: all 0.3s ease;
    }
    .logout-btn:hover {
        background-color: #dc3545;
        color: white;
        border-radius: 20px;
        transform: scale(1.05);
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ route('employer.dashboard') }}" class="nav-link">
            Employer Dashboard
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('employer.jobs.index') }}">My Jobs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('employer.jobs.create') }}">Create Job</a>
                </li>
                <li class="nav-item logout-btn">
                    <a class="nav-link" href="#">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
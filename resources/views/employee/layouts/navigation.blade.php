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
    
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('employee.dashboard') }}">
            Employee Dashboard
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
                    <a class="nav-link" href="{{ route('employee.dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('employee.jobs.index') }}">Job Listings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="#" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="#" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
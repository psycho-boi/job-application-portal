<?php


use App\Http\Controllers\JobController;
use App\Http\Controllers\EmployerJobController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeJobController;

Route::get('/', function () {
    return redirect()->route('employee.dashboard');
});

Route::prefix('employee')->group(function () {
    Route::get('/', [EmployeeJobController::class, 'dashboard'])->name('employee.dashboard');
    Route::get('/jobs', [EmployeeJobController::class, 'index'])->name('employee.jobs.index');
    Route::get('/jobs/{job}', [EmployeeJobController::class, 'show'])->name('employee.jobs.show');
    Route::get('/jobs/{job}/apply', [EmployeeJobController::class, 'create'])->name('employee.jobs.create'); 
    Route::post('/jobs/{job}/apply', [EmployeeJobController::class, 'store'])->name('employee.jobs.apply');

});


// Job Routes for Employers (CRUD)
Route::prefix('employer')->name('employer.')->group(function () {
    Route::get('/', [EmployerJobController::class, 'dashboard'])->name('dashboard');
    Route::get('jobs', [EmployerJobController::class, 'index'])->name('jobs.index');
    Route::get('jobs/create', [EmployerJobController::class, 'create'])->name('jobs.create');
    Route::post('jobs', [EmployerJobController::class, 'store'])->name('jobs.store');
    Route::get('jobs/{job}/edit', [EmployerJobController::class, 'edit'])->name('jobs.edit');
    Route::put('jobs/{job}', [EmployerJobController::class, 'update'])->name('jobs.update');
    Route::delete('jobs/{job}', [EmployerJobController::class, 'destroy'])->name('jobs.destroy');
});

// // Job Routes for Applicants (Viewing Jobs and Applications)
// Route::prefix('jobs')->name('jobs.')->group(function () {
//     // View all job listings
//     Route::get('/', [JobController::class, 'index'])->name('index');

//     // Job Application
//     Route::get('/{job}', [JobController::class, 'show'])->name('show');
//     Route::post('/apply', [JobController::class, 'apply'])->name('apply');
// });

// // Job Listings for Non-authenticated Users
// Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index'); // Public access to jobs listings

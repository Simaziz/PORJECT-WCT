<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobApplicationController;
use App\Models\Job; // if needed somewhere else, keep it
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployerJobController;
use App\Http\Controllers\EmployerDashboardController;



Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/employer/dashboard', function () {
        return view('employer.dashboard'); // This should match the file in resources/views/employer/dashboard.blade.php
    })->name('employer.dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/jobs/create', [EmployerJobController::class, 'create'])->name('jobs.create');
    Route::post('/jobs', [EmployerJobController::class, 'store'])->name('jobs.store');
});



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
// Route::middleware(['auth'])->group(function () {
//     Route::get('/home', [JobController::class, 'index'])->name('home');
// });
// use App\Models\Job;

// Route::get('/home', function () {
//     $jobs = Job::paginate(10);
//     return view('home', compact('jobs'));
// });
Route::middleware(['auth'])->prefix('employer')->name('employer.')->group(function () {
    Route::get('/dashboard', [EmployerDashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
});
// Route::get('/dashboard', function () {
//     return view('dashboard'); // Make sure resources/views/dashboard.blade.php exists
// })->name('dashboard')->middleware('auth');
Route::middleware(['auth'])->prefix('employer')->name('employer.')->group(function () {
    Route::get('/dashboard', [EmployerDashboardController::class, 'index'])->name('dashboard');
    // Other employer routes here...
});


Route::get('/favorites', [JobController::class, 'favorites'])->name('jobs.favorites');

Route::post('/jobs/{job}/favorite', [JobController::class, 'toggleFavorite'])
    ->middleware('auth')
    ->name('jobs.favorite');
// Route::post('/jobs/{job}/favorite', [JobController::class, 'favorite'])->name('jobs.favorite');

    Route::post('/jobs/{job}/apply', [JobApplicationController::class, 'store'])->name('jobs.apply');

// ✅ Keep this — with auth protection
Route::get('/', [JobController::class, 'home'])->name('home');

// Show apply form for a job
Route::get('/jobs/{job}/apply', [JobController::class, 'showApplyForm'])->name('jobs.apply.form');

// Handle form submission (apply job POST)
Route::post('/jobs/{job}/apply', [JobController::class, 'submitApplication'])->name('jobs.apply');


// Route::get('/jobs/{job}/apply', [JobController::class, 'showApplyForm'])->name('jobs.apply.form');

Route::middleware('auth')->group(function () {
    Route::get('/home', [JobController::class, 'index'])->name('home');
    Route::get('/jobs/search', [JobController::class, 'search'])->name('jobs.search');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

// Route::get('/test', function () {
//     return view('home');
// });
Route::middleware(['auth'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
});


// Homepage or welcome page (guest)
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Guest-only routes: register and login
Route::middleware('guest')->group(function () {
    // Registration routes
   Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

    // Login routes
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

// Authenticated-only routes
Route::middleware('auth')->group(function () {
    // Logout route
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // use App\Http\Controllers\JobController;

// Route::get('/home', [JobController::class, 'home'])->name('home');

    // Home page after login, loads jobs
    Route::get('/home', [JobController::class, 'index'])->name('home');

    // Job search route
    Route::get('/jobs/search', [JobController::class, 'search'])->name('jobs.search');

    // You can add more authenticated routes here if you want
});

// If you want a fallback route or other custom routes, add here

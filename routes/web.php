<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ScholarshipsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', function () {
    return match (auth()->user()->getRoleNames()->first()) {
        'admin' => redirect()->route('admin.scholarships.index'),
        'applicant' => view('dashboard'),
        'scholar' => view('dashboard'),
        default => redirect()->route('welcome'),
    };
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated user routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/my-scholarships', [ScholarshipsController::class, 'index'])->name('scholarships.index');
    Route::get('/scholarships/{scholarship}', [ScholarshipsController::class, 'show'])->name('scholarships.show');

    // Application routes
    Route::name('applications.')->prefix('applications')->group(function () {
        Route::get('/', [ApplicationController::class, 'index'])->name('index');
        Route::get('{application}', [ApplicationController::class, 'show'])->name('show');
        Route::post('{application}/withdraw', [ApplicationController::class, 'withdraw'])->name('withdraw');
    });

    // Apply to scholarship routes
    Route::get('/scholarships/{scholarship}/apply', [ApplicationController::class, 'create'])->name('scholarships.apply.create');
    Route::post('/scholarships/{scholarship}/apply', [ApplicationController::class, 'store'])->name('scholarships.apply.store');
});

require __DIR__.'/auth.php';
require __DIR__.'/public.php';
require __DIR__.'/admin.php';

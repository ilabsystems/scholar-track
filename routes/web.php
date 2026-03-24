<?php

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
});

require __DIR__.'/auth.php';
require __DIR__.'/public.php';
require __DIR__.'/admin.php';

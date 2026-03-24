<?php

use App\Http\Controllers\Admin\ScholarshipController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {

    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::name('admin.scholarships.')->prefix('admin/scholarships')->group(function () {
        Route::get('/', [ScholarshipController::class, 'index'])->name('index');
        Route::get('/create', [ScholarshipController::class, 'create'])->name('create');
        Route::post('/', [ScholarshipController::class, 'store'])->name('store');
        Route::get('/{scholarship}', [ScholarshipController::class, 'show'])->name('show');
        Route::get('/{scholarship}/edit', [ScholarshipController::class, 'edit'])->name('edit');
        Route::put('/{scholarship}', [ScholarshipController::class, 'update'])->name('update');
        Route::delete('/{scholarship}', [ScholarshipController::class, 'destroy'])->name('destroy');
    });
});

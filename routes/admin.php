<?php

use App\Http\Controllers\Admin\ScholarshipController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::name('profile.applicant.')->prefix('profile/applicant')->group(function () {
        Route::get('/', [ProfileController::class, 'editApplicant'])->name('edit');
        Route::patch('/', [ProfileController::class, 'updateApplicant'])->name('update');
    });

    Route::name('admin.scholarships.')->prefix('admin/scholarships')->group(function () {
        Route::get('/', [ScholarshipController::class, 'index'])->name('index');
        Route::get('/create', [ScholarshipController::class, 'create'])->name('create');
        Route::post('/', [ScholarshipController::class, 'store'])->name('store');
        Route::get('/{scholarship}', [ScholarshipController::class, 'show'])->name('show');
        Route::get('/{scholarship}/edit', [ScholarshipController::class, 'edit'])->name('edit');
        Route::put('/{scholarship}', [ScholarshipController::class, 'update'])->name('update');
        Route::delete('/{scholarship}', [ScholarshipController::class, 'destroy'])->name('destroy');
    });

    Route::name('admin.users.')->prefix('admin/users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/{user}/edit-roles', [UserController::class, 'editRoles'])->name('edit-roles');
        Route::post('/{user}/roles', [UserController::class, 'updateRoles'])->name('update-roles');
    });
});

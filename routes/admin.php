<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ScholarshipController;
use App\Http\Controllers\Admin\SettingController;
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

    Route::prefix('admin')->name('admin.')->middleware('role:admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
        Route::patch('/settings/password', [SettingController::class, 'updatePassword'])->name('settings.update-password');
        Route::patch('/settings/notifications', [SettingController::class, 'updateNotifications'])->name('settings.update-notifications');

        Route::name('scholarships.')->prefix('scholarships')->group(function () {
            Route::get('/', [ScholarshipController::class, 'index'])->name('index');
            Route::get('/create', [ScholarshipController::class, 'create'])->name('create');
            Route::post('/', [ScholarshipController::class, 'store'])->name('store');
            Route::get('/{scholarship}', [ScholarshipController::class, 'show'])->name('show');
            Route::get('/{scholarship}/edit', [ScholarshipController::class, 'edit'])->name('edit');
            Route::put('/{scholarship}', [ScholarshipController::class, 'update'])->name('update');
            Route::delete('/{scholarship}', [ScholarshipController::class, 'destroy'])->name('destroy');
        });

        Route::resource('roles', RoleController::class)->names('roles');
        Route::resource('permissions', PermissionController::class)->names('permissions');

        Route::name('users.')->prefix('users')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/{user}/edit-roles', [UserController::class, 'editRoles'])->name('edit-roles');
            Route::post('/{user}/roles', [UserController::class, 'updateRoles'])->name('update-roles');
        });
    });
});

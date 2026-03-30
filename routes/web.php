<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ScholarshipsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', function () {
    return match (auth()->user()->getRoleNames()->first()) {
        'admin'        => redirect()->route('admin.dashboard'),
        'municipality' => redirect()->route('municipality.dashboard'),
        'peso_officer' => redirect()->route('peso.dashboard'),
        'applicant'    => view('dashboard'),
        'scholar'      => view('dashboard'),
        default        => redirect()->route('welcome'),
    };
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated user routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/my-scholarships', [ScholarshipsController::class, 'index'])->name('scholarships.index');
    Route::get('/scholarships/{scholarship}', [ScholarshipsController::class, 'show'])->name('scholarships.show');

    // Application routes (controller-backed)
    Route::name('applications.')->prefix('applications')->group(function () {
        Route::get('/', [ApplicationController::class, 'index'])->name('index');
        Route::get('{application}', [ApplicationController::class, 'show'])->name('show');
        Route::post('{application}/withdraw', [ApplicationController::class, 'withdraw'])->name('withdraw');
    });

    // Apply to scholarship routes
    Route::get('/scholarships/{scholarship}/apply', [ApplicationController::class, 'create'])->name('scholarships.apply.create');
    Route::post('/scholarships/{scholarship}/apply', [ApplicationController::class, 'store'])->name('scholarships.apply.store');

    // Notifications
    Route::get('/notifications', function () {
        return view('notifications.index');
    })->name('notifications.index');

    // Compliance
    Route::get('/compliance', function () {
        return view('compliance.index');
    })->name('compliance.index');

    // Municipality routes
    Route::prefix('municipality')->name('municipality.')->group(function () {
        Route::get('/dashboard', function () {
            return view('municipality.dashboard');
        })->name('dashboard');

        Route::get('/reports', function () {
            return view('municipality.reports');
        })->name('reports');

        Route::get('/compliance', function () {
            return view('municipality.compliance');
        })->name('compliance');
    });

    // PESO Officer routes
    Route::prefix('peso')->name('peso.')->group(function () {
        Route::get('/dashboard', function () {
            return view('peso.dashboard');
        })->name('dashboard');

        Route::get('/scholars', function () {
            return view('peso.scholars');
        })->name('scholars');

        Route::get('/employment', function () {
            return view('peso.employment');
        })->name('employment');

        Route::get('/reports', function () {
            return view('peso.reports');
        })->name('reports');
    });
});

require __DIR__.'/auth.php';
require __DIR__.'/public.php';
require __DIR__.'/admin.php';

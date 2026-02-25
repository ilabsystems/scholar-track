<?php

use App\Http\Controllers\Public\PublicController;
use App\Http\Controllers\Public\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/about', [PublicController::class, 'about'])->name('about');
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
Route::get('/scholarships', [PublicController::class, 'scholarships'])->name('scholarships');
Route::get('/announcements', [PublicController::class, 'announcements'])->name('announcements');
Route::get('/requirements', [PublicController::class, 'requirements'])->name('requirements');
Route::get('/stats', [PublicController::class, 'stats'])->name('stats');
Route::get('/faq', [PublicController::class, 'faq'])->name('faq');
Route::get('/eligibility', [PublicController::class, 'eligibility'])->name('eligibility');
Route::get('/track', [PublicController::class, 'track'])->name('track');

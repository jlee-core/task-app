<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DashboardController;

Route::view('/', 'welcome');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::resource('tasks', TaskController::class)
    ->middleware('auth')
    ->except(['show']);

require __DIR__ . '/auth.php';

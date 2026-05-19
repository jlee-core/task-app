<?php

use App\Http\Controllers\AdminSearchController;
use App\Http\Controllers\AdminTaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DashboardController;

Route::view('/', 'welcome');

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/admin/search', [AdminSearchController::class, 'index'])
        ->name('admin.search');

    Route::post('/admin/search', [AdminSearchController::class, 'search'])
        ->name('admin.search.submit');

    Route::get('/users/{user}/tasks', [AdminTaskController::class, 'index'])
        ->name('admin.users.tasks');
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::resource('tasks', TaskController::class)
    ->middleware(['auth', 'not.admin'])
    ->except(['show']);

require __DIR__ . '/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\DashboardController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('posts', PostController::class, ['as' => 'dashboard']);

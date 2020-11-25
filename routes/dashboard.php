<?php

use App\Http\Controllers\Dashboard\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\UserController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('posts', PostController::class, ['as' => 'dashboard'])
    ->except('show');

Route::resource('roles', RoleController::class, ['as' => 'dashboard'])
    ->except('show');

Route::resource('users', UserController::class, ['as' => 'dashboard'])
    ->except('show');

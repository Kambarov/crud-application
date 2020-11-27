<?php

use App\Http\Controllers\Dashboard\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\UserController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('locale/{lang}', [DashboardController::class, 'setLocale'])->name('dashboard.setLocale');

Route::resource('posts', PostController::class, ['as' => 'dashboard'])
    ->except('show');
Route::get('posts/delete/{post}', [PostController::class, 'destroy'])->name('dashboard.posts.destroy');

Route::resource('roles', RoleController::class, ['as' => 'dashboard'])
    ->except('show', 'destroy');
Route::get('roles/delete/{role}', [RoleController::class, 'destroy'])->name('dashboard.roles.destroy');

Route::resource('users', UserController::class, ['as' => 'dashboard'])
    ->except('show', 'destroy');
Route::get('users/delete/{user}', [UserController::class, 'destroy'])->name('dashboard.users.destroy');

<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoleAssignmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserRoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//resource routes for users, roles, permissions
Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/users', UserController::class);
    Route::resource('/roles', RoleController::class);
    Route::resource('/permissions', PermissionController::class);
});

// Route::middleware('auth')->prefix('dashboard')->group(function () {
//     Route::post('/assignrole/{id}', [DashboardController::class, 'assignrole'])->name('assignrole');

// });

//assigning role
Route::get('/users/{user}/roles', [RoleAssignmentController::class, 'editUserRoles'])->name('users.roles.edit');
Route::post('/users/{user}/roles', [RoleAssignmentController::class, 'updateUserRoles'])->name('users.roles.update');

Route::get('/roles/{role}/permissions', [RoleAssignmentController::class, 'editRolePermissions'])->name('roles.permissions.edit');
Route::post('/roles/{role}/permissions', [RoleAssignmentController::class, 'updateRolePermissions'])->name('roles.permissions.update');

//end
require __DIR__.'/auth.php';

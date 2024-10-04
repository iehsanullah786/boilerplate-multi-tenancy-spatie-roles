<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\App\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;

//assign roles & perm
use App\Http\Controllers\AssignRoleController;
use App\Http\Controllers\AssignPermissionController;



/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
//start tenant routes


    //resource routes for users, roles, permissions
    Route::middleware('auth')->group(function () {
   
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('/users', UserController::class);
        Route::resource('/roles', RoleController::class);
        Route::resource('/permissions', PermissionController::class);

        //assign roles and permissions
        Route::post('assignrole/{uid}' , [AssignRoleController::class, 'assignrole'])->name('assignrole');
        Route::post('assignpermission/{rid}' , [AssignPermissionController::class, 'assignpermission'])->name('assignpermission');



        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
        //include tenantapp routes
        require __DIR__.'/tenantauth.php';

//end tenantroutes
});

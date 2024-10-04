<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoleAssignmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserRoleController;
use Illuminate\Support\Facades\Route;


// routes/web.php, api.php or any other central route files you have
foreach (config('tenancy.central_domains') as $domain) {
    Route::domain($domain)->group(function () {

        Route::redirect('/', 'tenants');
        Route::middleware('auth')->group(function () {
            //store tenants
            Route::resource('tenants', TenantController::class);
        
            });

    //include routes/auth.php routes by breeze
    require __DIR__.'/auth.php';

    //profile routes by breeze
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    
});
}

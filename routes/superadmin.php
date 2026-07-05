<?php

use App\Http\Controllers\SuperAdmin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\DashboardController;
use App\Http\Controllers\SuperAdmin\CompanyController;
use App\Http\Controllers\SuperAdmin\UserController;

Route::middleware(['auth', 'nocache','role:SuperAdmin'])->prefix('superadmin')->name('superadmin.')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('companies', CompanyController::class);
    Route::resource('admin', AdminController::class);
});

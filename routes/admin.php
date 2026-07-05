<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\ShortUrlController;

Route::middleware(['auth', 'nocache', 'role:Admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
    Route::resource('members', MemberController::class);
    Route::resource('short-urls', ShortUrlController::class);
});

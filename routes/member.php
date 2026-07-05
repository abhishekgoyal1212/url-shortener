<?php

use App\Http\Controllers\Member\ShortUrlController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Member\DashboardController;

Route::middleware(['auth','nocache','role:Member'])->prefix('member')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('member.dashboard');
    Route::resource('short-urls', ShortUrlController::class);


});
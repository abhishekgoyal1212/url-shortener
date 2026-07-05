<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::middleware(['guest','nocache'])->group(function () {

    Route::get('/login', [AuthController::class, 'index'])->name('login');

    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

});

Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});
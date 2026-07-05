<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RedirectController;

Route::get('/', function () {
    return redirect()->route('login');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/superadmin.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/member.php';
Route::get('{shortCode}', [RedirectController::class, 'index'])
    ->name('redirect');

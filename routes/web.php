<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth', 'verified', 'rol:' . \App\Models\User::ROL_ADMIN_CLUB])->group(function () {
    Route::view('admin/panel', 'admin.panel')->name('admin.panel');
});

require __DIR__.'/auth.php';

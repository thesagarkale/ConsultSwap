<?php

use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->group(function () {
    Route::get('/', [Dashboard::class, 'index'])->middleware(['auth'])->name('dashboard');
});


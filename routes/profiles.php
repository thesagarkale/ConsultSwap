<?php

use App\Http\Controllers\Users;
use Illuminate\Support\Facades\Route as Route;

Route::prefix('profiles')->group(function () {
    Route::get('/{username}', [Users::class, 'overview'])->name('profiles_overview');
});

<?php

use Illuminate\Support\Facades\Route as Route;
use App\Http\Controllers\Api\Contacts;

Route::prefix('/contacts')->group(function () {
    Route::get('/', [Contacts::class, 'contacts'])->name('api_user_contacts');
});
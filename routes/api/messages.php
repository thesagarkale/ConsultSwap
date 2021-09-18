<?php

use Illuminate\Support\Facades\Route as Route;
use App\Http\Controllers\Api\Messages;

Route::prefix('/messages')->group(function () {
    Route::get('/', [Messages::class, 'search'])->name('api_messages_search');
    Route::post('/', [Messages::class, 'create'])->name('api_messages_create');
});
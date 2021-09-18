<?php

use App\Http\Controllers\Messages as Messages;
use Illuminate\Support\Facades\Route as Route;

Route::prefix('messages')->group(function () {
    Route::get('/', [Messages::class, 'index'])->name('messages_index');
});
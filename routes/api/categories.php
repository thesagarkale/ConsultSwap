<?php

use Illuminate\Support\Facades\Route as Route;

Route::prefix('/categories')->group(function () {
    Route::get('/', [\App\Http\Controllers\Api\Categories::class, 'get']);
});

<?php

use Illuminate\Support\Facades\Route as Route;

Route::prefix('/users')->group(function () {
    Route::get('/', [\App\Http\Controllers\Api\Users::class, 'all']);
    Route::get('/{id:int}', [\App\Http\Controllers\Api\Users::class, 'fetch']);
    Route::post('/{id:int}/metadata', [\App\Http\Controllers\Api\Users::class, 'storeMetadata']);
    Route::post('/{id:int}/categories', [\App\Http\Controllers\Api\Users::class, 'categories']);
});

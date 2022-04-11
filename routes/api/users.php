<?php

use Illuminate\Support\Facades\Route as Route;

Route::prefix('/users')->group(function () {
    Route::get('/', [\App\Http\Controllers\Api\Users::class, 'all']);
    Route::get('/{id:int}', [\App\Http\Controllers\Api\Users::class, 'fetch']);
    Route::get('/{id:int}/followers', [\App\Http\Controllers\Api\Users::class, 'fetchFollowers']);
    Route::get('/{id:int}/followings', [\App\Http\Controllers\Api\Users::class, 'fetchFollowings']);
    Route::post('/{id:int}/metadata', [\App\Http\Controllers\Api\Users::class, 'storeMetadata']);
    Route::post('/{id:int}/categories', [\App\Http\Controllers\Api\Users::class, 'categories']);
    Route::get('/{id:int}/follows/{follower:int}', [\App\Http\Controllers\Api\Users::class, 'follows']);
});

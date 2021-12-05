<?php

Route::prefix('/notifications')->group(function () {
    Route::get('/', [\App\Http\Controllers\Api\Notifications::class, 'search'])->name('api_notifications_search');
    Route::post('/{id:int}/read', [\App\Http\Controllers\Api\Notifications::class, 'read'])->name('api_notifications_read');
});
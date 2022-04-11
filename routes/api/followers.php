<?php

use Illuminate\Support\Facades\Route as Route;

Route::prefix('/followers')->group(function () {
    Route::post('/', []);
});
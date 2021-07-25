<?php

use Illuminate\Support\Facades\Route as Route;
use App\Http\Controllers\Api\Questions;

Route::prefix('/questions')->group(function () {
    Route::get('/', [Questions::class, 'index'])->name('api_question_search');
    Route::post('/', [Questions::class, 'create'])->name('api_question_create');
});
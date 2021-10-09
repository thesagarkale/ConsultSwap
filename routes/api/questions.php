<?php

use Illuminate\Support\Facades\Route as Route;
use App\Http\Controllers\Api\Questions;

Route::prefix('/questions')->group(function () {
    Route::get('/', [Questions::class, 'index'])->name('api_question_search');
    Route::post('/', [Questions::class, 'create'])->name('api_question_create');
    Route::get('/{id:int}/answers', [Questions::class, 'answers'])->name('api_question_answers');
    Route::post('/{id:int}/answers', [Questions::class, 'createAnswer'])->name('api_questions_answers_create');
});
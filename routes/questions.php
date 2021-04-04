<?php

use App\Http\Controllers\Questions as QuestionsController;
use Illuminate\Support\Facades\Route;

Route::prefix('questions')->group(function () {
    Route::get('/', [QuestionsController::class, 'index'])->name('questions_index');
    Route::get('/create', [QuestionsController::class, 'create'])->middleware('auth')->name('question_create');
    Route::get('/{id:int}', [QuestionsController::class, 'overview'])->name('questions_overview');
    Route::post('/', [QuestionsController::class, 'store'])->middleware('auth')->name('question_store');
});

<?php

use App\Http\Controllers\Answers as AnswersController;
use Illuminate\Support\Facades\Route as Route;

Route::post('/questions/{question_id:int}/answers', [AnswersController::class, 'store']);

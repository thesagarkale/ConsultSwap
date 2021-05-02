<?php

use App\Http\Controllers\Ticks as TicksController;
use Illuminate\Support\Facades\Route as Route;

Route::post('/ticks/up', [TicksController::class, 'uptick']);
Route::post('/ticks/down', [TicksController::class, 'downtick']);

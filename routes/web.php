<?php

use App\Http\Controllers\Welcome;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Welcome::class, 'index']);

require __DIR__.'/dashboard.php';

require __DIR__.'/auth.php';

require __DIR__.'/questions.php';

require __DIR__.'/answers.php';

require __DIR__.'/ticks.php';

require __DIR__.'/profiles.php';

require __DIR__.'/messages.php';

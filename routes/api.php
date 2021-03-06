<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::middleware(['api', 'auth:sanctum'])->group(function () {
    require __DIR__.'/api/categories.php';

    require __DIR__.'/api/users.php';

    require  __DIR__.'/api/questions.php';

    require __DIR__.'/api/messages.php';

    require __DIR__.'/api/contacts.php';

    require __DIR__.'/api/notifications.php';
});



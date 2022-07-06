<?php

use App\Http\Controllers\Poll;
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
Route::resource("poll",Poll::class)->only([
    'store','show','vote'
]);

Route::prefix('poll')->group(function () {  
    Route::get('{id}/vote/{id_vote}',[Poll::class,"vote"]);
    Route::get("{id}/stats",[Poll::class,"stats"]);
});


<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/developers','App\Http\Controllers\DeveloperController@index');
Route::get('/developers/{id}','App\Http\Controllers\DeveloperController@show');

Route::post('/developers','App\Http\Controllers\DeveloperController@store');
Route::put('/developers/{id}','App\Http\Controllers\DeveloperController@update');
Route::delete('/developers/{id}','App\Http\Controllers\DeveloperController@destroy');

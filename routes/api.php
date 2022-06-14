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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

    Route::get('users/index', 'App\Http\Controllers\UserController@index');
    Route::post('users/create', 'App\Http\Controllers\UserController@create');
    Route::put('users/edit/{id}', 'App\Http\Controllers\UserController@edit');
    Route::delete('users/delete/{id}', 'App\Http\Controllers\UserController@destroy');

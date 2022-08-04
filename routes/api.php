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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// People
Route::get('/people', 'App\Http\Controllers\PersonController@index');
Route::post('/people', 'App\Http\Controllers\PersonController@store');
Route::patch('/people', 'App\Http\Controllers\PersonController@edit');
Route::delete('/people', 'App\Http\Controllers\PersonController@destroy');

// Countries
Route::get('/countries', 'App\Http\Controllers\CountryController@index');
Route::post('/countries', 'App\Http\Controllers\CountryController@store');
Route::patch('/countries', 'App\Http\Controllers\CountryController@edit');
Route::delete('/countries', 'App\Http\Controllers\CountryController@destroy');
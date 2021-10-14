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


Route::namespace('Api')->group(function(){
  Route::get('/apartments', 'ApartmentController@index');
  Route::get('/apartment/{slug}', 'ApartmentController@show');
  Route::get('/apartments/{slug}&&{filters}', 'ApartmentController@search');
  Route::get('/apartments/services', 'ApartmentController@services');
  Route::get('/user/{id}', 'UserController@email');
  Route::post('/contacts/', 'MessageController@store');
  Route::post('/statistics/', 'StatisticController@store');
});
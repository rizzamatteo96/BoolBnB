<?php

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
Auth::routes();

// Route::get('/', function () {
//     return view('guest.welcome');
// });

Route::middleware('auth')->namespace('UserReg')->prefix('userreg')->name('userreg.')
    ->group(function() {
    // pagina di atterraggio dopo il login (con il prefisso, l'url è '/userreg')
    // Route::get('/', 'HomeController@index')->name('home');
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('/apartments', 'ApartmentController');
    Route::resource('/messages', 'MessageController');
    Route::resource('/statistics', 'StatisticController');
});

Route::middleware('auth')->namespace('Admin')->prefix('admin')->name('admin.')
    ->group(function() {
    // pagina di atterraggio dopo il login (con il prefisso, l'url è '/admin')
    // Route::get('/', 'HomeController@index')->name('home');
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('/apartments', 'ApartmentController');
    Route::resource('/messages', 'MessageController');
    Route::resource('/statistics', 'StatisticController');
    Route::resource('/services', 'ServiceController');
    Route::resource('/sponsorships', 'SponsorshipController');
});

Route::get('/{any?}', 'HomeController@index')->where('any', '.*');
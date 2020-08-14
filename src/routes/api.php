<?php

use Illuminate\Http\Request;

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

Route::group(['prefix' => 'movies'], function () {

    Route::get('/', 'MovieController@index')->name('movies.index');
    Route::get('/{movie}', 'MovieController@show')->name('movies.show');
    Route::post('/', 'MovieController@store')->name('movies.store');
    Route::delete('/{movie}', 'MovieController@destroy')->name('movies.destroy');
    Route::post('/{movie}/showtimes', 'MovieController@assignShowtime')->name('movies.assign.showtime');

});

Route::group(['prefix' => 'showtimes'], function () {

    Route::get('/', 'ShowtimeController@index')->name('showtimes.index');
    Route::get('/{showtime}', 'ShowtimeController@show')->name('showtimes.show');
    Route::post('/', 'ShowtimeController@store')->name('showtimes.store');

});

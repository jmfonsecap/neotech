<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/flights/list', 'App\Http\Controllers\FlightController@index')->name('flight.index');
Route::get('/flights/create', 'App\Http\Controllers\FlightController@create')->name('flight.create');
Route::post('/flights/save', 'App\Http\Controllers\FlightController@save')->name('flight.save');
Route::get('/flights/', 'App\Http\Controllers\FlightController@show')->name('flight.show');
Route::delete('/flights/{id}', 'App\Http\Controllers\FlightController@delete')->name('flight.delete');

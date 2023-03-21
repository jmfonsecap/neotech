<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name('admin.home.index');
Route::get('/admin/users', 'App\Http\Controllers\Admin\AdminUserController@index')->name("admin.users.index");

Route::get('/computers/create', 'App\Http\Controllers\ComputerController@create')->name('computer.create');
Route::post('/computers/save', 'App\Http\Controllers\ComputerController@save')->name('computer.save');
Route::get('/computers', 'App\Http\Controllers\ComputerController@index')->name('computer.index');
Route::get('/computers/{id}', 'App\Http\Controllers\ComputerController@show')->name('computer.show');
Route::delete('/computers/{id}', 'App\Http\Controllers\ComputerController@delete')->name('computer.delete');
Route::get('/parts/list', 'App\Http\Controllers\PartController@index')->name('part.index');
Route::get('/parts/create', 'App\Http\Controllers\PartController@create')->name('part.create');
Route::post('/parts/save', 'App\Http\Controllers\PartController@save')->name('part.save');
Route::get('/parts/{id}', 'App\Http\Controllers\PartController@show')->name('part.show');
Route::delete('/part/{id}', 'App\Http\Controllers\PartController@delete')->name('part.delete');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

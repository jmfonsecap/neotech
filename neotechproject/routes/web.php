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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('user.home.index');
Route::post('/search', 'App\Http\Controllers\HomeController@search')->name('search');

// Language route
Route::get('/language/{locale}', 'App\Http\Controllers\LanguageController@locale')->name('language.locale');

// Admin routes
Route::middleware('admin')->group(function () { 
Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name('admin.home.index');
Route::get('/admin/users', 'App\Http\Controllers\Admin\AdminUserController@index')->name('admin.users.index');
Route::get('/admin/users/{id}', 'App\Http\Controllers\Admin\AdminUserController@show')->name('admin.users.show');

Route::get('/admin/types', 'App\Http\Controllers\Admin\AdminTypeController@index')->name('admin.type.index');
Route::get('/admin/types/create', 'App\Http\Controllers\Admin\AdminTypeController@create')->name('admin.type.create');
Route::get('/admin/types/{id}', 'App\Http\Controllers\Admin\AdminTypeController@show')->name('admin.type.show');
Route::post('/admin/types/save', 'App\Http\Controllers\Admin\AdminTypeController@save')->name('admin.type.save');
Route::post('/admin/types/{id}', 'App\Http\Controllers\Admin\AdminTypeController@update')->name('admin.type.update');
Route::get('/admin/types/update/{id}', 'App\Http\Controllers\Admin\AdminTypeController@edit')->name('admin.type.edit');
Route::get('/admin/types/del/{id}', 'App\Http\Controllers\Admin\AdminTypeController@delete')->name('admin.type.delete');

Route::get('/admin/parts', 'App\Http\Controllers\Admin\AdminPartController@index')->name('admin.part.index');
Route::get('/admin/parts/create', 'App\Http\Controllers\Admin\AdminPartController@create')->name('admin.part.create');
Route::get('/admin/parts/{id}', 'App\Http\Controllers\Admin\AdminPartController@show')->name('admin.part.show');
Route::post('/admin/parts/save', 'App\Http\Controllers\Admin\AdminPartController@save')->name('admin.part.save');
Route::post('/admin/parts/{id}', 'App\Http\Controllers\Admin\AdminPartController@update')->name('admin.part.update');
Route::get('/admin/parts/update/{id}', 'App\Http\Controllers\Admin\AdminPartController@edit')->name('admin.part.edit');
Route::get('/admin/parts/del/{id}', 'App\Http\Controllers\Admin\AdminPartController@delete')->name('admin.part.delete');

Route::get('/admin/reviews', 'App\Http\Controllers\Admin\AdminReviewController@index')->name('admin.review.index');
Route::get('/admin/review/{id}', 'App\Http\Controllers\Admin\AdminReviewController@show')->name('admin.review.show');
Route::post('/admin/review/save', 'App\Http\Controllers\Admin\AdminReviewController@save')->name('admin.review.save');
Route::get('/admin/review/update/{id}', 'App\Http\Controllers\Admin\AdminReviewController@edit')->name('admin.review.edit');
Route::post('/admin/reviews/{id}', 'App\Http\Controllers\Admin\AdminReviewController@update')->name('admin.review.update');
Route::get('/admin/reviews/del/{id}', 'App\Http\Controllers\Admin\AdminReviewController@delete')->name('admin.review.delete');

Route::get('/admin/computers', 'App\Http\Controllers\Admin\AdminComputerController@index')->name('admin.computer.index');
Route::get('/admin/computers/create', 'App\Http\Controllers\Admin\AdminComputerController@create')->name('admin.computer.create');
Route::get('/admin/computers/{id}', 'App\Http\Controllers\Admin\AdminComputerController@show')->name('admin.computer.show');
Route::post('/admin/computers/save', 'App\Http\Controllers\Admin\AdminComputerController@save')->name('admin.computer.save');
Route::post('/admin/computers/{id}', 'App\Http\Controllers\Admin\AdminComputerController@update')->name('admin.computer.update');
Route::get('/admin/computers/update/{id}', 'App\Http\Controllers\Admin\AdminComputerController@edit')->name('admin.computer.edit');
Route::get('/admin/computers/del/{id}', 'App\Http\Controllers\Admin\AdminComputerController@delete')->name('admin.computer.delete');
});

// Api routes
Route::get('/api/cars', 'App\Http\Controllers\User\CarApiController@index')->name('user.api.index');
Route::get('/api/cars/{id}', 'App\Http\Controllers\User\CarApiController@show')->name('user.api.show');


// Client routes
Route::get('/custom', 'App\Http\Controllers\User\CustomComputerController@index')->name('user.custom.index');
Route::get('/custom/create', 'App\Http\Controllers\User\CustomComputerController@create')->name('user.custom.create');
Route::post('/custom/save', 'App\Http\Controllers\User\CustomComputerController@save')->name('user.custom.save');

Route::get('/computers/create', 'App\Http\Controllers\User\ComputerController@create')->name('user.computer.create');
Route::post('/computers/save', 'App\Http\Controllers\User\ComputerController@save')->name('user.computer.save');
Route::get('/computers', 'App\Http\Controllers\User\ComputerController@index')->name('user.computer.index');
Route::get('/computers/{id}/review', 'App\Http\Controllers\User\ReviewController@create')->name('user.review.create');
Route::post('/computers/{id}/edit', 'App\Http\Controllers\User\ReviewController@edit')->name('user.review.edit');
Route::post('/computers/{id}/save', 'App\Http\Controllers\User\ReviewController@save')->name('user.review.save');
Route::get('/computers/{id}', 'App\Http\Controllers\User\ComputerController@show')->name('user.computer.show');
Route::delete('/computers/{id}', 'App\Http\Controllers\User\ComputerController@delete')->name('user.computer.delete');

//Route::post('/computers/1/save', 'App\Http\Controllers\ReviewController@save')->name('review.save');

Route::get('/parts/list', 'App\Http\Controllers\User\PartController@index')->name('user.part.index');
Route::get('/parts/create', 'App\Http\Controllers\User\PartController@create')->name('user.part.create');
Route::post('/parts/save', 'App\Http\Controllers\User\PartController@save')->name('user.part.save');
Route::get('/parts/{id}', 'App\Http\Controllers\User\PartController@show')->name('user.part.show');
Route::delete('/part/{id}', 'App\Http\Controllers\User\PartController@delete')->name('user.part.delete');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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

Route::get('login', 'Auth\LoginController@login')->name('login');
Route::post('login', 'Auth\LoginController@checkLogin')->name('checkLogin');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', 'HomeController@index')->name('index')->middleware('auth');
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['auth', 'role.admin'],
], function () {
    Route::get('/', 'Admin\HomeController@index')->name('index');
});

Route::group([
    'prefix' => 'admin/book',
    'as' => 'book.',
    'middleware' => ['auth', 'role.admin'],
], function () {
    Route::get('list-book', 'Admin\HomeController@getAllBook')->name('list-book');
});

Route::group([
    'prefix' => 'admin/book',
    'middleware' => ['auth', 'role.admin'],
], function () {
    Route::resource('books', 'Admin\BookController');
});

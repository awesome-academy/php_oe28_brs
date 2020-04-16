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

Route::get('/', 'HomeController@index')->name('index');

Route::group([
    'prefix' => 'reviews',
    'as' => 'reviews.',
    'middleware' => 'auth',
], function () {
    Route::get('/', 'ReviewController@index')->name('index');
    Route::get('book/{book}', 'ReviewController@review')->name('book');
    Route::get('add/{book}', 'ReviewController@createReview')->name('add');
    Route::post('save/{book}', 'ReviewController@saveReview')->name('save');
    Route::get('show/{review}', 'ReviewController@showReview')->name('show');
});

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

Route::group([
    'prefix' => 'admin/reviews',
    'as' => 'reviews.',
    'middleware' => ['auth', 'role.admin'],
], function () {
    Route::get('list', 'Admin\ReviewController@index')->name('list');
    Route::post('approved/{review}', 'Admin\ReviewController@approved')->name('approved');
});

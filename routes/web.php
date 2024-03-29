<?php

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

Route::get('/', function () {
    return redirect(route('book.index'));
});

Route::resource('book', 'BookController');
Route::resource('category', 'CategoryController');
Route::get('/delete-select', 'BookController@deleteSelected');
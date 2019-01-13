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

Route::group(["middleware" => "auth", "prefix" => "blogs", "as" => "blogs."],function() {
    Route::get('/', 'BlogController@index')->name('index');
    Route::get('/trashes', "BlogController@trashes")->name('trashes');
    Route::post('/', 'BlogController@store')->name('store');
    Route::get('/create', 'BlogController@create')->name('create');
    Route::get('/{id}/edit', 'BlogController@edit')->name('edit');
    Route::post('/{id}', 'BlogController@update')->name('update');
    Route::get('/{id}/delete', 'BlogController@destroy')->name('destroy');
    Route::get('/{id}/restore', 'BlogController@restore')->name('restore');
    Route::get('/restore', 'BlogController@restoreAll')->name('restoreAll');
    Route::get('/{id}/force-delete', 'BlogController@forceDestroy')->name('forceDestroy');
    Route::get('/delete', 'BlogController@destroyAll')->name('destroyAll');
    Route::get('/{id}/force-delete', 'BlogController@forceDestroy')->name('forceDestroy');
});

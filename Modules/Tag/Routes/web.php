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

Route::group(["prefix" => "tags", "as" => "tags."],function() {
    Route::get('/', 'TagController@index')->name('index');
    Route::post('/', 'TagController@store')->name('store');
    Route::get('/create', 'TagController@create')->name('create');
    Route::get('/{id}/edit', 'TagController@edit')->name('edit');
    Route::post('/{id}', 'TagController@update')->name('update');
    Route::get('/{id}/delete', 'TagController@destroy')->name('destroy');
});

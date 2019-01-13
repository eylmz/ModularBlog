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

Route::group(["middleware" => "auth", "prefix" => "tags", "as" => "tags."],function() {
    Route::get('/', 'TagController@index')->name('index');
    Route::get('/trashes', "TagController@trashes")->name('trashes');
    Route::post('/', 'TagController@store')->name('store');
    Route::get('/create', 'TagController@create')->name('create');
    Route::get('/{id}/edit', 'TagController@edit')->name('edit');
    Route::post('/{id}', 'TagController@update')->name('update');
    Route::get('/{id}/delete', 'TagController@destroy')->name('destroy');
    Route::get('/{id}/restore', 'TagController@restore')->name('restore');
    Route::get('/restore', 'TagController@restoreAll')->name('restoreAll');
    Route::get('/{id}/force-delete', 'TagController@forceDestroy')->name('forceDestroy');
    Route::get('/delete', 'TagController@destroyAll')->name('destroyAll');
    Route::get('/{id}/force-delete', 'TagController@forceDestroy')->name('forceDestroy');
});

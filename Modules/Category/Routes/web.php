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

Route::group(["middleware" => "auth", "prefix" => "categories", "as" => "categories."],function() {
    Route::get('/', "CategoryController@index")->name('index');
    Route::get('/trashes', "CategoryController@trashes")->name('trashes');
    Route::post('/', "CategoryController@store")->name('store');
    Route::get('/create', "CategoryController@create")->name('create');
    Route::get('/{id}/edit', 'CategoryController@edit')->name('edit');
    Route::post('/{id}', 'CategoryController@update')->name('update');
    Route::get('/{id}/delete', 'CategoryController@destroy')->name('destroy');
    Route::get('/{id}/restore', 'CategoryController@restore')->name('restore');
    Route::get('/restore', 'CategoryController@restoreAll')->name('restoreAll');
    Route::get('/{id}/force-delete', 'CategoryController@forceDestroy')->name('forceDestroy');
    Route::get('/delete', 'CategoryController@destroyAll')->name('destroyAll');
    Route::get('/{id}/force-delete', 'CategoryController@forceDestroy')->name('forceDestroy');
});

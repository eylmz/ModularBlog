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

Route::group(["prefix" => "categories", "as" => "categories."],function() {
    Route::get('/', "CategoryController@index")->name('index');
    Route::post('/', "CategoryController@store")->name('store');
    Route::get('/create', "CategoryController@create")->name('create');
    Route::get('/{id}/edit', 'CategoryController@edit')->name('edit');
    Route::post('/{id}', 'CategoryController@update')->name('update');
    Route::get('/{id}/delete', 'CategoryController@destroy')->name('destroy');
});

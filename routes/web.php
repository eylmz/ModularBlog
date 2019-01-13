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

Route::middleware('auth')->group(function (){
    Route::get('/', "AdminController@index")->name("admin.dashboard");
    Route::get('/logout', "AdminController@logout")->name("admin.logout");
});

Auth::routes([
    'register' => false,
    'verify' => false,
    'reset' => false
]);

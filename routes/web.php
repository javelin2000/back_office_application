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

//Route::get('/', function () {
//    redirect('/login');
//});

Auth::routes(['register'=>false]);

Route::middleware('auth')->group(function (){
    Route::get('', 'ClientController@index');
    Route::get('dashboard', 'ClientController@index')->name('home');
    Route::prefix('create-user')->group(function () {
        Route::get('', 'UserController@create')->name('user.create');
        Route::post('', 'UserController@store')->name('user.store');
        Route::put('', 'UserController@update')->name('user.store');
    });
    Route::prefix('client/{client}')->group(function () {
        Route::get('', 'ClientController@show')->name('client.show');
        Route::put('', 'ClientController@update')->name('client.update');

    });
});


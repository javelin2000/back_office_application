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
    Route::get('/', 'ClientController@index');
    Route::get('/dashboard', 'ClientController@index')->name('home');
    Route::get('/create-user', 'UserController@index')->name('user.create');
    Route::get('client/{client}', 'ClientController@show')->name('client.show');
    Route::put('client/{client}', 'ClientController@update')->name('client.update');
});


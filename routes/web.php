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
Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/dashboard', 'ClientController@index')->middleware('auth')->name('home');
Route::get('/create-user', 'HomeController@index')->name('create-user');
Route::get('/client/id', 'HomeController@index')->name('create-user');

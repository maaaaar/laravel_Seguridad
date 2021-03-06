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
    return view('index');
});

Route::get('/login', 'Auth\LoginController@showLogin')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout','Auth\LoginController@logout')->name('logout');

//todas las rutas que se necessite autorizacion para entrar
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home','HomeController@index');
});
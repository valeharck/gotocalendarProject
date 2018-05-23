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
    return view('main.mainHome');
})->name('inicio');

Route::get('/login', 'UserController@getLogin')->name('login');
Route::post('/postlogin', 'UserController@postLogin')->name('entrar');
Route::get('/registro', 'UserController@getRegister')->name('registro');
Route::post('/sendRegistro','UserController@postRegister') -> name('send');
Route::get('/logout', 'UserController@getLogout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/profile' , 'UserController@getProfile')->name('profile');
Route::put('/home/profile' , 'UserController@updateUser')->name('update');

Route::get('/home/bloc', 'HomeController@getBlocNotas')->name('blocNotas');
Route::post('/home/bloc', 'HomeController@setNota')->name('addNote');
Route::delete('home/bloc/{id}', 'HomeController@deleteNota');

Route::get('home/recordatorios', 'HomeController@getRecordatorios')->name('recordatorios');


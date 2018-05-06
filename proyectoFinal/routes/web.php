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

Route::get('/login', function (){
    return view('login.login');
})->name('login');
Route::get('/registro', 'RegisterController@create')->name('registro');
Route::post('sendRegistro', ['as'=>'send', 'uses' =>'RegisterController@store']);
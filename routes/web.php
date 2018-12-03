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

Route::get('/', function (){
    return redirect('/index');
});


Route::get('login', 'HomeController@login')->name('login');;
Route::get('register', 'HomeController@register');
Route::post('do_login', 'HomeController@do_login');
Route::post('do_register', 'HomeController@do_register');

Route::group(['middleware' => 'auth'], function () {
    Route::post('file_upload', 'HomeController@file_upload');
    Route::get('logout', 'HomeController@logout');
    Route::get('index', 'HomeController@index');
    Route::get('file_delete/{id}', 'HomeController@file_delete');
    Route::get('file_edit/{id}', 'HomeController@file_edit');
    Route::get('do_edit_file/{id}', 'HomeController@do_edit_file');
});
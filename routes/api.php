<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('login', 'Api@login');
Route::post('register', 'Api@register');
Route::post('project_login/{id}', 'Api@project_login');
Route::get('project_list', 'Api@project_list');

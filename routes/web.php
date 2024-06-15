<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'App\Http\Controllers'], function(){
    Route::get('/', 'HomeController@home');
    Route::get('/register', 'AuthController@register');
    Route::post('/register', 'AuthController@registration');
    Route::get('/logout', 'AuthController@logout');
    Route::get('/login', 'AuthController@loginForm');
    Route::post('/user-login', 'AuthController@login');
    Route::resource('products', 'ProductController');
    Route::get('active-user', 'HomeController@index')->middleware(['auth','is_active']);
    Route::resource('permissions', 'PermissionContoller');
});
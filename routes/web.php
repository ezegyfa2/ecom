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
Route::get('/', 'App\Http\Controllers\HomeController@welcome')->middleware('auth')->name('home');
Route::get('/products', 'App\Http\Controllers\HomeController@products');
Route::get('/contact', 'App\Http\Controllers\HomeController@contact');
Route::get('/info', 'App\Http\Controllers\HomeController@info');

Route::group(['middleware'=>'guest'], function() {
    Route::get('/login', 'App\Http\Controllers\Auth\LoginController@loginPage')->name('loginPage');
    Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login')->name('login');
    Route::get('/registration', 'App\Http\Controllers\HomeController@registration');
});

Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/admin', 'App\Http\Controllers\HomeController@admin');
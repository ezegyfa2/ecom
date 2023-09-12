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
Route::get('/', 'App\Http\Controllers\HomeController@welcome');
Route::get('/products', 'App\Http\Controllers\HomeController@products');
Route::post('/products/get-data', 'App\Http\Controllers\HomeController@getData');
Route::get('/contact', 'App\Http\Controllers\HomeController@contact');
Route::get('/info', 'App\Http\Controllers\HomeController@info');
Route::get('/login', 'App\Http\Controllers\HomeController@login');
Route::get('/registration', 'App\Http\Controllers\HomeController@registration');
Route::get('/admin', 'App\Http\Controllers\HomeController@admin');
Route::get('/admin-options', 'App\Http\Controllers\HomeController@testOptions');


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
Route::get('/contact', 'App\Http\Controllers\HomeController@contact');
Route::get('/info', 'App\Http\Controllers\HomeController@info');

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


Route::get('/', 'ArticleController@index');
Route::get('/create', 'ArticleController@create');
Route::post('/stores', 'ArticleController@store');
Route::get('/update/{id}', 'ArticleController@edit');
Route::put('/update/{id}', 'ArticleController@update');
Route::delete('/delete/{id}', 'ArticleController@destroy');

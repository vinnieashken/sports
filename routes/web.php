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

Route::get('/', 'HomeController@index');
Route::get('/article/{id}/{slug}','HomeController@article');
Route::get('/category/{id}/{slug}','HomeController@category');

Route::get('/videos','HomeController@videos');
Route::get('/video/{id}/{slug}','HomeController@video');

Route::post('/login','RevenueController@login');
Route::post('/register','RevenueController@register');

Route::get('/logout','RevenueController@logout');
Route::get('/user','RevenueController@getUser');
Route::get('/popular','RevenueController@getMostRead');

Route::get('/search','HomeController@search');

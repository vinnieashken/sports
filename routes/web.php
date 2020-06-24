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
Route::get('/category/{id}/{slug}','HomeController@category');
Route::get('/category/more/{id}/{offset}','HomeController@categorymore');

Route::get('/article/{id}/{slug}','HomeController@oldarticle');
Route::get('/article/{id}','HomeController@oldarticleslugless');
Route::get('/author/{slug}','HomeController@author');

Route::get('/videos','HomeController@videos');
Route::get('/video/{id}/{slug}','HomeController@video');
Route::get('/videos/more/{offset}','HomeController@videosmore');

Route::get('/{category_slug}/{id}/{slug}','HomeController@article');
Route::get('/slideshow/pictures/{id}/{slug}','HomeController@pictures');

Route::post('/login','RevenueController@login');
Route::post('/register','RevenueController@register');
Route::post('/reset','RevenueController@resetPassword');
Route::get('/logout','RevenueController@logout');
Route::post('/subscribe','RevenueController@subscribe');


Route::get('/user','RevenueController@getUser');
Route::get('/popular','RevenueController@getMostRead');

Route::get('/search','HomeController@search');
Route::get('/sitemap','HomeController@sitemap');

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

Route::get('/','PagesController@index')->name('index');

Auth::routes();
/*
Route::get('/login','PagesController@login')->name('login');
Route::get('/register','PagesController@register')->name('register');
Route::get('/password/reset','PagesController@reset_password')->name('reset-pass');
*/
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/home', 'PagesController@index')->name('home');
Route::get('/test',function(){return view('test');});
Route::get('/job-details',function(){return view('pages.job-details');});
Route::get('/jobs',function(){return view('pages.job-listings');});
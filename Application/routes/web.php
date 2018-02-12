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

//pages
Route::get('/home', 'PagesController@index')->name('home');

//users
Route::post('/password/change','UsersController@changePassword');
Route::get('/change-password','UsersController@showForm')->name('change-pass');

//faculty
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/profile','DashboardController@profile')->name('profile');
//Route::get('/bookmarked-jobs',function(){return view('faculty.bookmarked-jobs');});
Route::get('/notifications','DashboardController@notifications')->name('notifications');

//hr
Route::get('/hr-dashboard', 'HrDashboardController@index')->name('hr-dashboard');
Route::get('/school-profile', 'HrDashboardController@profile')->name('hr-profile');
Route::get('/manage-jobs', 'HrDashboardController@manageJobs')->name('manage-jobs');
Route::get('/manage-applications','HrDashboardController@manageApplications')->name('manage-applications');

//jobs
//Route::get('/jobs','JobsController@index')->name('jobs');
//Route::get('/job-details',function(){return view('jobs.job-details');})->name('job-details');
Route::resource('jobs','JobsController');

Route::get('/search', 'JobsController@search');


//test
Route::get('/test',function(){return view('hr.create-subject');});
Route::get('/change-password','UsersController@showForm');
Route::resource('subject','SubjectsController');
Route::get('/create-subject','SubjectsController@create');

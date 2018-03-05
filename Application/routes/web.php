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

//files
Route::post('/lectures/{file}/upload','FilesController@lectureUpload');
Route::get('/lectures/{lecture}/download/{file}','FilesController@downloadLectureFile');
Route::delete('/lectures/{file}/delete','FilesController@deleteLectureFile');
//users
Route::post('/password/change','UsersController@changePassword');
Route::get('/change-password','UsersController@showForm')->name('change-pass');

//profile
Route::resource('profile','ProfileController');
Route::put('/profile/personal/update','ProfileController@updatePersonal');
Route::put('/profile/description/update','ProfileController@updateDescription');

//faculty
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/profile','DashboardController@profile')->name('profile');
//Route::get('/bookmarked-jobs',function(){return view('faculty.bookmarked-jobs');});
Route::get('/notifications','DashboardController@notifications')->name('notifications');

//lectures
Route::resource('lectures','LecturesController');

//hr
Route::get('/hr-dashboard', 'HrDashboardController@index')->name('hr-dashboard');
Route::get('/school-profile', 'HrDashboardController@profile')->name('hr-profile');
Route::get('/manage-jobs', 'HrDashboardController@manageJobs')->name('manage-jobs');
Route::get('/manage-applications','HrDashboardController@manageApplications')->name('manage-applications');

//subject
Route::resource('subjects','SubjectsController');
//Route::get('/create-subject','SubjectsController@create');

//jobs
Route::resource('jobs','JobsController');
Route::get('/search', 'JobsController@search')->name('search');
//Route::get('/jobs','JobsController@index')->name('jobs');
//Route::get('/job-details',function(){return view('jobs.job-details');})->name('job-details');

//applications
Route::resource('applications','ApplicationsController');

//documents
Route::resource('documents','DocumentsController');


//test
Route::view('/testSearch','jasonsInvasion.search');
Route::get('/test','TestController@index')->name('test');


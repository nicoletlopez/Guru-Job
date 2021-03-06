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
Route::get('/lectures/{lecture}/files', 'LecturesController@files');
Route::get('/lectures/{lecture}/assign', 'LecturesController@assign');
Route::get('/lectures/{lecture}/assign/{hr}', 'LecturesController@assignLecture');
Route::get('/lectures/{lecture}/unassign/{hr}', 'LecturesController@unassignLecture');

Route::get('/lectures/{lecture}/share', 'LecturesController@share');
Route::get('/lectures/{lecture}/share/{hr}', 'LecturesController@shareLecture');
Route::get('/lectures/{lecture}/unshare/{hr}', 'LecturesController@unshareLecture');

//files
Route::resource('files','FilesController');
Route::post('/lectures/{lecture}/files/upload','FilesController@lectureUpload');
Route::get('/lectures/{lecture}/files/download/{file}','FilesController@downloadLectureFile');
Route::delete('/lectures/{lecture}/files/delete/{file}','FilesController@deleteLectureFile');

//hr
Route::get('/hr-dashboard', 'HrDashboardController@index')->name('hr-dashboard');
Route::get('/school-profile', 'HrDashboardController@profile')->name('hr-profile');
Route::get('/manage-jobs', 'HrDashboardController@manageJobs')->name('manage-jobs');
Route::get('/manage-applications','HrDashboardController@manageApplications')->name('manage-applications');
Route::get('/manage-notifications','HrDashboardController@manageNotifications')->name('manage-notifications');

//notifications
Route::resource('notifications','NotificationsController');

//subject
Route::resource('subjects','SubjectsController');
//Route::get('/create-subject','SubjectsController@create');

//jobs
Route::get('/jobs/search', 'JobsController@search')->name('search');
Route::resource('jobs','JobsController');

//Route::get('/jobs','JobsController@index')->name('jobs');
//Route::get('/job-details',function(){return view('jobs.job-details');})->name('job-details');

//applications
Route::resource('applications','ApplicationsController');
Route::get('/applications/{id}/accepted','ApplicationsController@acceptedApplications');
Route::get('/applications/{job}/{faculty}/hire','ApplicationsController@hire');
Route::get('/applications/{job}/{faculty}/edit','ApplicationsController@updateApplication');
Route::get('/applications/{faculty}/resume/{template}','EmployeesController@resume');
Route::get('/jobs/{job}/applicants','ApplicationsController@applicants')->name('applicants.job');
Route::get('/jobs/{job}/applicants/search', 'ApplicationsController@search')->name('applicants.search');

//documents
Route::post('/documents/{documentspace}/upload','DocumentsController@store')->name('documents.store');
Route::get('/documents/{documentspace}/download/{document}','DocumentsController@show')->name('documents.show');
Route::delete('/documents/{documentspace}/delete/{document}','DocumentsController@destroy')->name('documents.destroy');
Route::resource('documents','DocumentsController',['except'=>['store','destroy','show']]); //remove store,destroy



//document spaces
Route::resource('document-spaces','DocumentSpacesController');
Route::get('/document-spaces/{documentSpace}/assign', 'DocumentSpacesController@assign');
Route::get('/document-spaces/{documentSpace}/assign/{hr}', 'DocumentSpacesController@assignDocumentSpace');
Route::get('/document-spaces/{documentSpace}/unassign/{hr}', 'DocumentSpacesController@unassignDocumentSpace');

//resumes
Route::resource('resumes','ResumesController',['except'=>['show']]);
Route::get('/resumes/{resume}/{template}','ResumesController@show')->name('resumes.show');
Route::get('/resumes/{resume}/edit/main','ResumesController@editMain')->name('resumes.editMain');

//employees
Route::resource('employees','EmployeesController');
Route::get('/employees/{faculty}/profile','EmployeesController@profile');
Route::get('/employees/{faculty}/resume/{template}','EmployeesController@resume');
Route::get('/employees/{faculty}/document-spaces','EmployeesController@documentSpaces');
Route::get('/employees/{faculty}/document-spaces/{documentSpace}','EmployeesController@showDocumentSpaces');
Route::get('/employees/{faculty}/lectures','EmployeesController@lectures');
Route::get('/employees/{faculty}/lectures/{lecture}/details','EmployeesController@lectureDetails');
Route::get('/employees/{faculty}/lectures/{lecture}/files','EmployeesController@lectureFiles');

//subscriptions
Route::resource('subscriptions','SubscriptionsController');

//hrs
Route::resource('hrs','HrsController');

//admin
Route::resource('admins','AdminsController');




//test
Route::get('/test',function()
{
    return view('test');
});
Route::resource('tests','TestController');

//NOTICE
# I have commented out these test routes in order to try caching and optimization.
# Hope I didn't break anything. Cheers. - Pam

//Route::view('/testSearch','jasonsInvasion.search');
//Route::get('/test','DocumentSpacesController@index')->name('test');

/*Route::get('/test/php',function(){return view('test');});*/



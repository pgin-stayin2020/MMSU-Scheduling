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

Route::get('/', 'ScheduleController@create')->name('home')->middleware('chairman');

Route::get('/view', 'ScheduleController@view')->name('home');

Route::post('/approve', 'ScheduleController@approve')->middleware('registrar');

Route::get('/viewSchedules', 'ScheduleController@index');
Route::post('/schedule/year', 'ScheduleController@getYear');
Route::post('/schedule/sem', 'ScheduleController@getSem');
Route::post('/schedule/getCurriculaForm', 'ScheduleController@getCurriculaForm');
Route::post('/schedule/listSchedule','ScheduleController@listSchedule');
Route::post('/schedule/getRooms', 'ScheduleController@getRooms');
Route::post('/schedule/generate', 'ScheduleController@generateSchedule');
Route::post('/schedule/checkConflict', 'ScheduleController@checkConflict');
Route::post('/schedule/checkHour', 'ScheduleController@checkHour');
Route::post('/schedule/submit', 'ScheduleController@submit');
Route::post('/schedule/tableSched', 'ScheduleController@tableSched');
Route::post('/schedule/setTableSched', 'ScheduleController@setTableSched');
Route::get('/schedule/getSY', 'ScheduleController@getSY');
Route::get('/schedule/edit/{id}', 'ScheduleController@edit');
Route::post('/schedule/delete/', 'ScheduleController@delete');
Route::post('/schedule/getEditForm', 'ScheduleController@getEditForm');
Route::post('/schedule/editSubmit', 'ScheduleController@editSubmit');
Route::get('/pending_ge', 'ScheduleController@pending_ge');
Route::post('/schedule/listPending','ScheduleController@listPending');
Route::get('/schedule/pending/{id}', 'ScheduleController@pending');
Route::post('/schedule/getEditPending', 'ScheduleController@getEditPending');
Route::post('/schedule/pendingSubmit', 'ScheduleController@pendingSubmit');
Route::post('/schedule/displaySchedule', 'ScheduleController@displaySchedule');
Route::post('/schedule/displayScheduleTable', 'ScheduleController@displayScheduleTable');
Route::post('/schedule/displaySectionSchedule', 'ScheduleController@displaySectionSchedule');
Route::post('/schedule/displaySectionScheduleTable', 'ScheduleController@displaySectionScheduleTable');
Route::post('/schedule/displayFacultySchedule', 'ScheduleController@displayFacultySchedule');
Route::post('/schedule/displayFacultyScheduleTable', 'ScheduleController@displayFacultyScheduleTable');
Route::post('/schedule/displayRoomSchedule', 'ScheduleController@displayRoomSchedule');
Route::post('/schedule/displayRoomScheduleTable', 'ScheduleController@displayRoomScheduleTable');
Route::post('/schedule/fillTable', 'ScheduleController@fillTable');
Route::post('/schedule/listViewSchedule', 'ScheduleController@listViewSchedule');
Route::get('/generateSectionReport', 'ScheduleController@generateSectionReport');
Route::get('/generateFacultyReport', 'ScheduleController@generateFacultyReport');
Route::get('/generateRoomReport', 'ScheduleController@generateRoomReport');
Route::post('/schedule/setRooms', 'ScheduleController@setRooms');
Route::get('/print', 'ScheduleController@print');
Route::post('/schedule/checkSection', 'ScheduleController@checkSection');
Route::post('/schedule/checkFaculty', 'ScheduleController@checkFaculty');
Route::post('/schedule/checkRoom', 'ScheduleController@checkRoom');

Route::get('/curriculum', 'CurriculumController@index');
Route::post('/curriculum/year', 'CurriculumController@getYear');
Route::post('/curriculum/sem', 'CurriculumController@getSem');
Route::post('/curriculum/result', 'CurriculumController@getResult');

Route::get('/timeCodes', 'TimeCodesController@index');

Route::get('/maps', 'MapsController@index');

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


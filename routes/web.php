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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'MainPageController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('registration', 'RegistrationController');
Route::get('/registrations/show_all', 'RegistrationController@showAll')->name('registrations.show_all');
Route::get('registrations/datatable', 'RegistrationController@datatable')->name('registrations/datatable');
Route::post('registrations/new_registration', 'RegistrationController@newRegistration')->name('registrations.new_registration');
Route::get('registrations/term_registration/{id}', 'RegistrationController@termRegistration')->name('registrations/term_registration');
Route::post('registration/term_registration_store', 'RegistrationController@storeTermRegistration')->name('registration.term_registration_store');
Route::get('student/{id}', 'RegistrationController@student')->name('student');


Route::resource('school_class', 'SchoolClassController');
Route::get('school_classes/datatable', 'SchoolClassController@datatable')->name('school_classes/datatable');

Route::resource('administrator', 'AdministrationController');
Route::get('administrators/datatable', 'AdministrationController@datatable')->name('administrators/datatable');

Route::resource('teacher', 'TeacherController');
Route::get('teachers/datatable', 'TeacherController@datatable')->name('teachers/datatable');

Route::resource('teacher_allocation', 'TeacherAllocationController');
Route::get('teacher_allocations/datatable', 'TeacherAllocationController@datatable')->name('teacher_allocations/datatable');

Route::resource('student_allocation', 'StudentAllocationController');
Route::get('student_allocations/datatable', 'StudentAllocationController@datatable')->name('student_allocations/datatable');

Route::resource('subject', 'SubjectController');
Route::get('subjects/datatable', 'SubjectController@datatable')->name('subjects/datatable');

Route::resource('class_list', 'ClassListController')->middleware('can:isTeacher');
Route::get('class_lists/datatable', 'ClassListController@datatable')->name('class_lists/datatable')->middleware('can:isTeacher');

/*Route::resource('mark_list', 'MarkListController');
Route::get('mark_lists/datatable', 'MarkListController@datatable')->name('mark_lists/datatable');*/

//Route::resource('mark_list', 'MarkListController')->middleware('can:isTeacher');
Route::get('/mark_list/create/{id}', 'MarkListController@create')->middleware('can:isTeacher')->name('mark_list.create');
Route::post('/mark_list/store', 'MarkListController@store')->middleware('can:isTeacher')->name('mark_list.store');
Route::get('/mark_list/destroy/{id}', 'MarkListController@destroy')->middleware('can:isTeacher')->name('mark_list.destroy');
Route::get('mark_lists/datatable/{id}', 'MarkListController@datatable')->middleware('can:isTeacher')->name('mark_lists/datatable');

//Route::get('admin_monitor', 'AdminMonitorController@index')->name('admin_monitor');
//Route::get('admin_monitor/view/{$id}', 'AdminMonitorController@show')->name('admin_monitor.view');
Route::resource('admin_monitor', 'AdminMonitorController');
Route::get('admin_monitor/student/{id}', 'AdminMonitorController@studentMarks')->name('admin_monitor.student');

<?php


Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
Route::get('/admin/logout','Auth\LoginController@adminLogout')->name('admin.logout');
Route::group(['as'=> 'admin.', 'namespace' => 'Admin', 'prefix' => 'admin'],function (){
    Route::get('/dashboard','AdminController@index')->name('dashboard');
});


Route::group(['as'=> 'teacher.', 'namespace' => 'Teacher', 'prefix' => 'teacher'],function (){
    Route::get('/dashboard','TeacherController@index')->name('dashboard');
    Route::get('/login','Auth\LoginController@showTeacherLoginForm')->name('login');
    Route::post('/login','Auth\LoginController@teacherLogin')->name('login');
    Route::get('/logout','Auth\LoginController@teacherLogout')->name('logout');
});




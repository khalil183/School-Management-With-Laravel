<?php


Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
Route::get('/admin/logout','Auth\LoginController@adminLogout')->name('admin.logout');
Route::group(['as'=> 'admin.', 'namespace' => 'Admin', 'prefix' => 'admin'],function (){
    Route::get('/dashboard','AdminController@index')->name('dashboard');
    Route::resource('year','YearController');
    Route::resource('month','MonthController');
    Route::resource('class','StudentClassController');
    Route::resource('exam','ExamController');
    Route::resource('book','BookController');
    Route::resource('fee-category','FeeCategoryController');
    Route::resource('fee-amount','FeeAmountController');
    Route::resource('assign-subject','AssignSubjectController');
    Route::resource('designation','DesignationController');
    Route::resource('student-registration','StudentRegistrationController');
    Route::resource('teacher-registration','TeacherController');
    Route::resource('grad-point','GradPointController');


    Route::resource('mark','MarkController');
    Route::get('class-by-subject/{id}','MarkController@classBySubject');
    Route::get('search-student','MarkController@searchStudent')->name('search.student');
});


Route::group(['as'=> 'teacher.', 'namespace' => 'Teacher', 'prefix' => 'teacher'],function (){
    Route::get('/dashboard','TeacherController@index')->name('dashboard');
    Route::get('/login','Auth\LoginController@showTeacherLoginForm')->name('login');
    Route::post('/login','Auth\LoginController@teacherLogin')->name('login');
    Route::get('/logout','Auth\LoginController@teacherLogout')->name('logout');
});




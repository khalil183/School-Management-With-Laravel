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
    Route::resource('marksheet','MarkSheetController');
    Route::post('search-marksheet','MarkSheetController@searchMarkSheet')->name('search.marksheet');
    Route::get('result','ResultController@index')->name('result');
    Route::post('search-result','ResultController@searchResult')->name('search.result');
    Route::resource('mark','MarkController');
    Route::get('class-by-subject/{id}','MarkController@classBySubject');
    Route::get('search-student','MarkController@searchStudent')->name('search.student');

    Route::get('student-promotion','StudentPromotController@index')->name('student.promotion');
    Route::post('search-student-promotion','StudentPromotController@searchStudent')->name('search.student.promotion');
    Route::post('promote-class','StudentPromotController@promote')->name('promote.class');

    Route::resource('student-fee', 'FeeHistoryController');
    Route::get('/fee-amount-search', 'FeeHistoryController@searchAmount')->name('fee.amount.search');

    Route::resource('student-attendance','StudentAttendanceController');
    Route::get('search-student-for-attendance','StudentAttendanceController@searchStudent')->name('search.student.for.attendance');
    Route::get('search-attendance','StudentAttendanceController@searchAttendance')->name('search.attendance');
    Route::get('student-attendance-history','StudentAttendanceController@studentAttendanceHistory')->name('student.attendance.history');
    Route::get('search-student-attendance-history','StudentAttendanceController@searchStudentAttendanceHistory')->name('search.student.attendance.history');





});


Route::group(['as'=> 'teacher.', 'namespace' => 'Teacher', 'prefix' => 'teacher'],function (){
    Route::get('/dashboard','TeacherController@index')->name('dashboard');
    Route::get('/login','Auth\LoginController@showTeacherLoginForm')->name('login');
    Route::post('/login','Auth\LoginController@teacherLogin')->name('login');
    Route::get('/logout','Auth\LoginController@teacherLogout')->name('logout');
});




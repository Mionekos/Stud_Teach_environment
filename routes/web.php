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
Route::get('test', function (){
    return view('test');
});
Route::get('/table', 'TestController@test')->name("test");
Route::get('/', function () {
    return view('start_page');
});
Route::get('/cabinet', function () {
    return view('personal_area');
})->name('cabinet');
Route::get('/timetable',function (){
    return view('timetable');
})->name('timetable');
Route::get('/journal_teacher',function (){
    return view('visit_mark_teacher');
})->name('journalTeacher');
Route::get('/journal_student',function (){
    return view('visit_mark_student');
})->name('journalStudent');
Route::get('/timetable_teacher',function (){
    return view('timetable_teacher');
})->name('timetableTeacher');
Route::get('/add', function (){
    return view('adminpanel_function_add');
})->name('add');
Route::get('/admin_add_timetable', function (){
    return view('adminpanel_function_add_timetable');
})->name('addTimetable');
Route::get('/admin_delete', function (){
    return view('adminpanel_function_delete');
})->name('delete');
Route::get('/admin_delete_user', function (){
    return view('adminpanel_function_delete_user');
})->name('deleteUser');
Route::get('/admin_redaction_students', function (){
    return view('adminpanel_function_redaction_students');
})->name('editStudents');
Route::get('/admin_redaction_teacher', function (){
    return view('adminpanel_function_redaction_teacher');
})->name('editTeachers');
Route::get('/admin_register_teacher', function (){
    return view('adminpanel_function_register_teacher');
})->name('regTeachers');

Route::post('/registration', 'UserController@registrationForUser')->name('registration');
Route::post('/login', 'UserController@loginForUser')->name("login");
Route::get('/logout', 'UserController@logoutForUser')->name("logout");
Route::get('/groups', 'UserController@getGroups')->name("group");
Route::get('/info', 'UserController@getUserInfo')->name("user_info");
Route::get('/update', 'UserController@changeUserInfo')->name("update");
Route::get('/group_timetable','TimetableController@getGroupTimetable')->name('groupTimetable');
Route::get('/timetable_for_students','TimetableController@showTimetableForStudents')->name('showTimetableStudents');
Route::get('/teacher_visit_mark','VisitMarkController@showTableVisitMarkForTeacher')->name('visitMarkTeacher');
Route::get('/teachers','TimetableController@getTeacherForTimetableTeacher')->name('teachers');

Route::get('/add_role','AdminController@add_role')->name('addRole');
Route::get('/add_subject','AdminController@add_subject')->name('addSubject');
Route::get('/add_post','AdminController@add_post')->name('addPost');
Route::get('/add_lectpract','AdminController@add_lectPract')->name('addLectPract');
Route::get('/add_group','AdminController@add_group')->name('addGroup');
Route::get('/add_cabinets','AdminController@add_cabinets')->name('addCabinets');
Route::get('/add_time','AdminController@add_time')->name('addTime');


Route::get('/add_pairs','AdminController@add_pairs')->name('addPairs');
Route::get('/add_timetable','AdminController@add_timetable')->name('addTimetable');
Route::get('/add_teacher','AdminController@registration_teacher')->name('registrationTeacher');
Route::get('/delete_user','AdminController@delete_user')->name('delUser');
Route::get('/edit_user','AdminController@edit')->name('editUser');
Route::get('/update_user','AdminController@update_user')->name('updateUser');
Route::get('/delete_role','AdminController@delete_role')->name('delRole');
Route::get('/delete_subject','AdminController@delete_subject')->name('delSubject');
Route::get('/delete_cabinets','AdminController@delete_cabinets')->name('delCabinets');
Route::get('/delete_lectpract','AdminController@delete_lectpract')->name('delLectPract');
Route::get('/delete_cabinets','AdminController@delete_cabinets')->name('delCabinets');
Route::get('/delete_pairs','AdminController@delete_pairs')->name('delPairs');
Route::get('/delete_time','AdminController@delete_time')->name('delTime');
Route::get('/delete_timetable','AdminController@delete_timetable')->name('delTimetable');

Route::get('/teachers_timetable','TimetableController@getTimetableForTeachers');

Route::get('/subject','AdminController@getSubject');

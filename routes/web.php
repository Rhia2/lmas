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

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

//Auth routes
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

//End of auth routes

Route::get('/home', 'HomeController@index')->name('home');

// Leave routes
Route::get('/leave', 'LeaveController@index')->name('leave');
Route::post('/leave/add', 'LeaveController@store')->name('storeLeave');

Route::get('/staff/leaveRequest', 'LeaveController@leaveRequest')->name('leaveReq');
Route::get('/staff/leaveRequest/add', 'LeaveController@cretateleaveRequest')->name('addLeaveReq');
Route::post('/staff/leaveRequest/add', 'LeaveController@storeLeaveReq')->name('storeLeaveReq');

Route::get('/staff/leaveApproval', 'LeaveController@leaveApproval')->name('leaveApp');
Route::post('/staff/leaveApproval/approve', 'LeaveController@approveLeave')->name('storeLeaveApp');

// End of leave routes
    
// Grade Routes
Route::get('/grade', 'GradeController@index')->name('grade');
Route::post('/grade/add', 'GradeController@storegrade')->name('storeGrade');
Route::get('/grade/attachLeave', 'GradeController@createAttach')->name('attachLeave');
Route::post('/grade/attachLeave', 'GradeController@attachLeave')->name('storeattach');
//End of grade routes

// Staff Routes...
Route::get('staff/add', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('staff/add', 'Auth\RegisterController@register');
Route::get('staff', 'StaffController@index')->name('staff');

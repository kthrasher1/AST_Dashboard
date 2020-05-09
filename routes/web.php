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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});




Route::get('student-page-home', function()
{
    return view('student-page');
});




Route::group(['middleware' => ['auth']], function() {

    Route::get('/no-permissions', 'PermissionController@noPermissions')->name('no-permissions');

    Route::group(['middleware' => ['admin']], function(){

        Route::get('/admin', 'AdminController@index')->name('admin');
        Route::get('/admin/give-admin/{user}', 'AdminController@giveAdmin');
        Route::get('/admin/make-student/{user}', 'AdminController@makeStudent');
        Route::get('/admin/make-staff/{user}', 'AdminController@makeStaff');
        Route::get('/admin/remove-role/{user}', 'AdminController@removeRole');
        Route::get('/admin/delete/{user}', 'AdminController@deleteUser');

    });

    Route::group(['middleware' => ['staff']], function(){


        Route::get('/chatlink','ChatController@staffChat')->name('chatlink');
        Route::get('/staff', 'PermissionController@staff')->name('staff');
        Route::get('/staff', 'StaffController@index')->name('staff');
        Route::get('/student-profile', 'StaffController@studentProfile')->name('student-profile');


    });

    Route::group(['middleware' => ['student']], function(){

        Route::get('/student', 'PermissionController@student')->name('student');
        Route::get('/student', 'StudentController@index')->name('student');

        Route::get('/student-page', 'StudentController@StudentPage');
        Route::get('/student-page-range', 'StudentController@StudentPageRange');
        Route::get('/student-page-home','StudentController@StudentPageHome');

        Route::post('/student-range-slider', 'StudentController@RangeSliderSubmit');
        Route::post('/student-selection', 'StudentController@SelectionSubmit');
        Route::post('/student-modules', 'StudentController@ModulesSubmit');
        Route::post('/module-selection', 'StudentController@ModulesSelectionSubmit');
        Route::post('/module-issues', 'StudentController@ModulesIssueSubmit');
        Route::post('/student-other-issues', 'StudentController@OtherIssuesSubmit');

        Route::get('/studentChat', 'ChatController@studentChat')->name('studentChat');



    });

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('messages', 'ChatController@GetMessages');
Route::post('messages','ChatController@PostMessages');


Route::get('profile', 'UserController@profile')->name('profile');
Route::post('/UpdatePassword','UserController@UpdatePassword')->name('UpdatePassword');
Route::post('profile', 'UserController@image_update');

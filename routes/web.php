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

Route::get('student-page-range', function()
{
    return view('student-pages.student-page-range');
})->name('hello');


Route::get('student-page-home', function()
{
    return view('student');
});

Route::get('student-page', function()
{
    return view('student-pages.student-page');
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

        Route::get('/staff', 'PermissionController@staff')->name('staff');

        Route::get('/staff', 'StaffController@graphs');

    });

    Route::group(['middleware' => ['student']], function(){

        Route::get('/student', 'PermissionController@student')->name('student');
        Route::get('/student', 'StudentController@index')->name('student');

    });




});

Auth::routes();

Route::get('/staff', 'StaffController@index')->name('staff');

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/student-range-slider', 'StudentController@RangeSliderSubmit');
Route::post('/student-selection', 'StudentController@SelectionSubmit');

Route::get('/student-staff-chat', 'ChatController@index');
Route::get('messages', 'ChatController@GetMessages');
Route::post('messages','ChatController@PostMessages');

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

Route::group(['middleware' => ['auth']], function() {

    Route::get('/no-permissions', 'PermissionController@noPermissions')->name('no-permissions');

    Route::group(['middleware' => ['admin']], function(){

        Route::get('/admin', 'AdminController@index')->name('admin');
        Route::get('/admin/give-admin/{userId}', 'AdminController@giveAdmin');
        Route::get('/admin/make-student/{userId}', 'AdminController@makeStudent');
        Route::get('/admin/make-staff/{userId}', 'AdminController@makeStaff');
        Route::get('/admin/remove-role/{userId}', 'AdminController@removeRole');
        Route::get('/admin/delete/{userId}', 'AdminController@deleteUser');

    });

    Route::group(['middleware' => ['staff']], function(){
        Route::get('/staff', 'PermissionController@staff')->name('staff');
        Route::get('/staff', 'StaffController@attendanceGraph');
      
    });

    Route::group(['middleware' => ['student']], function(){
        Route::get('/student', 'PermissionController@student')->name('student');
    });

   
    
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




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
        Route::get('/admin', 'PermissionController@staff')->name('admin');
    });

    Route::group(['middleware' => ['staff']], function(){
        Route::get('/staff', 'PermissionController@staff')->name('staff');
    });

    Route::group(['middleware' => ['student']], function(){
        Route::get('/student', 'PermissionController@student')->name('student');
    });

   
    
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




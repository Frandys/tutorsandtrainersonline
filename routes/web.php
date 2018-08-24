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


Auth::routes();

//Admin Routes
//'middleware' => 'vendor',

Route::get('/register/{type}', function () {
    return View::make('auth.register');
});

Route::get('/', 'TutorController@index');
Route::get('TutorAlls/', 'TutorController@TutorAlls');
Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
   Route::resource('/','Admin\AdminController');
   Route::get('/change_password', function () {
        return View::make('admin.change_password');
    });
    Route::post('change_password', 'UserController@changePassword');
    Route::post('activate_users', 'UserController@activateUsers');
    Route::resource('tutor', 'Admin\TutorController');
    Route::get('view_tutors', 'Admin\TutorController@viewTutors');
    Route::resource('employer', 'Admin\EmployerController');
    Route::get('view_employer', 'Admin\EmployerController@viewEmployer');
    Route::resource('language','Admin\LanguagesController');
    Route::resource('certificate','Admin\CertificatesController');
    Route::resource('qualification','Admin\QualifiedController');
});
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

Route::get('/register/{type}/{plan?}', function () {
    return View::make('auth.register');
});

Route::get('/contact-us', function () {
    return View::make('web.contact_us');
});
Route::post('contact_us', 'UserController@contactUs');
Route::post('subscribe', 'UserController@subscribe');
Route::get('/about', function () {
   $about = \App\Model\About::where('slug','about')->first();
     return View::make('web.about',compact('about'));
});
Route::get('/pricing', function () {
    return View::make('web.pricing');
});

Route::get('/faq', function () {
    $faqs = \App\Model\Faq::all();
    $faqs =  json_decode(json_encode($faqs));
    return View::make('web.FAQ',compact('faqs'));
});

Route::get('/', 'UserController@index');
//Route::group(['middleware' => 'tutor' ], function () {
Route::resource('tutors', 'TutorsController');
 Route::group(['middleware' => 'tutor' ], function () {
Route::post('change_password', 'UserController@changePassword');
Route::get('/change_password', function () {
    return View::make('web.change_password');
});
 Route::resource('tutor', 'TutorController');
 });


Route::group(['middleware' => 'employer' ], function () {
    Route::post('change_password', 'UserController@changePassword');
    Route::get('/change_password', function () {
        return View::make('web.change_password');
    });
    Route::resource('employer', 'EmployerController');
});

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
    Route::resource('job','Admin\JobController');
    Route::get('view_jobs', 'Admin\JobController@viewJobs');
    Route::resource('types','Admin\TypesController');
    Route::resource('about','Admin\AboutController');
    Route::post('assign_job','Admin\JobController@assignJob');
    Route::resource('faq','Admin\FaqController');
});
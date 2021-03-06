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

Route::get('subscription/{id?}', array('as' => 'subscription','uses' => 'AddMoneyController@payWithStripe'));
Route::post('addmoney/stripe', array('as' => 'addmoney.stripe','uses' => 'AddMoneyController@postPaymentWithStripe'));

Route::get('/contact-us', function () {
    return View::make('web.contact_us');
});
Route::post('contact_us', 'UserController@contactUs');
Route::post('subscribe', 'UserController@subscribe');
Route::get('/about', function () {
    $about = \App\Model\About::first();
    return View::make('web.about', compact('about'));
});
Route::get('/pricing', function () {
    return View::make('web.pricing');
});

Route::get('/tutor_type', function () {
    return View::make('web.tutor_type');
});

Route::get('/faq', function () {
    $faqs = \App\Model\Faq::all();
    $faqs = json_decode(json_encode($faqs));
    return View::make('web.FAQ', compact('faqs'));
});

Route::get('/', function () {
    $user = Sentinel::check();
    if (!empty($user) && $user != '') {
        if (\Sentinel::getUser()->roles()->first()->slug == 'admin') {
            return Redirect::to('/admin');
        } elseif (\Sentinel::getUser()->roles()->first()->slug == 'tutor') {
            return \Redirect::to('/dashboard');
        } elseif (\Sentinel::getUser()->roles()->first()->slug == 'employer') {
            return Redirect::to('/dashboard');
        }
    }else{
        return Redirect::to('/dashboard');
    }
});

Route::get('/dashboard', 'UserController@index');
Route::resource('tutors', 'TutorsController');
Route::post('tutors/get_option', 'TutorsController@getOption');
Route::post('tutors/get_level_by_cat', 'TutorsController@getLevelByCat');
Route::post('change_password', 'UserController@changePassword');


Route::group(['middleware' => 'tutor'], function () {
    Route::get('tutor/change_password', function () {
        return View::make('web.change_password');
    });
    Route::resource('/tutor', 'TutorController');
    Route::match(['put', 'patch'], 'tutor_update/{tutor}', 'Admin\TutorController@update');
    Route::post('tutor/change_job_status', 'TutorController@ChangeJobStatus');
    Route::get('tutor/get_swap/{id}', 'TutorController@GetSwap');
    Route::post('tutor/swap_user', 'TutorController@SwapUser');
});


Route::group(['middleware' => 'employer' ], function () {

    Route::get('employer/change_password', function () {
        return View::make('web.change_password');
    });

    Route::resource('/employer', 'EmployerController');
    Route::match(['put', 'patch'], 'employer_update/{tutor}', 'Admin\EmployerController@update');


});

Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
    Route::resource('/', 'Admin\AdminController');
    Route::get('/change_password', function () {
        return View::make('admin.change_password');
    });
    Route::post('change_password', 'UserController@changePassword');
    Route::post('activate_users', 'UserController@activateUsers');
    Route::resource('tutor', 'Admin\TutorController');
    Route::post('/tutor_approved', 'Admin\TutorController@tutorApproved');
    Route::get('view_tutors', 'Admin\TutorController@viewTutors');
    Route::resource('employer', 'Admin\EmployerController');
    Route::get('view_employer', 'Admin\EmployerController@viewEmployer');
    Route::resource('language', 'Admin\LanguagesController');
    Route::resource('certificate', 'Admin\CertificatesController');
    Route::resource('qualification', 'Admin\QualifiedController');
    Route::resource('job', 'Admin\JobController');
    Route::get('view_jobs', 'Admin\JobController@viewJobs');
    Route::resource('types', 'Admin\TypesController');
    Route::resource('about', 'Admin\AboutController');
    Route::post('assign_job', 'Admin\JobController@assignJob');
    Route::resource('faq', 'Admin\FaqController');
    Route::resource('countries', 'Admin\CountriesController');
});
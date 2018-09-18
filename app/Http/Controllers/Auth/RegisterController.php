<?php

namespace App\Http\Controllers\Auth;

use Activation;
use App\Http\Controllers\Controller;
use Cartalyst\Sentinel\Sentinel;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Exception;
use Cartalyst\Sentinel\Users\UserInterface;
use App\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Cartalyst\Sentinel\Laravel\Facades\Reminder;
use App\Http\Requests\ValidationRequest;
use Illuminate\Support\Facades\Validator;
use View;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

//    public function showRegistrationForm()
//    {
//        return view('auth.register');
//    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    public function register(Request $request)
    {
        try {
            $data = $request->input();
            $validation = Validator::make($data, ValidationRequest::$register);
            if ($validation->fails()) {
                $errors = $validation->messages();
                return Redirect::back()->with('errors', $errors);
            }
            //Get and check user data by email
            $userData = User::GetUserByMail($data['email']);

            //Check Email Exit
            if (!empty($userData)) {
                Session::flash('error', Config::get('message.options.REGISTERD_MAIL'));
                return Redirect::back();
            }

            $userData = User::GetUserByMail($data['email']);
            ////Check Email Exit
            if (!empty($userData)) {
                $user = Sentinel::findById($userData->id);
                if (!$activation = Activation::completed($user)) {
                    Session::flash('error', USER_NOT_ACTIVATE);
                    return Redirect::back();
                }
            }


            $credential = [
                'email' => $data['email'],
                'password' => $data['password'],
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
            ];
            //Vendor register

            $user = \Sentinel::registerAndActivate($credential);

            if (!empty($user)) {
                $role = \Sentinel::findRoleByName($data["type"]);
                $role->users()->attach($user);
                if ($data["type"] == 'tutor') {
                    $type = new \App\Model\TutorProfile;
                    $type->uuid = mt_rand();
                } else {
                    $type = new \App\Model\EmployerProfile;
                }
                $type->user_id = $user->id;
                $type->save();
                Session::flash('error', Config::get('message.options.REGISTERED_USER'));
            } else {
                Session::flash('error', Config::get('message.options.REGISTERED_NOT_USER'));

            }


            return Redirect::back();
        } catch (Exception $ex) {
            return View::make('errors.exception')->with('Message', $ex->getMessage());
        }

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
}

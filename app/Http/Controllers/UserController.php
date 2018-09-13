<?php

namespace App\Http\Controllers;
use App\Model\Activations;
use App\Model\Category;
use App\Model\Country;
use App\Model\Disciplines;
use App\Model\QualifiedLevel;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ValidationRequest;
use View;

class UserController extends Controller
{

    public function index()
    {
        //\Sentinel::logout();
        $categories = Category::with('children')->get();
        $levels = QualifiedLevel::with('childrenLevels')->get();
        $disciplines = Disciplines::all();
        $countrys = Country::all();
        return View::make('web.index', compact('categories', 'disciplines', 'countrys', 'levels'));
    }


    public function changePassword(Request $request) {
        try {
            $data = $request->input();
            $validation = \Validator::make($data, ValidationRequest::$change_pass);
            if ($validation->fails()) {
                $errors = $validation->messages();
                 return Redirect::back()->with('errors', $errors);
            }
            $hasher = \Sentinel::getHasher();
            $oldPassword = $data['old_password'];
            $password = $data['password'];
            $passwordConf = $data['confirm_password'];
            $user = \Sentinel::getUser();
            if (!$hasher->check($oldPassword, $user->password) || $password != $passwordConf) {
                Session::flash('error', Config::get('message.options.VALID_PASS_MAIL') );
                return Redirect::back();
            }
            \Sentinel::update($user, array('password' => $password));
            \Sentinel::logout();
            Session::flash('success', Config::get('message.options.PAS_CHNGE'));
            return Redirect::to('/login');
        } catch (Exception $ex) {
            return View::make('errors.exception')->with('Message', $ex->getMessage());
        }
    }

    public function activateUsers(Request $request)
    {
        $data = $request->input();
        $user = \Sentinel::findById(decrypt($data['id']));
        $UsrActCkh = Activations::where('user_id', decrypt($data['id']))->first();
        if (empty($UsrActCkh) || $UsrActCkh['completed'] == '0') {
            $ActCode = \Activation::create($user);
            \Activation::complete($user, $ActCode['code']);
        } else {
            \Activation::remove($user);
        }
        return Response(array('success' => '1', 'errors' => ''));


    }

    public function contactUs(Request $request)
    {
        $data = $request->input();
        $validation = \Validator::make($request->all(), ValidationRequest::$contct);
        if ($validation->fails()) {
            $errors = $validation->messages();
            return Redirect::back()->with('errors', $errors);
        }
        \Mail::to('gurinder.singh@triusmail.com')->send(new \App\Mail\ContactUs($data));
        Session::flash('success', Config::get('message.options.SUCCESS'));
        return Redirect::back();
    }

}

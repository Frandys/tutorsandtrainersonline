<?php

namespace App\Http\Controllers;
use App\Model\About;
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
        $categoriesSubs = Category::where('status','1')->get();
        $levels = QualifiedLevel::with('childrenLevels')->get();
        $disciplines = Disciplines::all();
        $countrys = Country::all();
        $about = About::select('id','shot')->first();
        return View::make('web.index', compact('categories', 'disciplines', 'countrys', 'levels','about','categoriesSubs'));
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

    public function subscribe(Request $request)
    {
        $data = $request->input();
        $validation = \Validator::make($request->all(), ValidationRequest::$forgot_email);
        if ($validation->fails()) {
              return  Config::get('message.options.REQ_MAIL');
        }
        $email = $data['email'];

        // MailChimp API credentials
        $apiKey = 'b68be37a6121571f7b6881d38742ef7f-us18';
        $listID = 'c2e6acc490';

        // MailChimp API URL
        $memberID = md5(strtolower($email));
        $dataCenter = substr($apiKey,strpos($apiKey,'-')+1);
        $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listID . '/members/' . $memberID;

        // member information
        $json = json_encode([
            'email_address' => $email,
            'status'        => 'subscribed',
            'merge_fields'  => [
                'FNAME'     => ''
            ]
        ]);

        // send a HTTP POST request with curl
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        // store the status message based on response code
        if ($httpCode == 200) {
            echo 'You have successfully subscribed to tutorsandtrainersonline.';
        } else {
            switch ($httpCode) {
                case 214:
                    echo    $msg = 'You are already subscribed.';
                    break;
                default:
                    echo     $msg = 'Some problem occurred, please try again.';
                    break;
            }
            print_r($msg);
        }
    }

}

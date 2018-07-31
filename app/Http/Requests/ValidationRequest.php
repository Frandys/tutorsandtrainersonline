<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public static $login = array(
        'email' => 'required|email|max:255',
        'password' => 'required|min:6',
    );

    public static $forgot_email = array(
        'email' => 'required|string|email|max:255',
      );

    public static $pass_reset = array(
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed|min:6',
    );

    public static $change_pass = array(
        'old_password' => 'required|min:6',
        'password' => 'required|min:6',
        'confirm_password' => 'required|same:password|min:6',
    );

    public static $userValid = array(
        'first_name' => 'required|min:2|max:32',
        'last_name' => 'required|min:2|max:32',
        'phone' => 'required',
        'photo' => 'mimes:jpeg,png,jpg,gif,svg|max:5000',
        'city' => 'required|min:2|max:32',
        'state' => 'required|min:2|max:32',
        'country' => 'required',
        'address' => 'min:2|max:32',
        'zip' => 'required|regex:/[A-Z]{1,2}[0-9]{1,2} ?[0-9][A-Z]{2}/i',
        'about ' => 'min:2|max:500',
        'certification_id ' => 'min:2|max:32',
     );

//    public static $photo = array(
//        'photo' => 'required|max:5000000|mimes:jpg,jpeg,png',
//    );


    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}

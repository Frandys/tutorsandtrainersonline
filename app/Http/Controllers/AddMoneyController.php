<?php

namespace App\Http\Controllers;

use App\Model\Subscription;
use Illuminate\Http\Request;
use URL;
use Input;
use App\User;
use Stripe\Error\Card;
use Cartalyst\Stripe\Stripe;
use Exception;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ValidationRequest;
use Illuminate\Support\Facades\Validator;
use View;

class AddMoneyController extends Controller
{
    public function payWithStripe()
    {


        return view('paywithstripe');
    }

    public function postPaymentWithStripe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'card_no' => 'required',
            'ccExpiryMonth' => 'required',
            'ccExpiryYear' => 'required',
            'cvvNumber' => 'required',
            //'amount' => 'required',
        ]);

        $data = $request->input();
        $validation = Validator::make($data, ValidationRequest::$stripeValid);
        if ($validation->fails()) {
            $errors = $validation->messages();
            return Redirect::back()->with('errors', $errors);
        }

        $input = $request->all();

        $input = array_except($input, array('_token'));
        $stripe = Stripe::make('sk_test_PVXtzkhKGE6eV0iuxTqgh4iZ');
        try {
            $token = $stripe->tokens()->create([
                'card' => [
                    'number' => $request->get('card_no'),
                    'exp_month' => $request->get('ccExpiryMonth'),
                    'exp_year' => $request->get('ccExpiryYear'),
                    'cvc' => $request->get('cvvNumber'),
                ],
            ]);
            // $token = $stripe->tokens()->create([
            // 'card' => [
            // 'number' => '4242424242424242',
            // 'exp_month' => 10,
            // 'cvc' => 314,
            // 'exp_year' => 2020,
            // ],
            // ]);
            if (!isset($token['id'])) {
                return redirect()->route('addmoney.paywithstripe');
            }
            $charge = $stripe->charges()->create([
                'card' => $token['id'],
                'currency' => 'USD',
                'amount' => 10.49,
                'description' => 'Add in wallet',
            ]);

            if ($charge['status'] == 'succeeded') {

                $subs =  Subscription::whereUserId('7')->first();
                $subs->plan_id = '2';
                $subs->trans_id = $charge['id'];
                $subs->amount = $charge['amount'];
                $subs->balance_transaction = $charge['balance_transaction'];
                $subs->captured = $charge['captured'];
                $subs->created = $charge['created'];
                $subs->currency = $charge['currency'];
                $subs->save();
                \Session::flash('success', 'Subscription add successfully');
               // return redirect()->route('addmoney.paywithstripe');
                return Redirect::to('/login');
            } else {
                \Session::flash('error', 'Money not add in wallet!!');
                return redirect()->route('addmoney.paywithstripe');
            }
        } catch (Exception $e) {
            \Session::flash('error', $e->getMessage());
            return redirect()->route('addmoney.paywithstripe');
        } catch (\Cartalyst\Stripe\Exception\CardErrorException $e) {
            \Session::flash('error', $e->getMessage());
            return redirect()->route('addmoney.paywithstripe');
        } catch (\Cartalyst\Stripe\Exception\MissingParameterException $e) {
            \Session::flash('error', $e->getMessage());
            return redirect()->route('addmoney.paywithstripe');
        }

    }
}
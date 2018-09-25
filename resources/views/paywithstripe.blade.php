@extends('layouts.dashboard')
@section('section')
@section('pageTitle', 'Payment')

<section class="inner-page-title">
    <div class="container">
        <h2>Payment</h2>
    </div>
</section>
<section class="inner-cotent">
    <div class="container">
    </div>
</section>
@include('message.message')
<div class="container">
    <div class='row'>
        <div class='col-md-4'></div>
        <div class='col-md-4'>
            <form class="form-horizontal" method="POST" id="payment-form" role="form" action="{!!route('addmoney.stripe')!!}" >
                {{ csrf_field() }}

                <div class='form-row'>
                    <div class='col-xs-12 form-group card required'>
                        <label class='control-label'>Card Number</label>
                        <input autocomplete='off' required  value="4242424242424242" class='form-control card-number' size='20' type='number' name="card_no">
                    </div>
                </div>
                <div class='form-row'>
                    <div class='col-xs-4 form-group cvc required'>
                        <label class='control-label'>CVV</label>
                        <input autocomplete='off' required value="314" class='form-control card-cvc' maxlength="3" minlength="3"  placeholder='ex. 311' size='6' type='number' name="cvvNumber">
                    </div>
                    <div class='col-xs-4 form-group expiration required'>
                        <label class='control-label'>Expiration</label>
                        <input class='form-control card-expiry-month' value="10" required placeholder='MM' size='2' type='text' name="ccExpiryMonth">
                    </div>
                    <div class='col-xs-4 form-group expiration required'>
                        <label class='control-label'> </label>
                        <input class='form-control card-expiry-year' value="2020" required placeholder='YYYY' size='4' type='text' name="ccExpiryYear">
                        <input  required   type='hidden' value="{{Request::segment(2)}}" name="user_id">
              </div>
                </div>

                <div class='form-row'>
                    <div class='col-md-12 form-group'>
                        <button class='form-control btn btn-primary submit-button' type='submit'>Pay »</button>
                    </div>
                </div>
                <div class='form-row'>

                </div>
            </form>
        </div>
        <div class='col-md-4'></div>
    </div>
</div>
@stop

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
		
		<div class="form-wrap">
			@include('message.message')
			<form class="form-horizontal" method="POST" id="payment-form" role="form" action="{!!route('addmoney.stripe')!!}" >
				{{ csrf_field() }}
				
				<div class='form-group  required'>
					<label class='control-label'>Card Number</label>
					<input autocomplete='off' required  value="4242424242424242" class='form-control card-number' size='20' type='number' name="card_no">
				</div>
				
				<div class='form-row'>
					<div class='col-12 col-md-4 form-group cvc required'>
						<label class='control-label'>CVV</label>
						<input autocomplete='off' required value="314" class='form-control card-cvc' maxlength="3" minlength="3"  placeholder='ex. 311' size='6' type='number' name="cvvNumber">
					</div>
					<div class='col-6 col-md-4 form-group expiration required'>
						<label class='control-label'>Expiration (Month)</label>
						<input class='form-control card-expiry-month' value="10" required placeholder='MM' size='2' type='text' name="ccExpiryMonth">
					</div>
					<div class='col-6 col-md-4 form-group expiration required'>
						<label class='control-label'>(Year)</label>
						<input class='form-control card-expiry-year' value="2020" required placeholder='YYYY' size='4' type='text' name="ccExpiryYear">
						<input  required   type='hidden' value="{{Request::segment(2)}}" name="user_id">
					</div>
				</div>
				<div class=''>
					<button class='form-control btn btn-primary submit-button' type='submit'>Pay »</button>
				</div>
				
			</form>
		</div>
    </div>
</section>
@stop

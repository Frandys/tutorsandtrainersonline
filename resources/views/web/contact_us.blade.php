@extends('layouts.dashboard')
@section('section')
@section('pageTitle', 'Contact Us')

<section class="inner-page-title">
    <div class="container">
        <h2>Contact Us</h2>
    </div>
</section>

<section class="inner-cotent">
    <div class="container">
		@include('message.message')

		<div class="form-wrap">
			<form class="form-horizontal" method="POST" action="{{ url('contact_us') }}">
				{{ csrf_field() }}

				<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
					<label for="email" class="control-label">Name</label>
					<input id="name" type="text" class="form-control" name="name" value="" required autofocus>
					@if ($errors->has('name'))
						<span class="help-block">
					<strong>{{ $errors->first('name') }}</strong>
				</span>
					@endif
				</div>
				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					<label for="email" class="control-label">E-Mail Address</label>


					<input id="email" type="email" class="form-control" name="email" value="" required autofocus>
					  @if ($errors->has('email'))
						<span class="help-block">
					<strong>{{ $errors->first('email') }}</strong>
				</span>
					@endif
				</div>

				<div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
					<label for="password" class=" control-label">Subject</label>
					<input id="subject" type="text" class="form-control" name="subject" required>
					@if ($errors->has('subject'))
						<span class="help-block">
					<strong>{{ $errors->first('subject') }}</strong>
				</span>
					@endif
				</div>

				<div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
					<label for="body" class=" control-label">Message</label>
					<textarea id="body" type="text" class="form-control" name="body" required></textarea>
					@if ($errors->has('body'))
						<span class="help-block">
					<strong>{{ $errors->first('body') }}</strong>
				</span>
					@endif
				</div>


				<div class="button-wrap">
					<button type="submit" class="btn btn-primary">
						Contact us
					</button>

				</div>
			</form>
		</div>
            
    </div>
</section>



@push('scripts')

@endpush
@stop

@extends('layouts.dashboard')
@section('section')
@section('pageTitle', 'Tutor Type')
<section class="inner-page-title">
	<div class="container">
		<h2>Tutor Type</h2>
	</div>
</section>
<section class="pricing-page">
	<div class="container">
		<div class="section-heading text-center anim d06 t24 fadeIn">
			<h1>Lorem ipsum dolor</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed aliquam a libero non porttitor. Maecenas sit amet libero id est dignissim ornare. Integer sagittis, elit ut rhoncus lacinia, enim diam semper dolor</p>
		</div>
		<div class="row listing-wrap">
			<div class="col-md-4">
				<div class="pricing-wrap">
					<div class="pricing-head">
						<p class="">SOLE TRADER</p>
						{{--<h2 class="package-type">Perfect if this is your first time!</h2>--}}
						<div class="package-icon"><i class="fa fa-database"></i></div>
						<div class="pricing-ribbon">
							<h5>featured</h5>
						</div>
					</div>
					<div class="price-wrap">

					</div>
					<ul class="table-list">
						<li>Self – Employed Freelancer</li>
						<li>Full UK Driving Licence</li>
						<li>Responsible for own Income Tax</li>
						<li>Responsible for own N.I.</li>
						<li>Responsible for own Pension</li>
						<li>Provide Public liability cert</li>
						<li>Provide Professional Indemnity cert</li>
						<li>Employers Liability cert</li>
			     	</ul>
					<a class="btn" href="{{url('register/tutor/').'/'.encrypt('1')}}">Order Now!</a>
				</div>
			</div>
			<div class="col-md-4">
				<div class="pricing-wrap">
					<div class="pricing-head">
						<p class="">INTERMEDIATE</p>
 						<div class="package-icon"><i class="fa fa-server"></i></div>
						
					</div>
					<div class="price-wrap">

					</div>
					<ul class="table-list">
						<li>Self – Employed Freelancer</li>
						<li>Full UK Driving Licence</li>
						<li>Responsible for own Income Tax</li>
						<li>Responsible for own N.I.</li>
						<li>Responsible for own Pension</li>
						<li>Provide Public liability cert</li>
						<li>Provide Professional Indemnity cert</li>
						<li>Employers Liability cert</li>
						<li><a href="#demo" data-toggle="collapse">Choose to add umbrella Company</a>
							<div id="demo" class="collapse">
								<p>Managed Tax</p>
								<p>Managed N.I</p>
								<p>Managed Pension</p>
								<p>Managed Holiday Pay</p>
								<p>Managed Mileage and Expenses</p>
							</div>
						</li>
					</ul>
					<a class="btn" href="{{url('register/tutor/').'/'.encrypt('2')}}">Order Now!</a>
				</div>
			</div>
			<div class="col-md-4">
				<div class="pricing-wrap">
					<div class="pricing-head">
						<p class="">LTD COMPANY STATUS</p>

						<div class="package-icon"><i class="fa fa-cubes"></i></div>

					</div>
					<div class="price-wrap">

					</div>
					<ul class="table-list">
						<li>Self – Employed Freelancer</li>
						<li>Full UK Driving Licence</li>
						<li>Responsible for own Income Tax</li>
						<li>Responsible for own N.I.</li>
						<li>Responsible for own Pension</li>
						<li>Provide Public liability cert</li>
						<li>Provide Professional Indemnity cert</li>
						<li>Employers Liability cert</li>
						<li>Company Bank Account</li>
						<li>Company Reg No.</li>
						<li>Vat Reg No, if applicable</li>

					</ul>
					<a class="btn" href="{{url('register/tutor/').'/'.encrypt('3')}}">Order Now!</a>
				</div>
			</div>
			
		</div>
	</div>
</section>@include('includes.middle_section')
@stop
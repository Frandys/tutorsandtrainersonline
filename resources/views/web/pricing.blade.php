@extends('layouts.dashboard')
@section('section')
@section('pageTitle', 'Pricing Plans')
<section class="inner-page-title">
	<div class="container">
		<h2>Pricing Plans</h2>
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
						<p class="">Starting At</p>
						<h2 class="package-type">Basic Plan</h2>
						<div class="package-icon"><i class="fa fa-database"></i></div>
						<div class="pricing-ribbon">
							<h5>featured</h5>
						</div>
					</div>
					<div class="price-wrap">
						<h1 class="price "><span class="currency">$</span>3<span class="deci">.00</span></h1>
						<h5 class="per">per year</h5>
					</div>
					<ul class="table-list">
						<li>20GB Storage</li>
						<li>Free Domain Register</li>
						<li>15GB Bandwidth</li>
						<li>20 Email Account</li>
						<li>Free Cpanel</li>
						<li>24/7 instant Support</li>
					</ul>
					<a class="btn" href="{{url('register/employer/').'/'.encrypt('1')}}">Order Now!</a>
				</div>
			</div>
			<div class="col-md-4">
				<div class="pricing-wrap">
					<div class="pricing-head">
						<p class="">Starting At</p>
						<h2 class="package-type">ADVANCE PLAN</h2>
						<div class="package-icon"><i class="fa fa-server"></i></div>
						
					</div>
					<div class="price-wrap">
						<h1 class="price "><span class="currency">$</span>3<span class="deci">.00</span></h1>
						<h5 class="per">per year</h5>
					</div>
					<ul class="table-list">
						<li>20GB Storage</li>
						<li>Free Domain Register</li>
						<li>15GB Bandwidth</li>
						<li>20 Email Account</li>
						<li>Free Cpanel</li>
						<li>24/7 instant Support</li>
					</ul>
					<a class="btn" href="{{url('register/employer/').'/'.encrypt('2')}}">Order Now!</a>
				</div>
			</div>
			<div class="col-md-4">
				<div class="pricing-wrap">
					<div class="pricing-head">
						<p class="">Starting At</p>
						<h2 class="package-type">Business Plan</h2>
						<div class="package-icon"><i class="fa fa-cubes"></i></div>
						<div class="pricing-ribbon">
							<h5>POPULAR</h5>
						</div>
					</div>
					<div class="price-wrap">
						<h1 class="price "><span class="currency">$</span>3<span class="deci">.00</span></h1>
						<h5 class="per">per year</h5>
					</div>
					<ul class="table-list">
						<li>20GB Storage</li>
						<li>Free Domain Register</li>
						<li>15GB Bandwidth</li>
						<li>20 Email Account</li>
						<li>Free Cpanel</li>
						<li>24/7 instant Support</li>
					</ul>
					<a class="btn" href="{{url('register/employer/').'/'.encrypt('3')}}">Order Now!</a>
				</div>
			</div>
			
		</div>
	</div>
</section>
<section id="counter-section">
	<div class="container">
		<div class="row text-center">
			<div class="col-md-3 tour">
				<div class="text-wrap">
					<i class="fas fa-users"></i>
					<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='500' data-delay='1' data-increment="1">0</div>
					<p>Available Tour</p>
				</div>
			</div>
			<div class="col-md-3 tutors">
				<div class="text-wrap">
					<i class="fas fa-trophy"></i>
					<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='1223' data-delay='1' data-increment="5">0</div>
					<p>Tutors Booked</p>
				</div>
			</div>
			<div class="col-md-3  teachers">
				<div class="text-wrap">
					<i class="far fa-gem"></i>
					<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='1290' data-delay='1' data-increment="5">0</div>
					<p>Certified Teachers</p>
				</div>
			</div>
			<div class="col-md-3 labs">
				<div class="text-wrap">
					<i class="fas fa-flask"></i>
					<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='1910' data-delay='1' data-increment="10">0</div>
					<p>Library and Labs</p>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="principal-words">
	<div class="container">
		<h2 class="slide-header text-center">Message from principal</h2>
		<div class="textimonial-wrap">
			<div id="owl-test" class="owl-carousel owl-theme">
				<div class="item">
					<div class="testi-wrap">
						<div class="text text-center">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
						</div>
						<div class="profile-mata">	
							<div class="row no-gutters">
								<div class="col-sm-4">
									<div class="image-wrap">
										<img src="images/team.jpg" class="img-fluid">
									</div>
								</div>
								<div class="col-sm-8">
									<div class="text-wrap">
										<h3>John Doe</h3>
										<p>Graphics Designer</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="testi-wrap">
						<div class="text text-center">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
						</div>
						<div class="profile-mata">	
							<div class="row no-gutters">
								<div class="col-sm-4">
									<div class="image-wrap">
										<img src="images/team.jpg" class="img-fluid">
									</div>
								</div>
								<div class="col-sm-8">
									<div class="text-wrap">
										<h3>John Doe</h3>
										<p>Graphics Designer</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="testi-wrap ">
						<div class="text text-center">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
						</div>
						<div class="profile-mata">	
							<div class="row no-gutters">
								<div class="col-sm-4">
									<div class="image-wrap">
										<img src="images/team.jpg" class="img-fluid">
									</div>
								</div>
								<div class="col-sm-8">
									<div class="text-wrap">
										<h3>John Doe</h3>
										<p>Graphics Designer</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@stop
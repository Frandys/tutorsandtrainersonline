<!doctype html>
<html lang="en">
<head>
   <title>@yield('pageTitle') - {{ config('app.name', 'Tutorsandtrainersonline') }}</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="{{ asset("assets/web/stylesheets/styles.css") }}" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

 	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800|Raleway:400,500,600,700,800" rel="stylesheet">
</head>
<body>
	@yield('body')
	<footer id="main-footer">
		<div class="container">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<img src="{{asset('web/images/logo-2.png')}}" class="img-fluid">
					</div>
					<div class="col-sm-4">
						<div class="footer-text">
							<h3>Our Address</h3>
							<ul class="address">
								<li class="home">
									<span>132 Jefferson Avenue, Suite 22, Redwood City, CA 94872, USA</span>
								</li>
								<li class="tel">
									<a href="tel:+0123456789">+0123456789</a>
								</li>
								<li class="mail">
									<a href="mailto:gurinder.singh@triusmail.com">info@mail.com</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="footer-text">
							<h3>Newsletter</h3>
							<p>Subscribe dolor sit amet, consectetur adipiscing elit, sed do eiusmod </p>
							<form class="form-inline" >
								<input type="text" class="form-control mb-2 mr-sm-2" id="email" placeholder="Email Address">
								<button type="button" id="invite_user_btn" class="btn btn-primary mb-2"><i style="display: none;" class="fa fa-spinner fa-spin"></i>Subscribe</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<script src="{{ asset("assets/web/scripts/frontend.js") }}" type="text/javascript"></script>
	<script>    $(function () {

            $('#modelsbun').click(function () {
                $('#email').val('');
                $('.fa-spin').hide();
                $("#Content").html('');
            });
            $('#invite_user_btn').click(function () {
                $("#invite_user_btn").prop("disabled",true);
                $('.fa-spin').show();
                $.ajax({
                    type: 'post',
                    url: '{{url('subscribe')}}',
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'email': $('#email').val()
					},
                    success: function (data) {
                        // $("#Content").html(data);
                        // $("#Content").show();
                        bootoast.toast({
                            message: data
                        });
                        $("#invite_user_btn").prop("disabled",false);
                        $('.fa-spin').hide();
                    }
                });
            });
        });</script>
	@stack('scripts')
</body>
</html>
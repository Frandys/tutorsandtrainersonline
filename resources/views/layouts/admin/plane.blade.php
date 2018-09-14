<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
	<meta charset="utf-8"/>
	<title>Tutorsandtrainersonline</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<meta content="" name="description"/>
	<meta content="" name="author"/>

	<link rel="stylesheet" href="{{ asset("assets/admin/stylesheets/styles.css") }}" />
	
</head>
<body>
	@yield('body')

	<script src="{{ asset("assets/admin/scripts/frontend.js") }}" type="text/javascript"></script>
	<script>
		//Sidebar-nav
		$(document).ready(function() {
			$(".openbtn").click(function(){
				
				document.getElementById("mySidenav").style.width = "250px";
			});

			$(".closebtn").click(function(){
			
				document.getElementById("mySidenav").style.width = "0px";
			});
		});
		
	</script>
	@stack('scripts')
	
	
	
</body>
</html>
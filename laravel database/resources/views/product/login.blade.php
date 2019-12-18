@extends('layouts.admin_master')
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Admin Login Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Bootstrap Core CSS -->
<link href="{{ asset('css/bootstrap.css')}}" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="{{ asset('css/style.css')}}" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS-->
<link href="{{ asset('css/font-awesome.css')}}" rel="stylesheet"> 
<!-- //font-awesome icons CSS-->

 <!-- side nav css file -->
 <link href="{{ asset('css/SidebarNav.min.css')}}" media='all' rel='stylesheet' type='text/css'/>
 <!-- side nav css file -->
 
 <!-- js-->
<script src="{{ asset('js/jquery-1.11.1.min.js')}}"></script>
<script src="{{ asset('js/modernizr.custom.js')}}"></script>

<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts-->
 
<!-- Metis Menu -->
<script src="{{ asset('js/metisMenu.min.js')}}"></script>
<script src="{{ asset('js/custom.js')}}"></script>
<link href="{{ asset('css/custom.css')}}" rel="stylesheet">
<!--//Metis Menu -->
<script src="{{ asset('jquery-3.4.1.js')}}" type="text/javascript"></script>
        <script src="{{ asset('jquery.validate.js')}}" type="text/javascript"></script>
        <script>
        $(document).ready(function(){
           $("#myform").validate();
        });
        </script>
        <style>
            .error{
                color: red;
            }
        </style>

</head> 
<body class="cbp-spmenu-push">
<div class="main-content">

@section('content')

		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page login-page ">
				<h2 class="title1">Admin Login</h2>
				<div class="widget-shadow">
					<div class="login-body">
                                            <form method="post" id="myform">
							<input type="email" class="user required email" name="email" placeholder="Enter Your Email">
							<input type="password" name="password" class="lock required" placeholder="Password">
							<div class="forgot-grid">
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Remember me</label>
								<div class="forgot">
                                                                    <a href="admin-forgot-pass.php">forgot password?</a>
								</div>
								<div class="clearfix"> </div>
							</div>
							<input type="submit" name="btn1" value="Sign In">
							<div class="registration">
								Don't have an account ?
                                                                <a class="" href="admin-signup.php">
									Create an account
								</a>
							</div>
						</form>
					</div>
				</div>
				
			</div>
		</div>
		@endsection
	</div>
	
	<!-- side nav js -->
	<script src="{{ asset('js/SidebarNav.min.js')}}" type='text/javascript'></script>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>
	<!-- //side nav js -->
	
	<!-- Classie --><!-- for toggle left push menu script -->
		<script src="{{ asset('js/classie.js')}}"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!-- //Classie --><!-- //for toggle left push menu script -->
		
	<!--scrolling js-->
	<script src="{{ asset('js/jquery.nicescroll.js')}}"></script>
	<script src="{{ asset('js/scripts.js')}}"></script>
	<!--//scrolling js-->
	
	<!-- Bootstrap Core JavaScript -->
   <script src="{{ asset('js/bootstrap.js')}}"> </script>
	<!-- //Bootstrap Core JavaScript -->
   
</body>
</html>

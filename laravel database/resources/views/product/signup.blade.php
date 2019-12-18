
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
<title>Admin SignUp</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>


<!-- Bootstrap Core CSS -->
<link href="{{ asset('css/bootstrap.css')}}" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="{{ asset('css/style.css')}}" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="{{ asset('css/font-awesome.css')}}" rel="stylesheet"> 
<!-- //font-awesome icons CSS -->

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

<script src="{{ asset('js/jquery-3.4.1.js')}}" type="text/javascript"></script>
        <script src="{{ asset('js/jquery.validate.js')}}" type="text/javascript"></script>
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

		<div id="page-wrapper">
			<div class="main-page signup-page">
				<h2 class="title1">Admin SignUp</h2>
				<div class="sign-up-row widget-shadow">
					<h5>Personal Information :</h5>
                                        <form method="post" id="myform">
					
					<div class="sign-u">
                                            <input type="email" name="email" class="required email" placeholder="Email Address">
						<div class="clearfix"> </div>
					</div>
					
					<h6>Login Information :</h6>
					<div class="sign-u">
                                            <input type="password" name="password" class="required" placeholder="Password">
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
                                            <input type="password" name="cpass" class="required" placeholder="Confirm Password" >
						</div>
						<div class="clearfix"> </div>
					<div class="sub_home">
							<input type="submit" name="btn1" value="Submit">
						<div class="clearfix"> </div>
					</div>
					<div class="registration">
						Already Registered.
                                                <a class="" href="admin-login.php">
							Login
						</a>
					</div>
				</form>
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
	
</body>
</html>
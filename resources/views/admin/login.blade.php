<!DOCTYPE html>
<html lang="en">
  	<head>
	    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	    <!-- Meta, title, CSS, favicons, etc. -->
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="icon" href="{{ asset('images/favicon.ico')}}" type="image/ico" />

	    <title>Scorpio LT Pharmacy</title>

	    <!-- Bootstrap -->
	    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
	    <!-- Font Awesome -->
	    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
	    <!-- NProgress -->
	    <link href="{{ asset('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
	    <!-- Animate.css -->
	    <link href="{{ asset('vendors/animate.css/animate.min.css') }}" rel="stylesheet">

	    <!-- Custom Theme Style -->
	    <link href="{{ asset('build/css/custom.min.css') }}" rel="stylesheet">
	</head>

	<body class="login">
      	<div class="login_wrapper">
	        <div class="animate form login_form">
	          	<section class="login_content">
		            <form action="{{ route('admin-post-login')}}" method="post">
		            	<input type="hidden" name="_token" value="{{csrf_token()}}"/>
		              	<h1>Login Form</h1>
		              	<div>
		                	<input type="text" class="form-control" placeholder="Username" required="" name="login_id" />
		              	</div>
		              	<div>
		                	<input type="password" class="form-control" placeholder="Password" required="" name="password" />
		              	</div>
		              	<div>
		                	<input type="submit" class="btn btn-default submit" style="border: 1px solid" value="Log in">
		                	<a class="reset_pass" href="#">Lost your password?</a>
		              	</div>

		              	<div class="clearfix"></div>

		              	<div class="separator">
		                	<p class="change_link">New to site?
		                  		<a href="{{ route('admin-register')}}" class="to_register" > Create Account </a>
		                	</p>
		                	<div class="clearfix"></div>
		                	<br />
			                <div>
			                  	<img src="{{ asset('images/Newlogo3.png')}}" width="65%">
			                  	<p>Copyright © 2020 Scorpio Pharmacy. Website designed by J</p>
			                </div>
		              	</div>
		            </form>
	          	</section>
	        </div>
      	</div>
  	</body>
</html>

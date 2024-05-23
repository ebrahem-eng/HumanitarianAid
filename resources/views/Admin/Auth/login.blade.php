<!doctype html>
<html lang="en">

	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="Responsive Bootstrap Dashboards">
		<meta name="author" content="Bootstrap Gallery">
		<link rel="shortcut icon" href="{{asset('DashboardAssets/img/favicon.svg')}}" />

		<!-- Title -->
		<title>Best Admin Templates - 404</title>


		<!-- Font for coming soon page -->
		<link href="https://fonts.googleapis.com/css?family=Erica+One&display=swap" rel="stylesheet">

		<!-- *************
			************ Common Css Files *************
		************ -->
		<!-- Bootstrap css -->
		<link rel="stylesheet" href="{{asset('DashboardAssets/css/bootstrap.min.css')}}">
		<!-- Icomoon Font Icons css -->
		<link rel="stylesheet" href="{{asset('DashboardAssets/fonts/style.css')}}">
		<!-- Main css -->
		<link rel="stylesheet" href="{{asset('DashboardAssets/css/main.min.css')}}">

		<!-- *************
			************ Vendor Css Files *************
		************ -->
		<!-- Particles CSS -->
		<link rel="stylesheet" href="{{asset('DashboardAssets/vendor/particles/particles.css')}}">

	</head>

	<body class="authentication">

		<div id="particles-js"></div>
		<div class="countdown-bg"></div>

		{{-- <div class="error-screen">
			<h1>404</h1>
			<h5>We're sorry!<br />The page you have requested cannot be found.</h5>
			<a href="index.html" class="btn btn-primary">Go back to Dashboard</a>
		</div> --}}


        	<!-- Container start -->
		<div class="error-screen">

			<form action="{{route('admin.store.login')}}" method="POST" style="margin-right: 200px;">
                @csrf
				<div class="row justify-content-md-center">
					<div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
						<div class="login-screen">
							<div class="login-box">
								
                                <img style="height:170px; width:170px; border-radius: 20px;" src="{{asset('DashboardAssets/img/login.jpg')}}" alt="Admin Dashboards" />

					
								<h5></h5>
								<div class="form-group">
									<input style="border-radius: 20px;" type="text" class="form-control" placeholder="Email Address" name="email" />
								</div>
								<div class="form-group">
									<input style="border-radius: 20px;" type="password" class="form-control" placeholder="Password" name="password" />
								</div>
								<div class="actions mb-4">
									<button style="margin-right: 100px;" type="submit" class="btn btn-primary">Login</button>
								</div>
								<div class="forgot-pwd">
									<a class="link" href="forgot-pwd.html">Forgot password?</a>
								</div>
								<hr>
								<div class="actions align-left">
									<span class="additional-link">New here?</span>
									<a href="signup.html" class="btn btn-secondary">Create an Account</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>

		</div>
		<!-- Container end -->

		<!--**************************
			**************************
				**************************
							Required JavaScript Files
				**************************
			**************************
		**************************-->
		<!-- Required jQuery first, then Bootstrap Bundle JS -->
		<script src="{{asset('DashboardAssets/js/jquery.min.js')}}"></script>
		<script src="{{asset('DashboardAssets/js/bootstrap.bundle.min.js')}}"></script>
		<script src="{{asset('DashboardAssets/js/moment.js')}}"></script>

		<!-- *************
			************ Vendor Js Files *************
		************* -->
		<!-- Particles JS -->
		<script src="{{asset('DashboardAssets/vendor/particles/particles.min.js')}}"></script>
		<script src="{{asset('DashboardAssets/vendor/particles/particles-custom-error.js')}}"></script>

	</body>

</html>
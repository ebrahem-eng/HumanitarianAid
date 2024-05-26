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
		<title>Best Admin Templates - Default Layout</title>


        @include('Layouts.Employe.Reconnaissance.LinkHeader')

	</head>

	<body>

		<!-- Page wrapper start -->
		<div class="page-wrapper">

			<!-- Sidebar wrapper start -->
		
            @include('Layouts.Employe.Reconnaissance.Sidebar')

			<!-- Sidebar wrapper end -->

			<!-- Page content start  -->
			<div class="page-content">

				<!-- Main container start -->
				<div class="main-container">

					<!-- Header start -->
					
                    @include('Layouts.Employe.Reconnaissance.Header')

					<!-- Header end -->

					<!-- Page header start -->
					<div class="page-header">

						<!-- Breadcrumb start -->
						<ol class="breadcrumb">
							<li class="breadcrumb-item">Account Settings</li>
						</ol>
						<!-- Breadcrumb end -->

						<!-- App actions start -->
						<ul class="app-actions">
							<li>
								<a href="#">
									<i class="icon-export"></i> Export
								</a>
							</li>
						</ul>
						<!-- App actions end -->

					</div>
					<!-- Page header end -->

					<!-- Row start -->
					<div class="row gutters">
                        <form action="{{route('employe.reconnaissance.employe.profile.update' , $reconnaissanceEmployes->id)}}" method="POST">
@csrf
@method('put')
						<div class="col-lg-9 col-sm-12 col-12">
							<div class="card h-100">
								<div class="card-body">
									<div class="row gutters">
										<div class="col-sm-12">
											<h6 class="mb-3 text-primary">Personal Details</h6>
										</div>
										<div class="col-sm-6 col-12">
											<div class="form-group">
												<label for="fullName">Full Name</label>
												<input type="text" class="form-control" id="fullName" name="name" value="{{$reconnaissanceEmployes->name}}" placeholder="Enter full name">
											</div>
										</div>
										<div class="col-sm-6 col-12">
											<div class="form-group">
												<label for="eMail">Email</label>
												<input type="email" class="form-control" id="eMail" name="email" value="{{$reconnaissanceEmployes->email}}" placeholder="Enter email ID">
											</div>
										</div>
										<div class="col-sm-6 col-12">
											<div class="form-group">
												<label for="phone">Phone</label>
												<input type="tel" class="form-control" id="phone" name="phone" value="{{$reconnaissanceEmployes->phone}}" placeholder="Enter phone number">
											</div>
										</div>
										<div class="col-sm-6 col-12">
											<div class="form-group">
												<label for="website">Age</label>
												<input type="number" class="form-control" id="website" name="age" value="{{$reconnaissanceEmployes->age}}" placeholder="Website url">
											</div>
										</div>

                                        <div class="col-sm-4 col-12">
											<div class="form-group">
                                                <label for="inputPwd">Gender</label>
												<select class="form-control form-control-lg" name="gender" required>
													<option value="1"
                                                    {{$reconnaissanceEmployes->gender === 1 ? 'selected' : ''}}>Female</option>
                                                    <option value="0"
                                                    {{$reconnaissanceEmployes->gender === 0 ? 'selected' : ''}}>Male</option>
												</select>
											</div>
										</div>

                                        <div class="col-sm-6 col-12">
											<div class="form-group">
												<label for="website">Address</label>
												<input type="text" class="form-control" id="website" name="address" value="{{$reconnaissanceEmployes->address}}" placeholder="Website url">
											</div>
										</div>

									</div>
		
									<div class="row gutters">
										<div class="col-sm-12">
											<div class="text-right">
												<button type="submit" id="submit" name="submit" class="btn btn-primary">Update</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                        </form>
					</div>
					<!-- Row end -->

				</div>
				<!-- Main container end -->

			</div>
			<!-- Page content end -->

		</div>
		<!-- Page wrapper end -->

		<!--**************************
			**************************
				**************************
							Required JavaScript Files
				**************************
			**************************
		**************************-->
        @include('Layouts.Employe.Reconnaissance.LinkJS')

	</body>

</html>
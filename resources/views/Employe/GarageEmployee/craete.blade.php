<!doctype html>
<html lang="en">

	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="Responsive Bootstrap Admin Dashboards">
		<meta name="author" content="Bootstrap Gallery">
		<link rel="shortcut icon" href="img/favicon.svg" />

		<!-- Title -->
		<title>Best Admin Templates - Forms</title>


		<!-- *************
			************ Common Css Files *************
		************ -->
	
        @include('Layouts.Employe.Garage.LinkHeader')

		<!-- *************
			************ Vendor Css Files *************
		************ -->

	</head>

	<body>

		<!-- Page wrapper start -->
		<div class="page-wrapper">

			<!-- Sidebar wrapper start -->
		
            @include('Layouts.Employe.Garage.Sidebar')

			<!-- Sidebar wrapper end -->

			<!-- Page content start  -->
			<div class="page-content">

				<!-- Main container start -->
				<div class="main-container">

					<!-- Header start -->
		
                    @include('Layouts.Employe.Garage.Header')

					<!-- Header end -->

					<!-- Page header start -->
					<div class="page-header">

						<!-- Breadcrumb start -->
						<ol class="breadcrumb">
							<li class="breadcrumb-item">Create Vehicle</li>
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

						<div class="col-sm-12">
							<div class="card">

                                 {{--  message section  --}}
                            @if (session('successMessage'))
                            <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show"
                                role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ session('successMessage') }}
                            </div>
                        @endif
                        @if (session('errorMessage'))
                            <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show"
                                role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ session('errorMessage') }}
                            </div>
                        @endif

                        {{--  end message section  --}}

                                <form action="{{route('employee.garage.store')}}" method="POST">
                                    @csrf
								<div class="card-body">
									<div class="row gutters">
										<div class="col-sm-4 col-12">
											<div class="form-group">
												<label for="inputName">Name</label>
												<input type="text" class="form-control" id="inputName" placeholder="Enter Vehicle Name" name="name" required>
											</div>
										</div>
										<div class="col-sm-4 col-12">
											<div class="form-group">
                                                <label for="inputType">Type</label>
												<select class="form-control form-control-lg" name="type" required>
													<option value="0">Large trucks</option>
                                                    <option value="1">Small and Medium trucks</option>                                           
										            <option value="2">Four wheel drive cars</option>
													<option value="3">Mini buses (vans)</option>
													<option value="4">Medically equipped vehicles</option>
                                                    <option value="5">Motorcycles and bicycles</option>
												</select>
											</div>
										</div>
										<div class="col-sm-4 col-12">
											<div class="form-group">
												<label for="inputCap">Capacity</label>
												<input type="number" class="form-control" id="inputCap" placeholder="capacity" name="capacity"required>
											</div>
										</div>
                                        <div class="col-sm-4 col-12">
											<div class="form-group">
                                                <label for="inputAvaSt">Available Status</label>
												<select class="form-control form-control-lg" name="availableStatus" required>
													<option value="1">Active</option>
                                                    <option value="0">Not Active</option>
												</select>
											</div>
										</div>
                                        <div class="col-sm-4 col-12">
											<div class="form-group">
												<label for="inputQua">Quantity</label>
												<input type="number" class="form-control" id="inputQua" placeholder="Quantity" name="quantity"required>
											</div>
										</div>
										
									</div>
                                    <div class="row gutters">
                                        <button type="submit" class="btn btn-primary mb-2">Confirm</button>
                                    </div>

								</div>
                            </form>
							</div>
						</div>

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
		<!-- Required jQuery first, then Bootstrap Bundle JS -->
        @include('Layouts.Employe.Garage.LinkJS')

</body>

</html>
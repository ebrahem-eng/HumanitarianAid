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
	
        @include('Layouts.Admin.LinkHeader')

		<!-- *************
			************ Vendor Css Files *************
		************ -->

	</head>

	<body>

		<!-- Page wrapper start -->
		<div class="page-wrapper">

			<!-- Sidebar wrapper start -->
		
            @include('Layouts.Admin.Sidebar')

			<!-- Sidebar wrapper end -->

			<!-- Page content start  -->
			<div class="page-content">

				<!-- Main container start -->
				<div class="main-container">

					<!-- Header start -->
		
                    @include('Layouts.Admin.Header')

					<!-- Header end -->

					<!-- Page header start -->
					<div class="page-header">

						<!-- Breadcrumb start -->
						<ol class="breadcrumb">
							<li class="breadcrumb-item">Create Association</li>
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

                                <form action="{{route('admin.association.store')}}" method="POST">
                                    @csrf
								<div class="card-body">
									<div class="row gutters">
										<div class="col-sm-4 col-12">
											<div class="form-group">
												<label for="inputName">Name</label>
												<input type="text" class="form-control" id="inputName" placeholder="Enter Association Name" name="name" required>
											</div>
										</div>
										<div class="col-sm-4 col-12">
											<div class="form-group">
												<label for="inputEmail">Email</label>
												<input type="email" class="form-control" id="inputEmail" placeholder="Enter email" name="email" required>
											</div>
										</div>
										<div class="col-sm-4 col-12">
											<div class="form-group">
												<label for="inputPwd">Password</label>
												<input type="password" class="form-control" id="inputPwd" placeholder="Password" name="password">
											</div>
										</div>
                                        <div class="col-sm-4 col-12">
											<div class="form-group">
                                                <label for="inputPwd">Type</label>
												<select class="form-control form-control-lg" name="type">
													<option value="Charity">Charity</option>
                                                    <option value="Cooperative">Cooperative</option>
												</select>
											</div>
										</div>

                                        <div class="col-sm-4 col-12">
											<div class="form-group">
												<label for="inputName">Address</label>
												<input type="text" class="form-control" id="inputName" placeholder="Enter Address" name="address" required>
											</div>
										</div>


                                        <div class="col-sm-4 col-12">
											<div class="form-group">
												<label for="inputName">Street</label>
												<input type="text" class="form-control" id="inputName" placeholder="Enter Street" name="street" required>
											</div>
										</div>

                                        <div class="col-sm-4 col-12">
											<div class="form-group">
												<label for="inputName">Details</label>
												<input type="text" class="form-control" id="inputName" placeholder="Enter Details" name="details" >
											</div>
										</div>

									</div>

                                    <br>

                                    <div class="row gutters">

                                        <input type="hidden" id="latitude" name="latitude">
                                        <br>
                                        <input type="hidden" id="longitude" name="longitude">
                                    </div>
                                    <div id="map" style="height: 500px; width: 1000px;">
                                       
                                    </div>
                                    <br>

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
	@include('Layouts.Admin.LinkJS')

    <script>
        var map, marker;

        function initMap() {
            // The location of the user
            var myLatLng = {
                lat: -34.397,
                lng: 150.644
            }; // default location

            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    myLatLng = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 15,
                        center: myLatLng
                    });

                    marker = new google.maps.Marker({
                        position: myLatLng,
                        map: map,
                        draggable: true,
                        title: 'Drag me!'
                    });

                    // Set default values for latitude and longitude
                    document.getElementById('latitude').value = myLatLng.lat;
                    document.getElementById('longitude').value = myLatLng.lng;

                    // Add event listener to marker for position update
                    google.maps.event.addListener(marker, 'dragend', function(event) {
                        document.getElementById('latitude').value = this.getPosition().lat();
                        document.getElementById('longitude').value = this.getPosition().lng();
                    });

                }, function() {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }
        }
    </script>

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBddryhfLC4gYIvreVc9YDY4gLv2BrhhmY&callback=initMap"></script>
	</body>

</html>
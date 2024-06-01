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


        @include('Layouts.Employe.AidReceiving.LinkHeader')

	</head>

	<body>

		<!-- Page wrapper start -->
		<div class="page-wrapper">

			<!-- Sidebar wrapper start -->
		
            @include('Layouts.Employe.AidReceiving.Sidebar')

			<!-- Sidebar wrapper end -->

			<!-- Page content start  -->
			<div class="page-content">

				<!-- Main container start -->
				<div class="main-container">

					<!-- Header start -->
					
                    @include('Layouts.Employe.AidReceiving.Header')

					<!-- Header end -->

					<!-- Page header start -->
					<div class="page-header">

						<!-- Breadcrumb start -->
						<ol class="breadcrumb">
							<li class="breadcrumb-item">create a new list </li>
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
				
                                <form action="{{route('employe.receivingAid.store.list.receipt',$id)}}" method="POST">
                                    @csrf
									@method('put')
								<div class="card-body">
									<div class="row gutters">
										<div class="col-sm-4 col-12">
											<div class="form-group">
												<label for="inputAidType">Type Of Aid</label>
												<select class="form-control form-control-lg" name="aidType" placeholder="Enter Type of Aid" required>
													<option value="medical" >Medical</option>
													<option value="money" >Moeny</option>
													<option value="food" >Food</option>
													<option value="cloth" >Cloth</option>
												</select>											
											</div>
										</div>
										<div class="col-sm-4 col-12">
											<div class="form-group">
												<label for="inputQuantity">Quantity</label>
												<input type="number" class="form-control" id="inputQuantity" placeholder="Enter Quantity" name="quantity" required>
											</div>
										</div>
										<div class="col-sm-4 col-12">
											<div class="form-group">
												<label for="inputNote">Note</label>
												<input type="text" class="form-control" id="inputNote" placeholder="Entet Your Note" name="note" required>
											</div>
										</div>
										<div class="col-sm-4 col-12">
											<div class="form-group">
												<label for="inputPwd">Employee Name</label>
												<input type="text" class="form-control" id="inputEmployeeName" value="{{ Auth()->guard('employe')->user()->name }}" name="name" required>
											</div>
										</div>
										
										@foreach ($newAidReceivingEmployes as $newAidReceivingEmploye)
						                @endforeach
										<div class="col-sm-4 col-12">
											<div class="form-group">
												<label for="inputLocation">Location</label>
												@foreach ($newAidReceivingEmploye->LocationForAidReceiving as $AidReceivingLocation)
												<select class="form-control" id="inputName" placeholder="Enter Location" name="LocationsForAidReceivingCampaignsID" required>
													<option>{{ $AidReceivingLocation->address }} - {{ $AidReceivingLocation->street }}</option>
												</select>
												@endforeach
											</div>	
										</div>									
									<div class="col-sm-4 col-12">
                                        <button type="submit" class="btn btn-primary mb-2">Add New</button>
									</div>								
								</div>
								<div class="col-sm-4 col-12">
									<button type="submit" class="btn btn-primary mb-2">Save</button>
								</div>	
                            </form>
							</div>
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
        @include('Layouts.Employe.AidReceiving.LinkJS')

	</body>

</html>
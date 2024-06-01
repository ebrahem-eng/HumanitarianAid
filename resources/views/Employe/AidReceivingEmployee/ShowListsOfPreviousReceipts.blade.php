<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap Dashboards">
    <meta name="author" content="Bootstrap Gallery">
    <link rel="shortcut icon" href="img/favicon.svg" />

    <!-- Title -->
    <title>Best Admin Templates - DataTables</title>


    <!-- *************
   ************ Common Css Files *************
  ************ -->

    @include('Layouts.Employe.AidReceiving.LinkHeader')

    <!-- *************
   ************ Vendor Css Files *************
  ************ -->

    <!-- Data Tables -->
    <link rel="stylesheet" href="vendor/datatables/dataTables.bs4.css" />
    <link rel="stylesheet" href="vendor/datatables/dataTables.bs4-custom.css" />
    <link href="vendor/datatables/buttons.bs.css" rel="stylesheet" />

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
                        <li class="breadcrumb-item">Data Tables</li>
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

                        <div class="table-container">

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

                            <div class="t-header"> Aid Receivig Table </div>
                            <div class="table-responsive">
                                <table id="basicExample" class="table custom-table">
                                    <thead>
                                        <tr>
                                            <th>Type Of Aid</th>
                                            <th>Quantity</th>
                                            <th>Note</th>
                                            <th>Employee Name</th>
                                            <th>Location</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($newAidReceivingEmployes as $newAidReceivingEmploye)
                                            <tr>
                                                <td>{{ $newAidReceivingEmploye->name }}</td>
                                                <td>{{ $newAidReceivingEmploye->date }}</td>
                                                <td>{{ $newAidReceivingEmploye->startTime }}</td>
                                                <td>{{ $newAidReceivingEmploye->endTime }}</td>
                                                <td>{{ $newAidReceivingEmploye->priority }}</td>
                                                <td>{{ $newAidReceivingEmploye->note }}</td>
                                                <td>
                                                    @foreach ($newAidReceivingEmploye->CampaignStaff as $AidReceivingEmployee)
                                                        {{ $AidReceivingEmployee->Employee->name }}
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($newAidReceivingEmploye->CampaignStaff as $AidReceivingEmployee)
                                                        {{ $AidReceivingEmployee->Employee->email }}
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($newAidReceivingEmploye->CampaignStaff as $AidReceivingEmployee)
                                                        {{ $AidReceivingEmployee->Employee->phone }}
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($newAidReceivingEmploye->AidReceivingCampaignVehicle as $AidReceivingVehicle)
                                                        {{ $AidReceivingVehicle->vehicle->name }} -
                                                        {{ $AidReceivingVehicle->vehicle->type }} -
                                                        {{ $AidReceivingVehicle->vehicle->Capacity }}
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($newAidReceivingEmploye->LocationForAidReceiving as $AidReceivingLocation)
                                                        {{ $AidReceivingLocation->address }} -
                                                        {{ $AidReceivingLocation->street }}
                                                    @endforeach
                                                </td>
                                                <td>{{ $newAidReceivingEmploye->admin->name }}</td>
                                                <td>{{ $newAidReceivingEmploye->created_at }}</td>
                                                <td>
                                                    <div class="row gutters">
                                                        <div class="col-sm-12">
                                                            <div class="card-body">
                                                                <div class="custom-dropdown-group">
                                                                    <div class="">
                                                                        
                                                                        <a href="{{route('employe.receivingAid.create.list.receipt')}}" class="btn btn-primary dropdown-toggle" type="button" aria-haspopup="true" aria-expanded="false" > Create New List</a>

                                                                    </div>
                                                                    <br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    <script src="{{ asset('DashboardAssets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('DashboardAssets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('DashboardAssets/js/moment.js') }}"></script>


    <!-- *************
   ************ Vendor Js Files *************
  ************* -->
    <!-- Slimscroll JS -->
    <script src="{{ asset('DashboardAssets/vendor/slimscroll/slimscroll.min.js') }}"></script>
    <script src="{{ asset('DashboardAssets/vendor/slimscroll/custom-scrollbar.js') }}"></script>

    <!-- Data Tables -->
    <script src="{{ asset('DashboardAssets/vendor/datatables/dataTables.min.js') }}"></script>
    <script src="{{ asset('DashboardAssets/vendor/datatables/dataTables.bootstrap.min.js') }}"></script>

    <!-- Custom Data tables -->
    <script src="{{ asset('DashboardAssets/vendor/datatables/custom/custom-datatables.js') }}"></script>
    <script src="{{ asset('DashboardAssets/vendor/datatables/custom/fixedHeader.js') }}"></script>

    <!-- Download / CSV / Copy / Print -->
    <script src="{{ asset('DashboardAssets/vendor/datatables/buttons.min.js') }}"></script>
    <script src="{{ asset('DashboardAssets/vendor/datatables/jszip.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="{{ asset('DashboardAssets/vendor/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('DashboardAssets/vendor/datatables/html5.min.js') }}"></script>
    <script src="{{ asset('DashboardAssets/vendor/datatables/buttons.print.min.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('DashboardAssets/js/main.js') }}"></script>

</body>

</html>

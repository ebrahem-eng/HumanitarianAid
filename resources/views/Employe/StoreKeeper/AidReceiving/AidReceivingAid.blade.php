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

    @include('Layouts.Employe.StoreKeeper.LinkHeader')

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

        @include('Layouts.Employe.StoreKeeper.Sidebar')

        <!-- Sidebar wrapper end -->

        <!-- Page content start  -->
        <div class="page-content">

            <!-- Main container start -->
            <div class="main-container">

                <!-- Header start -->

                @include('Layouts.Employe.StoreKeeper.Header')

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

                            <div class="t-header">Aid For Aid Receivig Table </div>
                            <div class="table-responsive">
                                <table id="basicExample" class="table custom-table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Aid Type</th>
                                            <th>Quantity</th>
                                            <th>Note</th>
                                            <th>Status Accept Store Keeper</th>
                                            <th>Reason Of Refuse</th>
                                            <th>Address</th>
                                            <th>Street</th>
                                            <th>Employee Name</th>
                                            <th>Employee Email</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($aidForAidReceivings as $aidForAidReceiving)
                                            <tr>
                                                <td>{{ $aidForAidReceiving->name }}</td>
                                                <td>{{ $aidForAidReceiving->aidType }}</td>
                                                <td>{{ $aidForAidReceiving->quantity }}</td>
                                                <td>{{ $aidForAidReceiving->note }}</td>
                                                <td>
                                                    @if ($aidForAidReceiving->statusAcceptStoreKeeper == 0)
                                                        <div class="btn btn-primary">
                                                            Pending Accept
                                                        </div>
                                                    @elseif($aidForAidReceiving->statusAcceptStoreKeeper == 1)
                                                        <div class="btn btn-success">
                                                            Accepted
                                                        </div>
                                                    @elseif($aidForAidReceiving->statusAcceptStoreKeeper == 2)
                                                        <div class="btn btn-danger">
                                                            Rejected
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>{{ $aidForAidReceiving->reasonOfRefuse }}</td>
                                                <td>{{ $aidForAidReceiving->LocationForAidReceiving->address }}</td>
                                                <td>{{ $aidForAidReceiving->LocationForAidReceiving->street }}</td>
                                                <td>{{ $aidForAidReceiving->EmployeAidReciept->Employee->name }}</td>
                                                <td>{{ $aidForAidReceiving->EmployeAidReciept->Employee->email }}</td>
                                                <td>{{ $aidForAidReceiving->created_at }}</td>
                                                <td>
                                                    @if($aidForAidReceiving->statusAcceptStoreKeeper == 0)
                                                    <div class="row gutters">
                                                        <div class="col-sm-12">
                                                            <div class="card-body">
                                                                <div class="custom-dropdown-group">
                                                                    <div class="dropdown">
                                                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton-{{ $aidForAidReceiving->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            Action
                                                                        </button>
                                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton-{{ $aidForAidReceiving->id }}">
                                                                            <!-- Accept Form -->
                                                                            <form method="post" action="{{ route('employe.storeKeeper.aidReceiving.aid.accept', $aidForAidReceiving->id) }}">
                                                                                @csrf
                                                                                @method('put')
                                                                                <input type="hidden" name="aidReceivingID" value="{{ $aidReceivingID }}" />
                                                                                <button class="dropdown-item" type="submit">Accept</button>
                                                                            </form>
                                
                                                                            <button class="dropdown-item" type="button" onclick="showRejectForm({{ $aidForAidReceiving->id }})">Reject</button>
                                                                        </div>
                                
                                                                        <!-- Reject Form (hidden by default) -->
                                                                        <form id="reject-form-{{ $aidForAidReceiving->id }}" method="post" action="{{ route('employe.storeKeeper.aidReceiving.aid.reject', $aidForAidReceiving->id) }}" style="display: none; margin-top: 10px;">
                                                                            @csrf
                                                                            @method('put')
                                                                            <input type="hidden" name="aidReceivingID" value="{{ $aidReceivingID }}" />
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" name="reasonOfRefuse" placeholder="Reason for Rejection" required />
                                                                            </div>
                                                                            <button class="btn btn-danger" type="submit">Submit Rejection</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                
                                <!-- Include this script at the end of your Blade template -->
                                <script>
                                    function showRejectForm(id) {
                                        // Hide the dropdown menu button
                                        document.getElementById('dropdownMenuButton-' + id).style.display = 'none';
                                        
                                        // Show the reject form
                                        document.getElementById('reject-form-' + id).style.display = 'block';
                                    }
                                </script>
                                
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

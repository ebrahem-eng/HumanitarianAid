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

                            <div class="t-header">Aid For Aid Distribution Campaign Table </div>
                            <div class="table-responsive">
                                <table id="basicExample" class="table custom-table">
                                    <thead>
                                        <tr>
                                            <th>Aid Name</th>
                                            <th>Aid Type</th>
                                            <th>Aid Note</th>
                                            <th>Aid Original Quantity</th>
                                            <th>Distribution Quantity</th>
                                            <th>Distribution Type</th>
                                            <th>Status Receipt Store Keeper</th>
                                            <th>Returned Quantity</th>
                                            <th>Reason For Return</th>
                                            <th>Aid Delivery Status</th>
                                            <th>Note</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($aidForaidDistributionCampaigns as $aidForaidDistributionCampaign)
                                            <tr>
                                                <td>{{ $aidForaidDistributionCampaign->aid->name }}</td>
                                                <td>{{ $aidForaidDistributionCampaign->aid->type }}</td>
                                                <td>{{ $aidForaidDistributionCampaign->aid->note }}</td>
                                                <td>{{ $aidForaidDistributionCampaign->aid->quantity }}</td>
                                                <td>{{ $aidForaidDistributionCampaign->quantity }}</td>
                                                <td>{{ $aidForaidDistributionCampaign->distributionType }}</td>
                                                <td>
                                                    @if ($aidForaidDistributionCampaign->StatusReceiptStoreKeeper == 0)
                                                        <div class="btn btn-primary">
                                                            Pending Accept
                                                        </div>
                                                    @elseif($aidForaidDistributionCampaign->StatusReceiptStoreKeeper == 1)
                                                        <div class="btn btn-success">
                                                            Accepted
                                                        </div>
                                                    @elseif($aidForaidDistributionCampaign->StatusReceiptStoreKeeper == 2)
                                                        <div class="btn btn-danger">
                                                            Rejected
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>{{ $aidForaidDistributionCampaign->returnedQuantity }}</td>
                                                <td>{{ $aidForaidDistributionCampaign->ReasonForReturn }}</td>
                                                <td>
                                                    @if ($aidForaidDistributionCampaign->AidDeliveryStatus == 0)
                                                        <div class="btn btn-primary">
                                                            Waiting For Distribution
                                                        </div>
                                                    @elseif($aidForaidDistributionCampaign->AidDeliveryStatus == 1)
                                                        <div class="btn btn-success">
                                                            Distribution Done
                                                        </div>
                                                    @elseif($aidForaidDistributionCampaign->AidDeliveryStatus == 2)
                                                        <div class="btn btn-danger">
                                                            Part was delivered and part was returned
                                                        </div>
                                                    @elseif($aidForaidDistributionCampaign->AidDeliveryStatus == 3)
                                                        <div class="btn btn-danger">
                                                            Returned
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>{{ $aidForaidDistributionCampaign->Note }}</td>

                                                <td>
                                                    @if($aidForaidDistributionCampaign->StatusReceiptStoreKeeper == 0)
                                                    <div class="row gutters">
                                                        <div class="col-sm-12">
                                                            <div class="card-body">
                                                                <div class="custom-dropdown-group">
                                                                    <div class="dropdown">
                                                                        <button class="btn btn-primary dropdown-toggle"
                                                                            type="button" id="dropdownMenuButton"
                                                                            data-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="false">
                                                                            Action
                                                                        </button>
                                                                        <div class="dropdown-menu"
                                                                            aria-labelledby="dropdownMenuButton">
       

                                                                                <form method="post" action="{{ route('employe.storeKeeper.aidDistributionCampaigns.aid.accept', $aidForaidDistributionCampaign->id) }}">
                                                                                    @csrf
                                                                                    @method('put')
                                                                                    <input type="hidden" name="aidDistributionCampaignsID" value="{{$aidDistributionCampaignsID}}"/>
                                                                                    <button class="dropdown-item" type="submit">Accept</button>

                                                                                </form>


                                                                                <form method="post" action="{{ route('employe.storeKeeper.aidDistributionCampaigns.aid.reject', $aidForaidDistributionCampaign->id) }}">
                                                                                    @csrf
                                                                                    @method('put')
                                                                                    <input type="hidden" name="aidDistributionCampaignsID" value="{{$aidDistributionCampaignsID}}"/>
                                                                                    <button class="dropdown-item" type="submit">Reject</button>

                                                                                </form>

                                                                                
                                                                                {{-- <a class="dropdown-item"
                                                                                href="{{ route('admin.AidDistributionCampaigns.edit', $aidForaidDistributionCampaign->id) }}">Reject Returned Aid</a> --}}
                                                                        </div>
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

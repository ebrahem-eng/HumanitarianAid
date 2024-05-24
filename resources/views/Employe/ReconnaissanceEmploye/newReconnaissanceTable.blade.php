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

    @include('Layouts.Employe.Reconnaissance.LinkHeader')

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

                            <div class="t-header">New Reconnaissance Tours Table </div>
                            <div class="table-responsive">
                                <table id="basicExample" class="table custom-table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Priority</th>
                                            <th>Note</th>
                                            <th>Employees Name</th>
                                            <th>Employees Email</th>
                                            <th>Employees Phone</th>
                                            <th>Vehicles Name - Vehicles Type - Vehicles Capacity</th>
                                            <th>Locations Name - Location Street </th>
                                            <th>Created By </th>
                                            <th>Created Date </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($newReconnaissanceEmployes as $newReconnaissanceEmploye)
                                            <tr>
                                                <td>{{ $newReconnaissanceEmploye->name }}</td>
                                                <td>{{ $newReconnaissanceEmploye->date }}</td>
                                                <td>{{ $newReconnaissanceEmploye->startTime }}</td>
                                                <td>{{ $newReconnaissanceEmploye->endTime }}</td>
                                                <td>{{ $newReconnaissanceEmploye->priority }}</td>
                                                <td>{{ $newReconnaissanceEmploye->note }}</td>
                                                <td>
                                                    @foreach ($newReconnaissanceEmploye->ReconnaissanceToursEmployee as $ReconnaissanceToursEmployee)
                                                        {{ $ReconnaissanceToursEmployee->Employee->name }}
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($newReconnaissanceEmploye->ReconnaissanceToursEmployee as $ReconnaissanceToursEmployee)
                                                        {{ $ReconnaissanceToursEmployee->Employee->email }}
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($newReconnaissanceEmploye->ReconnaissanceToursEmployee as $ReconnaissanceToursEmployee)
                                                        {{ $ReconnaissanceToursEmployee->Employee->phone }}
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($newReconnaissanceEmploye->ReconnaissanceToursVehicle as $ReconnaissanceToursVehicle)
                                                        {{ $ReconnaissanceToursVehicle->vehicle->name }} -
                                                        {{ $ReconnaissanceToursVehicle->vehicle->type }} -
                                                        {{ $ReconnaissanceToursVehicle->vehicle->Capacity }}
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($newReconnaissanceEmploye->ReconnaissanceTourLocation as $ReconnaissanceTourLocation)
                                                        {{ $ReconnaissanceTourLocation->address }} -
                                                        {{ $ReconnaissanceTourLocation->street }}
                                                    @endforeach
                                                </td>
                                                <td>{{ $newReconnaissanceEmploye->admin->name }}</td>
                                                <td>{{ $newReconnaissanceEmploye->created_at }}</td>
                                                <td>
                                                    <div class="row gutters">
                                                        <div class="col-sm-12">
                                                            <div class="card-body">
                                                                <div class="custom-dropdown-group">
                                                                    <div class="dropdown">
                                                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            Action
                                                                        </button>
                                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                            <a class="dropdown-item" href="#" onclick="showInput('complete', {{ $newReconnaissanceEmploye->id }}); return false;">Mark As Complete</a>
                                                                            <a class="dropdown-item" href="#" onclick="showInput('reject', {{ $newReconnaissanceEmploye->id }}); return false;">Rejecting</a>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <form method="post" id="completeForm-{{ $newReconnaissanceEmploye->id }}" action="{{ route('employe.reconnaissance.new.mark.complete', $newReconnaissanceEmploye->id) }}">
                                                                        @csrf
                                                                        @method('put')
                                                                        <div id="complete-input-{{ $newReconnaissanceEmploye->id }}" style="display: none;">
                                                                            <label for="note-{{ $newReconnaissanceEmploye->id }}">Note:</label>
                                                                            <input type="text" name="note" id="note-{{ $newReconnaissanceEmploye->id }}">
                                                                            <br>
                                                                            <br>
                                                                            <button type="submit" class="btn btn-primary">Submit Completion</button>
                                                                        </div>
                                                                    </form>
                                                                    <form method="post" id="rejectForm-{{ $newReconnaissanceEmploye->id }}" action="{{ route('employe.reconnaissance.new.reject', $newReconnaissanceEmploye->id) }}">
                                                                        @csrf
                                                                        @method('put')
                                                                        <div id="reject-input-{{ $newReconnaissanceEmploye->id }}" style="display: none;">
                                                                            <label for="cause-{{ $newReconnaissanceEmploye->id }}">Cause:</label>
                                                                            <input type="text" name="cause" id="cause-{{ $newReconnaissanceEmploye->id }}">
                                                                            <br>
                                                                            <br>
                                                                            <button type="submit" class="btn btn-primary">Submit Rejection</button>
                                                                        </div>
                                                                    </form>
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

    <script>
function showInput(action, id) {
    // Hide all complete and reject inputs
    document.querySelectorAll('[id^="complete-input"]').forEach(el => el.style.display = 'none');
    document.querySelectorAll('[id^="reject-input"]').forEach(el => el.style.display = 'none');
    
    // Show the relevant input
    if (action === 'complete') {
        document.getElementById(`complete-input-${id}`).style.display = 'block';
    } else if (action === 'reject') {
        document.getElementById(`reject-input-${id}`).style.display = 'block';
    }
}


function submitForm(action, id) {
    const form = document.getElementById(`actionForm-${id}`);
    if (action === 'complete') {
        form.setAttribute('action', "{{ route('employe.reconnaissance.new.mark.complete', '') }}/" + id);
    } else if (action === 'reject') {
        form.setAttribute('action', "{{ route('employe.reconnaissance.new.reject', '') }}/" + id);
    }
    form.submit();
}

    </script>
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

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
                        <li class="breadcrumb-item">Create Reconnaissance Tours Employe</li>
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

                            <form action="{{ route('admin.ReconnaissanceTours.store.employe') }}" method="POST">
                                @csrf
                                <div class="card-body">

                                    <!-- Inline Checkbox example -->
                                    @foreach ($employees as $employe)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="{{$employe->id}}" name="employeID[]">
                                        <label class="form-check-label" for="inlineCheckbox1">{{$employe->name}}</label>
                                    </div>
                             
                                    @endforeach
                                    <br>
                                    <br>
                                    <input type="hidden" name="name" value="{{$name}}">
                                    <input type="hidden" name="date" value="{{$date}}">
                                    <input type="hidden" name="startTime" value="{{$startTime}}">
                                    <input type="hidden" name="endTime" value="{{$endTime}}">
                                    <input type="hidden" name="priority" value="{{$priority}}">
                                    <input type="hidden" name="note" value="{{$note}}">
                                    
                                    <div class="row gutters">
                                        <button type="submit" class="btn btn-primary mb-2">Next</button>
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

</body>

</html>

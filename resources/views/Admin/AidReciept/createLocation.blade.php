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
                        <li class="breadcrumb-item">Create Receipt Campaign</li>
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

                            <form action="{{ route('admin.AidRecieptCampaigns.store.aidRecieptCampaigns') }}" method="POST" id="locationForm">
                                @csrf
                                <div id="initialForm">
                                    <div class="card-body">
                                        <div class="row gutters">
                                            <div class="col-sm-4 col-12">
                                                <div class="form-group">
                                                    <label for="inputName0">Address</label>
                                                    <input type="text" class="form-control" id="inputName0" placeholder="Enter Address Name" name="address[]" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-12">
                                                <div class="form-group">
                                                    <label for="inputDate0">Street</label>
                                                    <input type="text" class="form-control" id="inputDate0" placeholder="Enter Street Name" name="street[]" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row gutters">
                                            <input type="hidden" id="latitude0" name="latitude[]">
                                            <input type="hidden" id="longitude0" name="longitude[]">
                                        </div>
                                        <div id="map0" style="height: 250px; width: 500px; margin-top: 10px;"></div>
                                        <br><br>
                                    </div>
                                </div>
                                <div id="additionalForms"></div>
                                <div class="row gutters">
                                    <button type="button" class="btn btn-secondary mb-2" id="addLocationBtn">Add a New Location</button>
                                </div>

                                <input type="hidden" name="name" value="{{$name}}">
                                <input type="hidden" name="date" value="{{$date}}">
                                <input type="hidden" name="startTime" value="{{$startTime}}">
                                <input type="hidden" name="endTime" value="{{$endTime}}">
                                <input type="hidden" name="priority" value="{{$priority}}">
                                <input type="hidden" name="note" value="{{$note}}">
                                @foreach ($employeIDs as $employeeID)
                                <input type="hidden" name="employeIDs[]" value="{{ $employeeID }}">
                                @endforeach
                            
                               @foreach ($vehicleIDs as $vehicleID)
                                <input type="hidden" name="vehicleIDs[]" value="{{ $vehicleID }}">
                             @endforeach
                            

                                <div class="row gutters">
                                    <button type="submit" class="btn btn-primary mb-2">Next</button>
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
        var mapInstances = [];
        var markerInstances = [];
        var locationIndex = 0;

        function initMap() {
            // Initialize map for the initial form
            addMapInstance(locationIndex);

            // Add event listener to the button to add new locations
            $('#addLocationBtn').click(function() {
                locationIndex++;
                addForm(locationIndex);
            });
        }

        function addMapInstance(index) {
            var mapDiv = document.getElementById('map' + index);
            if (!mapDiv) return;

            var myLatLng = { lat: -34.397, lng: 150.644 }; // default location

            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    myLatLng = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    createMapAndMarker(index, myLatLng);
                }, function() {
                    handleLocationError(true);
                    createMapAndMarker(index, myLatLng);
                });
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false);
                createMapAndMarker(index, myLatLng);
            }
        }

        function createMapAndMarker(index, myLatLng) {
            var map = new google.maps.Map(document.getElementById('map' + index), {
                zoom: 15,
                center: myLatLng
            });

            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                draggable: true,
                title: 'Drag me!'
            });

            // Store the map and marker instances
            mapInstances[index] = map;
            markerInstances[index] = marker;

            // Set default values for latitude and longitude
            document.getElementById('latitude' + index).value = myLatLng.lat;
            document.getElementById('longitude' + index).value = myLatLng.lng;

            // Add event listener to marker for position update
            google.maps.event.addListener(marker, 'dragend', function() {
                document.getElementById('latitude' + index).value = marker.getPosition().lat();
                document.getElementById('longitude' + index).value = marker.getPosition().lng();
            });
        }

        function handleLocationError(browserHasGeolocation) {
            console.log(browserHasGeolocation ? 'Error: The Geolocation service failed.' : 'Error: Your browser doesn\'t support geolocation.');
        }

        function addForm(index) {
            var formHtml = `
            <div class="card-body">
                <div class="row gutters">
                    <div class="col-sm-4 col-12">
                        <div class="form-group">
                            <label for="inputName${index}">Address</label>
                            <input type="text" class="form-control" id="inputName${index}" placeholder="Enter Address Name" name="address[]" required>
                        </div>
                    </div>
                    <div class="col-sm-4 col-12">
                        <div class="form-group">
                            <label for="inputDate${index}">Street</label>
                            <input type="text" class="form-control" id="inputDate${index}" placeholder="Enter Street Name" name="street[]" required>
                        </div>
                    </div>
                </div>
                <div class="row gutters">
                    <input type="hidden" id="latitude${index}" name="latitude[]">
                    <input type="hidden" id="longitude${index}" name="longitude[]">
                </div>
                <div id="map${index}" style="height: 250px; width: 500px; margin-top: 10px;"></div>
                <br><br>
            </div>`;

            $('#additionalForms').append(formHtml);
            addMapInstance(index);
        }
    </script>

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBddryhfLC4gYIvreVc9YDY4gLv2BrhhmY&callback=initMap"></script>

</body>

</html>

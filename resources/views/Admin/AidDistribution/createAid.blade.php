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

    <!-- Common Css Files -->
    @include('Layouts.Admin.LinkHeader')

    <!-- Vendor Css Files -->

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
                        <li class="breadcrumb-item">Create Aid For Aid Distribution Campaign</li>
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

                            <!-- Message section -->
                            @if (session('successMessage'))
                            <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ session('successMessage') }}
                            </div>
                            @endif
                            @if (session('errorMessage'))
                            <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ session('errorMessage') }}
                            </div>
                            @endif
                            <!-- End message section -->

                            <form action="{{ route('admin.AidDistributionCampaigns.store.aid') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div id="aid-forms-container">
                                        <div class="aid-form row gutters">
                                            <div class="col-sm-4 col-12">
                                                <div class="form-group">
                                                    <label for="aidSelect">Aid Details</label>
                                                    <select class="form-control form-control-lg aid-select" name="aidIDs[]" required>
                                                        @foreach ($aids as $aid)
                                                        <option value="{{ $aid->id }}" data-quantity="{{ $aid->quantity }}">{{ $aid->name }} - {{ $aid->type }} - {{ $aid->quantity }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-12">
                                                <div class="form-group">
                                                    <label for="quantityInput">Quantity</label>
                                                    <input type="number" class="form-control quantity-input" placeholder="Quantity" min="1" max="1" name="quantities[]" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-12">
                                                <div class="form-group">
                                                    <label for="noteInput">Note</label>
                                                    <input type="text" class="form-control" placeholder="Note" name="notes[]" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gutters">
                                        <button type="button" class="btn btn-secondary mb-2" id="add-aid-form-btn">Add New Aid</button>
                                    </div>
                            
                                    <input type="hidden" name="name" value="{{ $name }}">
                                    <input type="hidden" name="date" value="{{ $date }}">
                                    <input type="hidden" name="startTime" value="{{ $startTime }}">
                                    <input type="hidden" name="endTime" value="{{ $endTime }}">
                                    <input type="hidden" name="priority" value="{{ $priority }}">
                                    <input type="hidden" name="note" value="{{ $note }}">
                                    @foreach ($employeIDs as $employeeID)
                                    <input type="hidden" name="employeIDs[]" value="{{ $employeeID }}">
                                    @endforeach
                                    @foreach ($vehicleIDs as $vehicleID)
                                    <input type="hidden" name="vehicleIDs[]" value="{{ $vehicleID }}">
                                    @endforeach
                            
                                    <div class="row gutters">
                                        <button type="submit" class="btn btn-primary mb-2">Next</button>
                                    </div>
                                </div>
                            </form>
                            
                            <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                function updateMaxQuantity(selectElement) {
                                    const quantityInput = selectElement.closest('.aid-form').querySelector('.quantity-input');
                                    const selectedOption = selectElement.options[selectElement.selectedIndex];
                                    const maxQuantity = selectedOption.getAttribute('data-quantity');
                                    quantityInput.max = maxQuantity;
                                    quantityInput.value = Math.min(quantityInput.value, maxQuantity);
                                }
                            
                                document.querySelectorAll('.aid-select').forEach(function (selectElement) {
                                    updateMaxQuantity(selectElement);
                                    selectElement.addEventListener('change', function () {
                                        updateMaxQuantity(selectElement);
                                    });
                                });
                            
                                document.getElementById('add-aid-form-btn').addEventListener('click', function () {
                                    const existingForms = document.querySelectorAll('.aid-form');
                                    if (existingForms.length > 0) {
                                        const newForm = existingForms[0].cloneNode(true);
                                        newForm.querySelectorAll('input').forEach(input => input.value = '');
                                        document.getElementById('aid-forms-container').appendChild(newForm);

                                        const newSelect = newForm.querySelector('.aid-select');
                                        updateMaxQuantity(newSelect);
                                        newSelect.addEventListener('change', function () {
                                            updateMaxQuantity(newSelect);
                                        });
                                    }
                                });
                            });
                            </script>
                            
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

    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    @include('Layouts.Admin.LinkJS')

</body>

</html>

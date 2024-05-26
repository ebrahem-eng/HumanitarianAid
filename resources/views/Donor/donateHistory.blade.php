<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Charity website</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    @include('Layouts.Donor.LinkHeader')

</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->

    @include('Layouts.Donor.Header')

    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">Donate History</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Donate</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Donate History</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- projects Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Donate History</div>
                <h1 class="display-6 mb-5">Donate For A Day When You Reap The Results Of Your Work</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">

                    <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Money Donate</div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Amount</th>
                                <th scope="col">Donate Date</th>
                                <th scope="col">Invoice Number</th>
                                <th scope="col">Donate Request Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($moneyDonations as $moneyDonation)
                                <tr>
                                    <td>{{ $moneyDonation->amount }}</td>
                                    <td>{{ $moneyDonation->date }}</td>
                                    <td>{{ $moneyDonation->invoiceNumber }}</td>
                                    <td>
                                        @if ($moneyDonation->status == 0)
                                            <div class="btn btn-primary">
                                                Pending Admin Show
                                            </div>
                                        @elseif($moneyDonation->status == 1)
                                            <div class="btn btn-success">
                                                Show By Admin
                                            </div>
                                        @elseif($moneyDonation->status == 2)
                                            <div class="btn btn-danger">
                                                Canceled
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{route('donor.donate.money.cancele' , $moneyDonation->id )}}" method="POST">
                                            @csrf
                                            @method('put')
                                            <button class="btn btn-danger" type="submit" 
                                                @if($moneyDonation->status != 0) disabled @endif>
                                                Cancel
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <br>

                    <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Medical Donate
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Note</th>
                                <th scope="col">Titer</th>
                                <th scope="col">Expiration</th>
                                <th scope="col">Donate Request Status</th>
                                <th scope="col">Donate Request Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($medicalDonations as $medicalDonation)
                                <tr>
                                    <td>{{ $medicalDonation->name }}</td>
                                    <td>{{ $medicalDonation->quantity }}</td>
                                    <td>{{ $medicalDonation->note }}</td>
                                    <td>{{ $medicalDonation->titer }}</td>
                                    <td>{{ $medicalDonation->expiration }}</td>
                                    <td>
                                        @if ($medicalDonation->status == 0)
                                            <div class="btn btn-primary">
                                                Pending Admin Show
                                            </div>
                                        @elseif($medicalDonation->status == 1)
                                            <div class="btn btn-success">
                                                Show By Admin
                                            </div>
                                        @elseif($medicalDonation->status == 2)
                                            <div class="btn btn-danger">
                                                Canceled
                                            </div>
                                        @endif
                                    </td>
                                    <td>{{ $medicalDonation->created_at }}</td>
                                    <td>
                                        <form action="{{route('donor.donate.medical.cancele' , $medicalDonation->id )}}" method="POST">
                                            @csrf
                                            @method('put')
                                            <button class="btn btn-danger" type="submit" 
                                                @if($medicalDonation->status != 0) disabled @endif>
                                                Cancel
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                     <br>

                    <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Clothing Donate
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Clothe Type</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Age</th>
                                <th scope="col">Size</th>
                                <th scope="col">Donate Request Status</th>
                                <th scope="col">Donate Request Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clothingDonations as $clothingDonation)
                                <tr>
                                    <td>{{ $clothingDonation->clotheType }}</td>
                                    <td>{{ $clothingDonation->quantity }}</td>
                                    <td>{{ $clothingDonation->age }}</td>
                                    <td>{{ $clothingDonation->size }}</td>
                                    <td>
                                        @if ($clothingDonation->status == 0)
                                            <div class="btn btn-primary">
                                                Pending Admin Show
                                            </div>
                                        @elseif($clothingDonation->status == 1)
                                            <div class="btn btn-success">
                                                Show By Admin
                                            </div>
                                        @elseif($clothingDonation->status == 2)
                                            <div class="btn btn-danger">
                                                Canceled
                                            </div>
                                        @endif
                                    </td>
                                    <td>{{ $clothingDonation->created_at }}</td>
                                    <td>
                                        <form action="{{route('donor.donate.clothing.cancele' , $clothingDonation->id )}}" method="POST">
                                            @csrf
                                            @method('put')
                                            <button class="btn btn-danger" type="submit" 
                                                @if($clothingDonation->status != 0) disabled @endif>
                                                Cancel
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <br>
                    <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Food Donate</div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Box Size</th>
                                <th scope="col">Expiration</th>
                                <th scope="col">Donate Request Status</th>
                                <th scope="col">Donate Request Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($foodDonations as $foodDonation)
                                <tr>
                                    <td>{{ $foodDonation->name }}</td>
                                    <td>{{ $foodDonation->quantity }}</td>
                                    <td>{{ $foodDonation->boxSize }}</td>
                                    <td>{{ $foodDonation->expiration }}</td>
                                    <td>
                                        @if ($foodDonation->status == 0)
                                            <div class="btn btn-primary">
                                                Pending Admin Show
                                            </div>
                                        @elseif($foodDonation->status == 1)
                                            <div class="btn btn-success">
                                                Show By Admin
                                            </div>
                                        @elseif($foodDonation->status == 2)
                                            <div class="btn btn-danger">
                                                Canceled
                                            </div>
                                        @endif
                                    </td>
                                    <td>{{ $foodDonation->created_at }}</td>
                                    <td>
                                        <form action="{{route('donor.donate.food.cancele' , $foodDonation->id )}}" method="POST">
                                            @csrf
                                            @method('put')
                                            <button class="btn btn-danger" type="submit" 
                                                @if($foodDonation->status != 0) disabled @endif>
                                                Cancel
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- projects End -->


    <!-- Footer Start -->

    @include('Layouts.Donor.Footer')

    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    @include('Layouts.Donor.LinkJS')

</body>

</html>

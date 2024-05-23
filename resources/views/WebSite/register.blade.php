<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Charity website</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    @include('Layouts.WebSite.LinkHeader')
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


      <!-- Navbar Start -->
   
      @include('Layouts.WebSite.Header')

      <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">Sign up</h1>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- register Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form action="{{route('donor.signUp')}}" method="post">
                        @csrf
                        <i class="bi bi-person-plus display-1 text-primary"></i>
                        <h1 class="display-1">Sign Up</h1>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="firstName" name="name" placeholder="Name" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="lastName" name="email" placeholder="Email Address" required>
                        </div>
                     
                        <div class="mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control" id="email" name="age" placeholder="Age" required>
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control" id="confirmPassword" name="phone" placeholder="Phone" required>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="confirmPassword" name="address" placeholder="Address" required>
                        </div>

                        <div class="mb-3">
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="" disabled selected>Select Gender</option>
                                <option value="0">Male</option>
                                <option value="1">Female</option>
                            </select>
                        </div>
                        
                        <div class="mb-3 form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="userTypeToggle" name="userTypeToggle" style="width: 10%; height:20px;" onchange="toggleLabel()">
                            <label class="form-check-label" id="toggleLabel" for="userTypeToggle">Are you (in need)?</label>
                        </div>
                        <!-- <div class="mb-3 form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="userTypeToggle" name="userTypeToggle" style="width: 10%; height:20px;" onchange="toggleLabel()">
                            <label class="form-check-label" id="toggleLabel" for="userTypeToggle">Are you a donor?</label>
                        </div> -->
                        <button type="submit" class="btn btn-primary btn-lg">Sign Up</button>
                    </form>
                    <div class="mt-3">
                        <p>Sign up via: <a href="/signup-google">Google</a> or <a href="/signup-facebook">Facebook</a></p>
                        <p>Already have an account? <a href="/login">Log in here</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- register End -->
        

    <!-- Footer Start -->

    @include('Layouts.WebSite.Footer')

    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    @include('Layouts.WebSite.LinkJS')

    
</body>

</html>
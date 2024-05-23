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
            <h1 class="display-4 text-white animated slideInDown mb-4">log in</h1>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- login Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-6">

                    <form action="{{route('donor.store.login')}}" method="post">
                        @csrf
                        <i class="bi bi-person-circle display-1 text-primary"></i>
                        <h1 class="display-1">Login</h1>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg">Login</button>
                    </form>

                    <div class="mt-3">
                        <p>Forgot your password? <a href="reset-password.html">Reset it here.</a></p>
                        <p>Not registered yet? <a href="{{route('website.signUp')}}">Sign up here.</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- login End -->
        

    <!-- Footer Start -->

       @include('Layouts.WebSite.Footer')

    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    
    @include('Layouts.WebSite.LinkJS')
</body>

</html>
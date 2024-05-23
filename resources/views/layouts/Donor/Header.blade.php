<div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="top-bar text-white-50 row gx-0 align-items-center d-none d-lg-flex">
        <div class="col-lg-6 px-5 text-start">
            <small><i class="fa fa-map-marker-alt me-2"></i>Damascus, Syria +0123 456 789</small>
            <small class="ms-4"><i class="fa fa-envelope me-2"></i>info@example.com</small>
        </div>
        <div class="col-lg-6 px-5 text-end">
            <small>Follow us:</small>
            <a class="text-white-50 ms-3" href=""><i class="fab fa-facebook-f"></i></a>
            <a class="text-white-50 ms-3" href=""><i class="fab fa-twitter"></i></a>
            <a class="text-white-50 ms-3" href=""><i class="fab fa-linkedin-in"></i></a>
            <a class="text-white-50 ms-3" href=""><i class="fab fa-instagram"></i></a>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="index.html" class="navbar-brand ms-4 ms-lg-0">
            <h1 class="fw-bold text-primary m-0">Charity<span class="text-white">Logo</span></h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{route('website.index')}}" class="nav-item nav-link active">Home</a>
                <a href="{{route('website.about')}}" class="nav-item nav-link">About</a>
                <a href="{{route('website.projects')}}" class="nav-item nav-link">Projects</a>
                <a href="{{route('website.events')}}" class="nav-item nav-link">Events</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-0">
                        <a href="{{route('website.service')}}" class="dropdown-item">Service</a>
                        <a href="{{route('donor.donate.index')}}" class="dropdown-item">Donate</a>
                        <a href="{{route('website.team')}}" class="dropdown-item">Our Team</a>
                        <a href="{{route('website.donors')}}" class="dropdown-item">Donors&nbsp;</a>
                        {{-- <a href="404.html" class="dropdown-item">404 Page</a> --}}
                    </div>
                </div>
                <a href="{{route('website.contact')}}" class="nav-item nav-link">Contact</a>
            </div>
            <div class="d-none d-lg-flex ms-2">
                <div class="dropdown">
                    <a class="btn btn-outline-primary py-2 px-3 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        {{Auth::guard('donor')->user()->name}}
                        <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                            <img src="{{asset('websiteAssets/img/team-4.jpg')}}" alt="Avatar" class="rounded-circle" style="width: 24px; height: 24px;">
                        </div>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="edit-profile.html">View and Edit Profile</a></li>
                        <li><a class="dropdown-item" href="{{route('donor.logout')}}">Log Out</a></li>
                    </ul>
                </div>
            </div>
            
        </div>
    </nav>
</div>
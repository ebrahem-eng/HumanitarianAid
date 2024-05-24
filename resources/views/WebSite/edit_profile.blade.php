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
            <h1 class="display-4 text-white animated slideInDown mb-4">profile</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">profile</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- 404 Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <!-- Edit Profile Section -->
                    <h1 class="display-1 mb-4">Edit Profile</h1>
                    <form action="{{route("donor.update" ,$donor->id)}}" method="POST" id="edit-profile-form" >
                        @csrf
                        @method('put')
                        <!-- Personal Information Inputs -->                            
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter  Name" required value="{{$donor->name}}" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" placeholder="Enter Email" required value="{{$donor->email}}" name="email">
                        </div>
                        <div class="mb-3">
                             <label for="age" class="form-label">Age</label>
                             <input type="number" class="form-control" id="age" placeholder="Enter Age" required value="{{$donor->age}}" name="age">
                        </div> 
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="number" class="form-control" id="phone" placeholder="Enter Phone" required value="{{$donor->phone}}" name="phone">
                        </div>  
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="Enter address" required value="{{$donor->address}}" name="address">
                        </div> 
                        <!-- Change Password Section -->
                        <h2 class="display-6 mt-5 mb-4">Change Password</h2>
                        <div class="mb-3">
                            <label for="current-password" class="form-label">Current Password</label>
                            <input type="password" class="form-control" id="current-password" placeholder="Enter Current Password" required >
                        </div>
                        <div class="mb-3">
                            <label for="new-password" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="new-password" placeholder="Enter New Password" required  name="password">
                        </div>
                        <div class="mb-3">
                            <label for="confirm-new-password" class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control" id="confirm-new-password" placeholder="Confirm New Password" required name="password">
                        </div>
                        <!-- Profile Photo Section -->
                        <h2 class="display-6 mt-5 mb-4">Edit Profile Photo</h2>
                        <div class="mb-3">
                            <label for="profile-photo" class="form-label">Profile Photo</label>
                            <input type="file" class="form-control" id="profile-photo" accept="image/*">
                        </div>
                        <div class="d-flex justify-content-center">
                            <img src="img/team-1.jpg" class="rounded-circle profile-photo-preview" alt="Profile Photo" style="width: 150px; height: 150px;">
                        </div>
                        <div class="mb-3 text-center">
                            <button type="button" class="btn btn-outline-primary mt-3">Edit Photo</button>
                        </div>
                        <!-- Save Changes Button -->
                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- 404 End -->
        

    <!-- Footer Start -->
    @include('Layouts.WebSite.Footer')
   
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    @include('Layouts.WebSite.LinkJS')


</body>

</html>
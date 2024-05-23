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
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
  
    @include('Layouts.WebSite.Header')

    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">Donate</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Donate</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Donate Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Donate Now</div>
                    <h1 class="display-6 mb-5">Thanks For The Results Achieved With You</h1>
                    <p class="mb-0">Please write your name, choose the project you want to donate to, then choose the
                        type of donation and fill out the donation information.</p>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="h-100 bg-secondary p-5">
                        <form>
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-light border-0" id="name"
                                            placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <select class="form-select bg-light border-0" id="projects">
                                            <option value="" disabled selected>Select Project</option>
                                            <option value="Project 1">project 1</option>
                                            <option value="project 2">project 2</option>
                                            <option value="project 3">project 3</option>
                                        </select>
                                        <label for="projects">Select Project</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="btn-group d-flex justify-content-around">
                                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" checked>
                                        <label class="btn btn-light py-3" for="btnradio1">Money</label>

                                        <input type="radio" class="btn-check" name="btnradio" id="btnradio2">
                                        <label class="btn btn-light py-3" for="btnradio2">Medical</label>

                                        <input type="radio" class="btn-check" name="btnradio" id="btnradio3">
                                        <label class="btn btn-light py-3" for="btnradio3">Clothes</label>
                                    </div>
                                </div>

                            </div>
                        </form>

                        <!-- Money Donation Popup Form -->
                        <div id="moneyPopup" class="popup-form" style="display: none; margin-top: 3%;">
                            <div class="form-floating">
                                <input type="number" class="form-control bg-light border-0"
                                    placeholder="Enter amount to donate" id="moneyAmount">
                                <label for="moneyAmount">Enter amount to donate</label>
                            </div>
                            <div class="form-floating mt-2">
                                <select class="form-select" id="paymentWay">
                                    <option value="syriatel">Syriatel Cash</option>
                                    <option value="mtn">MTN Cash</option>
                                    <option value="bbfs">BBFS</option>
                                    <option value="paypal">PayPal</option>
                                </select>
                                <label for="paymentWay">Payment Way</label>
                            </div>
                            <button class="btn btn-primary mt-2" onclick="donateMoney()">Donate</button>
                        </div>

                        <!-- medical Donation Popup Form -->
                        <div id="medicalPopup" class="popup-form" style="display: none; margin-top: 3%;">
                            <div class="form-floating">
                                <input type="text" class="form-control bg-light border-0" placeholder="Enter name"
                                    id="medicalName">
                                <label for="medicalName">Enter name</label>
                            </div>
                            <div class="form-floating" style="margin-top: 3%;">
                                <input type="number" class="form-control bg-light border-0" placeholder="Enter quantity"
                                    id="medicalQuantity">
                                <label for="medicalQuantity">Enter quantity</label>
                            </div>
                            <button class="btn btn-primary mt-2" onclick="addMedicalItem()">Add Item</button>
                            <button class="btn btn-primary mt-2" onclick="showMap()">Choose Location</button>

                            <div id="mapContainer" style="display: none;">
                                <iframe id="mapIframe" width="100%" height="400" frameborder="0" style="border:0; margin-top: 20px;"
                                    allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                            </div>
                        </div>


                        <!-- Clothes Donation Popup Form -->
                        <div id="clothesPopup" class="popup-form" style="display: none; margin-top: 3%;">
                            <div class="form-floating">
                                <select class="form-select bg-light border-0" id="clothesType">
                                    <option value="" disabled selected>Select Type</option>
                                    <option value="tshirt">T-Shirt</option>
                                    <option value="jeans">Jeans</option>
                                    <option value="pants">Pants</option>
                                    <option value="jackets">Jackets</option>
                                </select>
                                <label for="clothesType">Select Type</label>
                            </div>
                            <div class="form-floating" style="margin-top: 3%;">
                                <input type="number" class="form-control bg-light border-0" placeholder="Enter amount"
                                    id="clothesAmount">
                                <label for="clothesAmount">Enter amount</label>
                            </div>
                            <div class="form-floating" style="margin-top: 3%;">
                                <input type="number" class="form-control bg-light border-0" placeholder="Enter age"
                                    id="clothesAge">
                                <label for="clothesAge">Enter age</label>
                            </div>
                            <button class="btn btn-primary mt-2" onclick="addClothesItem()">Add Item</button>
                            <button class="btn btn-primary mt-2" onclick="showClothesMap()">Choose Location</button>

                            <!-- Map iframe container for Clothes Donation -->
                            <div id="clothesMapContainer" style="display: none;">
                                <iframe id="clothesMapIframe" width="100%" height="400" frameborder="0"
                                    style="border:0;  margin-top: 20px;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                            </div>
                        </div>
                        <div class="col-12" style="margin-top: 3%;">
                            <button class="btn btn-primary px-5" style="height: 60px;">
                                Donate Now
                                <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                    <i class="fa fa-arrow-right"></i>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Donate End -->


    <!-- Footer Start -->
    
    @include('Layouts.WebSite.Footer')

    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    @include('Layouts.WebSite.LinkJS')

    <script>
        document.getElementById("btnradio1").addEventListener("click", function () {
            document.getElementById("moneyPopup").style.display = "block";
            document.getElementById("medicalPopup").style.display = "none";
            document.getElementById("clothesPopup").style.display = "none";
        });

        document.getElementById("btnradio2").addEventListener("click", function () {
            document.getElementById("moneyPopup").style.display = "none";
            document.getElementById("medicalPopup").style.display = "block";
            document.getElementById("clothesPopup").style.display = "none";
        });

        document.getElementById("btnradio3").addEventListener("click", function () {
            document.getElementById("moneyPopup").style.display = "none";
            document.getElementById("medicalPopup").style.display = "none";
            document.getElementById("clothesPopup").style.display = "block";
        });

        function donateMoney() {
            var amount = document.getElementById("moneyAmount").value;
            alert("Thank you for your donation of $" + amount + " towards the money project!");
        }

        function addMedicalItem() {
            var name = document.getElementById("medicalName").value;
            var quantity = document.getElementById("medicalQuantity").value;
            alert("You added " + quantity + " " + name + "(s) to the medical donation list!");
        }

        function donateMedical() {
            var name = document.getElementById("medicalName").value;
            var quantity = document.getElementById("medicalQuantity").value;
            alert("Thank you for donating " + quantity + " " + name + "(s) towards the medical project!");
        }

        function addClothesItem() {
            var type = document.getElementById("clothesType").value;
            var amount = document.getElementById("clothesAmount").value;
            var age = document.getElementById("clothesAge").value;
            alert("You added a " + type + " for age " + age + " to the clothes donation list!");
        }

        function donateClothes() {
            var type = document.getElementById("clothesType").value;
            var amount = document.getElementById("clothesAmount").value;
            var age = document.getElementById("clothesAge").value;
            alert("Thank you for donating a " + type + " for age " + age + " towards the clothes project!");
        }

        function showMap() {
            var mapContainer = document.getElementById("mapContainer");
            mapContainer.style.display = "block";
            var mapIframe = document.getElementById("mapIframe");
            mapIframe.src = "https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d151640.8795393072!2d36.35914753957196!3d33.51985508323658!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sar!2sae!4v1712163604143!5m2!1sar!2sae";
        }

        function showClothesMap() {
            var mapContainer = document.getElementById("clothesMapContainer");
            mapContainer.style.display = "block";
            var mapIframe = document.getElementById("clothesMapIframe");
            mapIframe.src = "https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d151640.8795393072!2d36.35914753957196!3d33.51985508323658!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sar!2sae!4v1712163604143!5m2!1sar!2sae";
        }
    </script>
</body>

</html>
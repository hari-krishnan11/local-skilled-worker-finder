<?php
include("../Assets/Connection/Connection.php");
session_start();
include('Head.php');
?>
<!DOCTYPE html>
<html lang="en">

 

    <!-- About Header -->
  <div class="container-fluid p-0 mb-5">
    <div class="position-relative">
        <img class="img-fluid w-100" src="../Assets/Templates/Main/img/carousel-1.jpg" alt="Skilled Worker Finder">
        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .4);">
            <div class="container">
                <div class="row justify-content-start">
                    <div class="col-10 col-lg-8">
                        <h5 class="text-white text-uppercase mb-3 animated slideInDown">Connecting People to Skilled Workers</h5>
                          <h1 class="display-3 text-white animated slideInDown mb-4">Find Skilled Workers </h1>
                          <p class="fs-5 fw-medium text-white mb-4 pb-2"> plumbers, cleaners, welders, electricians and more — quickly and reliably.</p>
                        
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- About Content -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <h6 class="text-secondary text-uppercase">Who We Are</h6>
                    <h1 class="mb-4">We connect households and businesses with skilled local workers</h1>
                    <p>SkilledWorkersFinder is a platform built to make finding trustworthy technicians and helpers simple and fast. Whether it's a plumber, cleaner, electrician or welder — our vetted professionals are ready to help.</p>

                    <ul class="list-unstyled mt-4">
                        <li class="mb-2"><i class="fa fa-check text-success me-2"></i>Verified and experienced workers</li>
                        <li class="mb-2"><i class="fa fa-check text-success me-2"></i>Transparent pricing and reviews</li>
                        <li class="mb-2"><i class="fa fa-check text-success me-2"></i>Easy booking and support</li>
                    </ul>

                    <div class="bg-primary d-flex align-items-center p-4 mt-4">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt fa-2x text-primary"></i>
                        </div>
                        <div class="ms-3">
                            <p class="fs-5 fw-medium mb-2 text-white">Support 24/7</p>
                            <h3 class="m-0 text-secondary">+91 98765 43210</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" style="min-height: 420px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="../Assets/Templates/Main/img/about-1.jpg" style="object-fit: cover; padding: 0 0 50px 80px;" alt="">
                        <img class="position-absolute start-0 bottom-0 img-fluid bg-white pt-2 pe-2 w-50 h-50" src="../Assets/Templates/Main/img/about-2.jpg" style="object-fit: cover;" alt="">
                    </div>
                </div>
            </div>

            <!-- Mission / Vision -->
            <div class="row mt-5">
                <div class="col-md-6">
                    <h4>Our Mission</h4>
                    <p>To make hiring skilled workers safe, affordable and frictionless for every home and business.</p>
                </div>
                <div class="col-md-6">
                    <h4>Our Vision</h4>
                    <p>To be the most trusted local marketplace for on-demand skilled labor across India.</p>
                </div>
            </div>

            <!-- Stats -->
            <div class="row g-4 mt-5">
                <div class="col-md-3 text-center">
                    <h2 data-toggle="counter-up">12</h2>
                    <p>Years in Service</p>
                </div>
                <div class="col-md-3 text-center">
                    <h2 data-toggle="counter-up">450</h2>
                    <p>Verified Workers</p>
                </div>
                <div class="col-md-3 text-center">
                    <h2 data-toggle="counter-up">8k</h2>
                    <p>Happy Clients</p>
                </div>
                <div class="col-md-3 text-center">
                    <h2 data-toggle="counter-up">15k</h2>
                    <p>Jobs Completed</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="container-fluid py-5 px-0">
        <div class="container">
            <div class="bg-light p-5 text-center">
                <h2>Looking for a skilled worker now?</h2>
                <p class="mb-4">Search, compare reviews, and book professionals in a few clicks.</p>
                <a href="ViewWorker.php" class="btn btn-primary py-3 px-5">Find Workers</a>
            </div>
        </div>
    </div>

    

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../Assets/Templates/Main/lib/wow/wow.min.js"></script>
    <script src="../Assets/Templates/Main/lib/easing/easing.min.js"></script>
    <script src="../Assets/Templates/Main/lib/waypoints/waypoints.min.js"></script>
    <script src="../Assets/Templates/Main/lib/counterup/counterup.min.js"></script>
    <script src="../Assets/Templates/Main/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="../Assets/Templates/Main/js/main.js"></script>
</body>

</html>
<?php
include('Foot.php');
?>
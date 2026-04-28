<?php
include("./Assets/Connection/Connection.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>About - SkilledWorkersFinder</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="./Assets/Templates/Main/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="./Assets/Templates/Main/lib/animate/animate.min.css" rel="stylesheet">
    <link href="./Assets/Templates/Main/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="./Assets/Templates/Main/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="./Assets/Templates/Main/css/style.css" rel="stylesheet">
</head>

<body>
        <!-- Topbar -->
    <div class="container-fluid bg-light d-none d-lg-block">
        <div class="row align-items-center top-bar">
            <div class="col-lg-3 col-md-12 text-center text-lg-start">
                <a href="index.html" class="navbar-brand m-0 p-0">
                    <h1 class="text-primary m-0">SkilledWorkersFinder</h1>
                </a>
            </div>
            <div class="col-lg-9 col-md-12 text-end">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <i class="fa fa-map-marker-alt text-primary me-2"></i>
                    <p class="m-0">kothamagalam</p>
                </div>
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <i class="far fa-envelope-open text-primary me-2"></i>
                    <p class="m-0">support@skilledworkers.example</p>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn btn-sm-square bg-white text-primary me-1" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-1" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-1" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
 <!-- Navbar Start -->
    <div class="container-fluid nav-bar bg-light">
        <nav class="navbar navbar-expand-lg navbar-light bg-white p-3 py-lg-0 px-lg-4">
            <a href="" class="navbar-brand d-flex align-items-center m-0 p-0 d-lg-none">
                <h1 class="text-primary m-0">SkilledFinder</h1>

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav me-auto">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="about.php" class="nav-item nav-link">About</a>
                    <a href="service.php" class="nav-item nav-link">Services</a>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Signup</a>
                        <div class="dropdown-menu fade-up m-0">
                            <a href="./Guest/User.php" class="dropdown-item">Register As User</a>
                            <a href="./Guest/Worker.php" class="dropdown-item">Register As Worker</a>
                        </div>
                    </div>
                    <a href="./Guest/Login.php" class="nav-item nav-link">Login</a>

                </div>
                <div class="mt-4 mt-lg-0 me-lg-n4 py-3 px-4 bg-primary d-flex align-items-center">
                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white" style="width: 45px; height: 45px;">
                        <i class="fa fa-phone-alt text-primary"></i>
                    </div>
                    <div class="ms-3">
                        <p class="mb-1 text-white">Emergency 24/7</p>
                        <h5 class="m-0 text-secondary">+012 345 6789</h5>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->
  <!-- Page Header -->
  <div class="container-fluid p-0 mb-5">
    <div class="position-relative">
        <img class="img-fluid w-100" src="./Assets/Templates/Main/img/carousel-2.jpg" alt="Skilled Worker Finder">
        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .4);">
            <div class="container">
                <div class="row justify-content-start">
                    <div class="col-10 col-lg-8">
                        <h5 class="text-white text-uppercase mb-3 animated slideInDown">Connecting People to Skilled Workers</h5>
                          <h1 class="display-3 text-white animated slideInDown mb-4">Contact Us</h1>
                          <p class="fs-5 fw-medium text-white mb-4 pb-2"> plumbers, cleaners, welders, electricians and more — quickly and reliably.</p>
                         
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  <!-- Contact Info & Form -->
  <div class="container-xxl py-5">
    <div class="container">
      <div class="row g-5">
        <!-- Contact Info -->
        <div class="col-lg-5">
          <h6 class="text-secondary text-uppercase">Get In Touch</h6>
          <h1 class="mb-4">We are here to help you</h1>
          <p class="mb-4">Reach out for worker bookings, support, or business inquiries.</p>
          <div class="d-flex mb-3">
            <i class="fa fa-map-marker-alt text-primary fa-2x me-3"></i>
            <p class="mb-0">kothamagalam</p>
          </div>
          <div class="d-flex mb-3">
            <i class="fa fa-phone-alt text-primary fa-2x me-3"></i>
            <p class="mb-0">+91 98765 43210</p>
          </div>
          <div class="d-flex mb-3">
            <i class="fa fa-envelope text-primary fa-2x me-3"></i>
            <p class="mb-0">support@skilledworkers.example</p>
          </div>
        </div>

        <!-- photo Form -->
           <div class="col-lg-6" style="min-height: 420px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="./Assets/Templates/Main/img/about-1.jpg" style="object-fit: cover; padding: 0 0 50px 80px;" alt="">
                        <img class="position-absolute start-0 bottom-0 img-fluid bg-white pt-2 pe-2 w-50 h-50" src="./Assets/Templates/Main/img/about-2.jpg" style="object-fit: cover;" alt="">
                    </div>
                </div>
            </div>

      <!-- Google Map -->
      <div class="row mt-5">
        <div class="col-12">
          <iframe class="w-100" height="400" frameborder="0" style="border:0;"
            src="https://www.google.com/maps/embed/v1/place?key=YOUR_API_KEY&q=Your+City,India"
            allowfullscreen>
          </iframe>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <div class="container-fluid bg-dark text-light footer pt-5 mt-5">
    <div class="container py-5 text-center">
      <p>&copy; SkilledWorkersFinder, All Rights Reserved.</p>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./Assets/Templates/Main/js/main.js"></script>
  
</body>

</html>

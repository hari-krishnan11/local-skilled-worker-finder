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
        <img class="img-fluid w-100" src="./Assets/Templates/Main/img/carousel-3.jpg" alt="Skilled Worker Finder">
        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .4);">
            <div class="container">
                <div class="row justify-content-start">
                    <div class="col-10 col-lg-8">
                        <h5 class="text-white text-uppercase mb-3 animated slideInDown">Connecting People to Skilled Workers</h5>
                          <h1 class="display-3 text-white animated slideInDown mb-4">Our Service</h1>
                          <p class="fs-5 fw-medium text-white mb-4 pb-2"> plumbers, cleaners, welders, electricians and more — quickly and reliably.</p>
                         
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Services Section -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="row g-4">
          <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm">
              <img
                src="./Assets/Templates/Main/img/service-1.jpg"
                class="card-img-top"
                alt="Plumber"
              />
              <div class="card-body text-center">
                <h5 class="card-title">Plumbing</h5>
                <p class="card-text">
                  Expert plumbers for residential and commercial needs.
                </p>
                <a href="./Guest/Login.php" class="btn btn-primary">Book Now</a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm">
              <img
                src="./Assets/Templates/Main/img/service-2.jpg"
                class="card-img-top"
                alt="Cleaner"
              />
              <div class="card-body text-center">
                <h5 class="card-title">Cleaning</h5>
                <p class="card-text">
                  Professional cleaning services for homes and offices.
                </p>
                <a href="./Guest/Login.php" class="btn btn-primary">Book Now</a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm">
              <img
                src="./Assets/Templates/Main/img/service-3.jpg"
                class="card-img-top"
                alt="Welder"
              />
              <div class="card-body text-center">
                <h5 class="card-title">Welding</h5>
                <p class="card-text">
                  Skilled welders available for quick and safe jobs.
                </p>
                <a href="./Guest/Login.php" class="btn btn-primary">Book Now</a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm">
              <img
                src="./Assets/Templates/Main/img/service-4.jpg"
                class="card-img-top"
                alt="Electrician"
              />
              <div class="card-body text-center">
                <h5 class="card-title">Electrical</h5>
                <p class="card-text">
                  Certified electricians for all repair and installation needs.
                </p>
                <a href="./Guest/Login.php" class="btn btn-primary">Book Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer (same as about.html) -->
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

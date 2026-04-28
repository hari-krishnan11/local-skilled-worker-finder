<?php
include("../Assets/Connection/Connection.php");
session_start();
include('Head.php');
?>
<!DOCTYPE html>
<html lang="en">

 

    <!-- Page Header -->
   <div class="container-fluid p-0 mb-5">
    <div class="position-relative">
        <img class="img-fluid w-100" src="../Assets/Templates/Main/img/carousel-1.jpg" alt="Skilled Worker Finder">
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
                src="../Assets/Templates/Main/img/service-1.jpg"
                class="card-img-top"
                alt="Plumber"
              />
              <div class="card-body text-center">
                <h5 class="card-title">Plumbing</h5>
                <p class="card-text">
                  Expert plumbers for residential and commercial needs.
                </p>
                <a href="#" class="btn btn-primary">Book Now</a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm">
              <img
                src="../Assets/Templates/Main/img/service-2.jpg"
                class="card-img-top"
                alt="Cleaner"
              />
              <div class="card-body text-center">
                <h5 class="card-title">Cleaning</h5>
                <p class="card-text">
                  Professional cleaning services for homes and offices.
                </p>
                <a href="#" class="btn btn-primary">Book Now</a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm">
              <img
                src="../Assets/Templates/Main/img/service-3.jpg"
                class="card-img-top"
                alt="Welder"
              />
              <div class="card-body text-center">
                <h5 class="card-title">Welding</h5>
                <p class="card-text">
                  Skilled welders available for quick and safe jobs.
                </p>
                <a href="#" class="btn btn-primary">Book Now</a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm">
              <img
                src="../Assets/Templates/Main/img/service-4.jpg"
                class="card-img-top"
                alt="Electrician"
              />
              <div class="card-body text-center">
                <h5 class="card-title">Electrical</h5>
                <p class="card-text">
                  Certified electricians for all repair and installation needs.
                </p>
                <a href="#" class="btn btn-primary">Book Now</a>
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
    <script src="../Assets/Templates/Main/js/main.js"></script>
  </body>
</html>
<?php
include('Foot.php')
?>

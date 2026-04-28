<?php
include("../Assets/Connection/Connection.php");
session_start();
include('Head.php');
?>
 

  <!-- Page Header -->
    <div class="container-fluid p-0 mb-5">
    <div class="position-relative">
        <img class="img-fluid w-100" src="../Assets/Templates/Main/img/carousel-1.jpg" alt="Skilled Worker Finder">
        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .4);">
            <div class="container">
                <div class="row justify-content-start">
                    <div class="col-10 col-lg-8">
                        <h5 class="text-white text-uppercase mb-3 animated slideInDown">Connecting People to Skilled Workers</h5>
                          <h1 class="display-3 text-white animated slideInDown mb-4">Contact us</h1>
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
            <p class="mb-0">Kothamangalam</p>
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
                        <img class="position-absolute img-fluid w-100 h-100" src="../Assets/Templates/Main/img/about-1.jpg" style="object-fit: cover; padding: 0 0 50px 80px;" alt="">
                        <img class="position-absolute start-0 bottom-0 img-fluid bg-white pt-2 pe-2 w-50 h-50" src="../Assets/Templates/Main/img/about-2.jpg" style="object-fit: cover;" alt="">
                    </div>
                </div>
            </div>

      <!-- Google Map -->
      <!-- <div class="row mt-5">
        <div class="col-12">
          <iframe class="w-100" height="400" frameborder="0" style="border:0;"
            src="https://www.google.com/maps/embed/v1/place?key=YOUR_API_KEY&q=Your+City,India"
            allowfullscreen>
          </iframe>
        </div>
      </div>
    </div>
  </div> -->

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
<?php
include('Foot.php')
?>

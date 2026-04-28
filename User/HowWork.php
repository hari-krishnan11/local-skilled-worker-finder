<?php
include("../Assets/Connection/Connection.php");
session_start();
include('Head.php');
?>
 

    <!-- Header -->
    <div class="container-fluid p-0 mb-5">
        <div class="position-relative">
            <img src="../Assets/Templates/Main/img/carousel-2.jpg" class="img-fluid w-100" alt="How it works image">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0,0,0,0.45);">
                <div class="container text-white">
                    <h1 class="display-4">How It Works</h1>
                    <p class="lead">A simple step-by-step process to connect you with the right worker.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Steps -->
    <div class="container-xxl py-5">
        <div class="container text-center">
            <h6 class="text-secondary text-uppercase">Process</h6>
            <h1 class="mb-5">Easy Steps to Hire a Worker</h1>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="p-4 border rounded h-100">
                        <i class="fa fa-search fa-3x text-primary mb-3"></i>
                        <h4>1. Search</h4>
                        <p>Select your location and the type of worker you need (plumber, cleaner, welder, electrician).</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 border rounded h-100">
                        <i class="fa fa-user-check fa-3x text-primary mb-3"></i>
                        <h4>2. Choose</h4>
                        <p>View profiles, check ratings, and pick the best worker for your requirement.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 border rounded h-100">
                        <i class="fa fa-calendar-check fa-3x text-primary mb-3"></i>
                        <h4>3. Book</h4>
                        <p>Send a booking request with date and time. The worker confirms your request.</p>
                    </div>
                </div>
            </div>
            <div class="row g-4 mt-4">
                <div class="col-md-6">
                    <div class="p-4 border rounded h-100">
                        <i class="fa fa-tools fa-3x text-primary mb-3"></i>
                        <h4>4. Service</h4>
                        <p>The worker arrives at your location and completes the service as scheduled.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-4 border rounded h-100">
                        <i class="fa fa-star fa-3x text-primary mb-3"></i>
                        <h4>5. Review</h4>
                        <p>After the job is done, leave a review and rating to help others.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="container-fluid py-5 px-0">
        <div class="container">
            <div class="bg-light p-5 text-center">
                <h2>Ready to hire a skilled worker?</h2>
                <p class="mb-4">It just takes a few clicks to connect with trusted professionals.</p>
                <a href="ViewWorker.php" class="btn btn-primary py-3 px-5">Find Workers</a>
            </div>
        </div>
    </div>

   
    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../Assets/Templates/Main/lib/wow/wow.min.js"></script>
    <script src="../Assets/Templates/Main/lib/easing/easing.min.js"></script>
    <script src="../Assets/Templates/Main/lib/waypoints/waypoints.min.js"></script>
    <script src="../Assets/Templates/Main/lib/counterup/counterup.min.js"></script>
    <script src="../Assets/Templates/Main/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../Assets/Templates/Main/js/main.js"></script>
</body>
</html>
<?php
include('Foot.php')
?>
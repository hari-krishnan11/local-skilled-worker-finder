<?php
include("../Assets/Connection/Connection.php");
session_start();
include('Head.php');
?>
 
    <!-- Header -->
    <div class="container-fluid p-0 mb-5">
        <div class="position-relative">
            <img src="../Assets/Templates/Main/img/carousel-3.jpg" class="img-fluid w-100" alt="How it works for workers">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0,0,0,0.45);">
                <div class="container text-white">
                    <h1 class="display-4">How It Works for Workers</h1>
                    <p class="lead">Join our platform and connect with clients who need your skills.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Steps -->
    <div class="container-xxl py-5">
        <div class="container text-center">
            <h6 class="text-secondary text-uppercase">Process</h6>
            <h1 class="mb-5">Easy Steps to Start Working</h1>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="p-4 border rounded h-100">
                        <i class="fa fa-user-plus fa-3x text-primary mb-3"></i>
                        <h4>1. Register</h4>
                        <p>Create your worker profile with your skills, experience, and location.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 border rounded h-100">
                        <i class="fa fa-id-card fa-3x text-primary mb-3"></i>
                        <h4>2. Get Verified</h4>
                        <p>Our team verifies your details so users can trust your profile.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 border rounded h-100">
                        <i class="fa fa-briefcase fa-3x text-primary mb-3"></i>
                        <h4>3. Receive Jobs</h4>
                        <p>Get booking requests from users in your area who need your services.</p>
                    </div>
                </div>
            </div>
            <div class="row g-4 mt-4">
                <div class="col-md-6">
                    <div class="p-4 border rounded h-100">
                        <i class="fa fa-tools fa-3x text-primary mb-3"></i>
                        <h4>4. Complete Work</h4>
                        <p>Go to the client’s location, finish the job, and ensure customer satisfaction.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-4 border rounded h-100">
                        <i class="fa fa-star fa-3x text-primary mb-3"></i>
                        <h4>5. Earn & Grow</h4>
                        <p>Get paid for your work, collect reviews, and grow your reputation on the platform.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="container-fluid py-5 px-0">
        <div class="container">
            <div class="bg-light p-5 text-center">
                <h2>Want to start getting jobs?</h2>
                <p class="mb-4">Register today and connect with clients looking for your skills.</p>
                <a href="Worker.php" class="btn btn-primary py-3 px-5">Register as Worker</a>
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

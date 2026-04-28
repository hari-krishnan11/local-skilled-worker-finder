<?php
include("../Assets/Connection/Connection.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Skilled Worker Finder</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="../Assets/Templates/Main/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../Assets/Templates/Main/lib/animate/animate.min.css" rel="stylesheet">
    <link href="../Assets/Templates/Main/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../Assets/Templates/Main/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../Assets/Templates/Main/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../Assets/Templates/Main/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Topbar Start -->
    <div class="container-fluid bg-light d-none d-lg-block">
        <div class="row align-items-center top-bar">
            <div class="col-lg-3 col-md-12 text-center text-lg-start">
                <a href="" class="navbar-brand m-0 p-0">
                    <h1 class="text-primary m-0">SkilledFinder</h1>
                </a>
            </div>
            <div class="col-lg-9 col-md-12 text-end">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <i class="fa fa-map-marker-alt text-primary me-2"></i>
                    <p class="m-0">kothamagalam</p>
                </div>
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <i class="far fa-envelope-open text-primary me-2"></i>
                    <p class="m-0">info@example.com</p>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-0" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

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
                    <a href="Homepage.php" class="nav-item nav-link active">Home</a>
                    <a href="about.php" class="nav-item nav-link">About</a>
                    <a href="service.php" class="nav-item nav-link">Services</a>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                    <a href="Myprofile.php" class="nav-item nav-link">Profile</a>
                    <a href="MyBooking.php" class="nav-item nav-link">Booking</a>
                    <a href="Complaint.php" class="nav-item nav-link">Complaint</a>
                    <!-- <a href="Feedback.php" class="nav-item nav-link">Feedback</a> -->
                    <a href="ViewWorker.php" class="nav-item nav-link">Worker</a>
                    <a href="../index.php" class="nav-item nav-link">Logout</a>
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

    <!-- Hero Banner Start -->
    <div class="container-fluid p-0 mb-5">
        <div class="position-relative">
            <img class="img-fluid w-100" src="../Assets/Templates/Main/img/carousel-1.jpg" alt="Skilled Worker Finder">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .4);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Connecting People to Skilled Workers</h5>
                            <h1 class="display-3 text-white animated slideInDown mb-4">Find Skilled Workers Anytime, Anywhere</h1>
                            <p class="fs-5 fw-medium text-white mb-4 pb-2">Hire plumbers, cleaners, welders, electricians and more — quickly and reliably.</p>
                            <a href="viewWorker.php" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Book now</a>
                            <a href="HowWork.php" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">How It Works</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Banner End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-secondary text-uppercase">About Us</h6>
                    <h1 class="mb-4">We Connect You with Skilled Workers</h1>
                    <p class="mb-4">Our Skilled Worker Finder platform helps users discover nearby plumbers, cleaners, welders, electricians and more. Workers create verified profiles, and users can explore their skills, ratings, and locations.</p>
                    <p class="fw-medium text-primary"><i class="fa fa-check text-success me-3"></i>Verified worker profiles</p>
                    <p class="fw-medium text-primary"><i class="fa fa-check text-success me-3"></i>Search by skill and location</p>
                    <p class="fw-medium text-primary"><i class="fa fa-check text-success me-3"></i>Simple and transparent system</p>
                    <div class="bg-primary d-flex align-items-center p-4 mt-5">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt fa-2x text-primary"></i>
                        </div>
                        <div class="ms-3">
                            <p class="fs-5 fw-medium mb-2 text-white">Emergency 24/7</p>
                            <h3 class="m-0 text-secondary">+012 345 6789</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pt-4" style="min-height: 500px;">
                    <div class="position-relative h-100 wow fadeInUp" data-wow-delay="0.5s">
                        <img class="position-absolute img-fluid w-100 h-100" src="../Assets/Templates/Main/img/about-1.jpg" style="object-fit: cover; padding: 0 0 50px 100px;" alt="">
                        <img class="position-absolute start-0 bottom-0 img-fluid bg-white pt-2 pe-2 w-50 h-50" src="../Assets/Templates/Main/img/about-2.jpg" style="object-fit: cover;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Testimonial Start -->
 <div class="owl-carousel testimonial-carousel position-relative wow fadeInUp" data-wow-delay="0.1s">
    <?php
    $selRating = "SELECT r.*, u.user_name 
                  FROM tbl_rating r
                  INNER JOIN tbl_user u ON r.user_id = u.user_id
                  ORDER BY r.rating_date DESC LIMIT 6";
    $resRating = $Con->query($selRating);

    if($resRating->num_rows > 0){
        while($rt = $resRating->fetch_assoc()) {
    ?>
    <div class="testimonial-item text-center">
        <div class="testimonial-text bg-light text-center p-4 mb-4">
            <p class="mb-0"><?php echo htmlspecialchars($rt['rating_comment']); ?></p>
        </div>
        <img class="bg-light rounded-circle p-2 mx-auto mb-2" 
             src="../Assets/Templates/Main/img/test 1.jpg" 
             style="width: 80px; height: 80px;">
        <div class="mb-2">
            <?php for($i=1; $i<=5; $i++){ ?>
                <small class="fa fa-star <?php echo ($i <= $rt['rating_value']) ? 'text-secondary' : 'text-muted'; ?>"></small>
            <?php } ?>
        </div>
        <h5 class="mb-1"><?php echo htmlspecialchars($rt['user_name']); ?></h5>
    </div>
    <?php } } else { ?>
        <p class='text-center'>No ratings yet.</p>
    <?php } ?>
</div>

    <!-- Testimonial End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <!-- Keep your footer content as it is -->
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../Assets/Templates/Main/lib/wow/wow.min.js"></script>
    <script src="../Assets/Templates/Main/lib/easing/easing.min.js"></script>
    <script src="../Assets/Templates/Main/lib/waypoints/waypoints.min.js"></script>
    <script src="../Assets/Templates/Main/lib/counterup/counterup.min.js"></script>
    <script src="../Assets/Templates/Main/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../Assets/Templates/Main/lib/tempusdominus/js/moment.min.js"></script>
    <script src="../Assets/Templates/Main/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../Assets/Templates/Main/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../Assets/Templates/Main/js/main.js"></script>
</body>
</html>

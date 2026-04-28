<?php
include("../Assets/Connection/Connection.php");
session_start();
include('Head.php');


if(isset($_POST['btn_submit']))
{
    $content = $_POST['txt_content'];
    $date = $_POST['txt_date'];

    $insqry = "insert into tbl_request(request_date,request_fordate,request_content,worker_id,user_id) 
               values(CURDATE(),'".$date."','".$content."','".$_GET['wid']."','".$_SESSION['uid']."')";
    if($Con->query($insqry))
    {
        ?>
        <script>
        alert("Request Sent Successfully");
        window.location="MyBooking.php";
        </script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Book Service</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="../Assets/Templates/Main/img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../Assets/Templates/Main/lib/animate/animate.min.css" rel="stylesheet">
    <link href="../Assets/Templates/Main/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../Assets/Templates/Main/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Bootstrap -->
    <link href="../Assets/Templates/Main/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../Assets/Templates/Main/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- ✅ Navbar / Topbar (keep from template if needed) -->

    <!-- Page Header -->
    <div class="container-fluid page-header mb-5 py-5">
        <div class="container">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Booking</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a class="text-white" href="index.html">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Booking</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Booking Form -->
    <div class="container my-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="bg-light p-5 shadow rounded">
                    <h2 class="mb-4 text-center">Book Service Request</h2>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="txt_content" class="form-label fw-bold">Content</label>
                            <textarea name="txt_content" id="txt_content" class="form-control" rows="5" placeholder="Describe your service request..." required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="txt_date" class="form-label fw-bold">Service Date</label>
                            <input type="date" name="txt_date" id="txt_date" class="form-control" required min="<?php echo date('Y-m-d'); ?>">
                        </div>
                        <div class="text-center">
                            <button type="submit" name="btn_submit" class="btn btn-primary w-100 py-3">BOOK NOW</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ✅ Footer (keep from template) -->

    <!-- JS -->
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
    <script src="../Assets/Templates/Main/js/main.js"></script>
</body>
</html>
<?php
include('Foot.php')
?>
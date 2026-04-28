<?php
include("../Assets/Connection/Connection.php");
ob_start();
include('Head.php');
if(isset($_POST['btn_log']))
{
    $email=$_POST['txt_email'];
    $Password=$_POST['txt_password'];
    
    $seluser="select * from tbl_user where user_email='".$email."' and user_password='".$Password."'";
    $useres=$Con->query($seluser);
    
    $selworker="select * from tbl_worker where worker_email='".$email."' and worker_password='".$Password."'";
    $workerres=$Con->query($selworker);
    
    $seladmin="select * from tbl_adminreg where admin_email='".$email."' and admin_password='".$Password."'";
    $adminres=$Con->query($seladmin);
    
    
    if($userdata=$useres->fetch_assoc())
    {
        $_SESSION['uid']=$userdata['user_id'];
        header("location:../User/Homepage.php");
    }
    elseif($workerdata=$workerres->fetch_assoc())
    {
        $_SESSION['wid']=$workerdata['worker_id'];
        header("location:../Worker/Homepage.php");
    }
    elseif($admindata=$adminres->fetch_assoc())
    {
        $_SESSION['aid']=$admindata['admin_id'];
        header("location:../Admin/Homepage.php");
    }
    else
    {
        ?>
        <script>
        alert("Invalid Email or Password");
        window.location="Login.php";
        </script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login - Skilled Worker Finder</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

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

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../Assets/Templates/Main/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../Assets/Templates/Main/css/style.css" rel="stylesheet">

    <style>
        .login-section {
            background: url('../Assets/Templates/Main/img/carousel-1.jpg') no-repeat center center;
            background-size: cover;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .login-box {
            background: rgba(255,255,255,0.95);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.15);
        }
    </style>
</head>

<body>

 

<!-- Login Form Start -->
<div class="container-fluid login-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8">
                <div class="login-box">
                    <h3 class="text-center mb-4">Login</h3>
                    <form method="post">
                        <div class="mb-3">
                            <label for="txt_email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="txt_email" name="txt_email" required>
                        </div>
                        <div class="mb-3">
                            <label for="txt_password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="txt_password" name="txt_password" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" name="btn_log" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                    <p class="text-center mt-3">Don’t have an account? <a href="User.php">Sign up</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login Form End -->

<!-- Footer -->
<div class="container-fluid bg-dark text-light footer pt-5 mt-5">
    <div class="container py-5 text-center">
        <p class="mb-0">&copy; Skilled Worker Finder, All Rights Reserved.</p>
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
ob_flush();
include('Foot.php');
?>

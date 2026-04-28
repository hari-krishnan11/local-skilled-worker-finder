<?php
include("../Assets/Connection/Connection.php");
session_start();
include('Head.php');


$i = 0;
$selQry = "SELECT * FROM tbl_request r
INNER JOIN tbl_worker u ON u.worker_id = r.worker_id where user_id='".$_SESSION['uid']."'";
$row = $Con->query($selQry);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Request History</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
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
    <!-- Topbar + Navbar (you can keep from template) -->

    <!-- Page Header -->


    <!-- Booking/History Section -->
    <div class="container my-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="bg-light p-4 shadow">
            <h2 class="mb-4 text-center">Your Booking History</h2>
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>SNo</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>For Date</th>
                            <th>Content</th>
                            <th>Worker</th>
                            <th>Contact</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($data = $row->fetch_assoc()) {
                            $i++;
                            $statusText = '';
                            $statusClass = '';
                            if($data['request_status'] == 0) { $statusText = "Pending Booking"; $statusClass = "text-warning"; }
                            elseif($data['request_status'] == 1) { $statusText = "Accepted"; $statusClass = "text-success"; }
                            elseif($data['request_status'] == 2) { $statusText = "Rejected"; $statusClass = "text-danger"; }
                            elseif($data['request_status'] == 3) { $statusText = "Payment pending "; $statusClass = "text-warning"; }
                            elseif($data['request_status'] == 4) { $statusText = "Payment completed "; $statusClass = "text-primary"; }
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $data['request_date']; ?></td>
                            <td><?php echo ($data['request_amount']=="") ? "Pending" : $data['request_amount']; ?></td>
                            <td><?php echo $data['request_fordate']; ?></td>
                            <td><?php echo $data['request_content']; ?></td>
                            <td><?php echo $data['worker_name']; ?></td>
                            <td><?php echo $data['worker_contact']; ?></td>
                            <td class="<?php echo $statusClass; ?>"><strong><?php echo $statusText; ?></strong></td>
                            <td>
                              
    <?php
    if($data['request_status']==0) {
        echo "Pending";
    } elseif($data['request_status']==1) {
        echo "Accepted";
    } elseif($data['request_status']==2) {
        echo "Rejected";
    } elseif($data['request_status']==3) {
        echo '<a href="Payment.php?bid='.$data['request_id'].'" class="btn btn-sm btn-primary">Pay</a>';
    } elseif($data['request_status']==4) {
        echo '<a href="Rating.php?prodid='.$data['worker_id'].'" class="btn btn-sm btn-warning">Rate</a>';
    } else {
        echo "-";
    }
    ?>
</td>

                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Footer (keep from template) -->

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

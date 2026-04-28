
<?php
include("../Assets/Connection/Connection.php");
session_start();
include('Head.php');


if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['btn_Sub'])) {
    $complaint = $_POST['txt_complaint'];
    $uid = $_SESSION['uid'];

    $InsQry = "INSERT INTO tbl_complaint(user_id, complaint_content,complaint_date) VALUES('$uid', '$complaint',curdate())";
    if ($Con->query($InsQry)) {
        echo "<script>alert('Complaint submitted successfully!'); window.location = 'Complaint.php';</script>";
    }
}

if (isset($_GET['delId'])) {
    $delId = $_GET['delId'];
    $Con->query("DELETE FROM tbl_complaint WHERE complaint_id='$delId' AND user_id='".$_SESSION['uid']."'");
    echo "<script>alert('Complaint deleted successfully!'); window.location = 'Complaint.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Complaint Management</title>
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

    <!-- Bootstrap -->
    <link href="../Assets/Templates/Main/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../Assets/Templates/Main/css/style.css" rel="stylesheet">
</head>

<body>


    <!-- ✅ Complaint Form -->
    <div class="container my-5">
        <div class="row justify-content-center wow fadeInUp" data-wow-delay="0.1s">
            <div class="col-lg-8">
                <div class="bg-light p-5 shadow rounded">
                    <h3 class="mb-4 text-center text-primary">Submit a New Complaint</h3>
                    <form method="post" action="">
                        <div class="mb-3">
                            <label for="txt_complaint" class="form-label fw-bold">Complaint Details</label>
                            <textarea name="txt_complaint" id="txt_complaint" class="form-control" rows="5" placeholder="Please describe your complaint..." required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="btn_Sub" class="btn btn-danger w-100 py-3">Submit Complaint</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ✅ Complaint List -->
    <div class="container my-5">
        <div class="row justify-content-center wow fadeInUp" data-wow-delay="0.2s">
            <div class="col-lg-10">
                <div class="bg-white p-4 shadow rounded">
                    <h4 class="mb-4 text-primary">Your Previous Complaints</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle">
                            <thead class="table-primary">
                                <tr>
                                    <th>SN</th>
                                    <th>Content</th>
                                    <th>Date</th>
                                    <th>Reply</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $sel = "SELECT * FROM tbl_complaint WHERE user_id='".$_SESSION['uid']."' ORDER BY complaint_date DESC";
                                $res = $Con->query($sel);
                                
                                if ($res->num_rows > 0) {
                                    while ($data = $res->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo htmlspecialchars($data['complaint_content']); ?></td>
                                    <td><?php echo date('d M Y', strtotime($data['complaint_date'])); ?></td>
                                    <td>
                                        <?php 
                                            if (empty($data['complaint_reply'])) {
                                                echo "<span class='text-muted fst-italic'>No reply yet</span>";
                                            } else {
                                                echo "<span class='text-success fw-bold'>".htmlspecialchars($data['complaint_reply'])."</span>";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="Complaint.php?delId=<?php echo $data['complaint_id']; ?>" 
                                           class="btn btn-sm btn-outline-danger"
                                           onclick="return confirm('Are you sure you want to delete this complaint?')">
                                           Delete
                                        </a>
                                    </td>
                                </tr>
                                <?php 
                                    }
                                } else {
                                ?>
                                <tr>
                                    <td colspan="5" class="text-center text-muted">No complaints submitted yet</td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ✅ Footer -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn">
        <div class="container text-center">
            <p class="mb-0">&copy; SkilledWorkersFinder. All Rights Reserved.</p>
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
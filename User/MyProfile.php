<?php
include("../Assets/Connection/Connection.php");
session_start();
include('Head.php');

$select = "SELECT * FROM tbl_user u 
           INNER JOIN tbl_place p ON u.place_id = p.place_id 
           INNER JOIN tbl_district d ON p.district_id = d.district_id 
           WHERE user_id = '".$_SESSION['uid']."'";
$res=$Con->query($select);
$data=$res->fetch_assoc();
?>
 

    <!-- ✅ Profile Card -->
    <div class="container py-5">
        <div class="row justify-content-center wow fadeInUp" data-wow-delay="0.2s">
            <div class="col-lg-8">
                <div class="card shadow border-0">
                    <div class="card-header bg-primary text-white text-center py-4">
                        <h3 class="mb-0">Profile Details</h3>
                    </div>
                    <div class="card-body p-4">
                        <table class="table table-bordered mb-4">
                            <tr>
                                <th style="width:30%;">Name</th>
                                <td><?php echo htmlspecialchars($data['user_name'] ?? '') ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?php echo htmlspecialchars($data['user_email'] ?? '') ?></td>
                            </tr>
                            <tr>
                                <th>Contact</th>
                                <td><?php echo htmlspecialchars($data['user_contact'] ?? '') ?></td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td><?php echo htmlspecialchars($data['user_address'] ?? '') ?></td>
                            </tr>
                            <tr>
                                <th>District</th>
                                <td><?php echo htmlspecialchars($data['district_name'] ?? '') ?></td>
                            </tr>
                            <tr>
                                <th>Place</th>
                                <td><?php echo htmlspecialchars($data['place_name'] ?? '') ?></td>
                            </tr>
                            
                        </table>
                        <div class="text-center">
                            <a href="EditProfile.php" class="btn btn-success me-2"><i class="fa fa-edit me-1"></i> Edit Profile</a>
                            <a href="ChangePassword.php" class="btn btn-warning"><i class="fa fa-key me-1"></i> Change Password</a>
                        </div>
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
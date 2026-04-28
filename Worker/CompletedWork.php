<?php
include("../Assets/Connection/Connection.php");
session_start();
include('Head.php');

if(!isset($_SESSION['wid'])) {
    echo "<div class='container mt-5'><div class='alert alert-danger'>Worker not logged in.</div></div>";
    exit;
}

$i = 0;
$wid = $_SESSION['wid'];

// ✅ Completed = Payment completed (status = 4)
$selQry = "SELECT r.*, u.user_name, u.user_contact, u.user_address 
           FROM tbl_request r
           INNER JOIN tbl_user u ON u.user_id = r.user_id
           WHERE r.worker_id = '$wid' AND r.request_status = 4
           ORDER BY r.request_date DESC";

$row = $Con->query($selQry);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Completed Works</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="../Assets/Templates/Main/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <div class="bg-light p-4 shadow">
        <h2 class="mb-4 text-center">My Completed Works</h2>
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>SNo</th>
                        <th>Date</th>
                        <th>For Date</th>
                        <th>User</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Content</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if($row && $row->num_rows > 0) {
                    while($data = $row->fetch_assoc()) {
                        $i++;
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $data['request_date']; ?></td>
                            <td><?php echo $data['request_fordate']; ?></td>
                            <td><?php echo $data['user_name']; ?></td>
                            <td><?php echo $data['user_contact']; ?></td>
                            <td><?php echo $data['user_address']; ?></td>
                            <td><?php echo $data['request_content']; ?></td>
                            <td><?php echo $data['request_amount']; ?></td>
                            <td><span class="badge bg-success">Completed</span></td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='9' class='text-center'>No completed works yet.</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
<?php include('Foot.php'); ?>

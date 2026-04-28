<?php
ob_start();
include("Header.php");
include("../Assets/Connection/Connection.php");
session_start();

if (!isset($_GET['wid'])) {
    header("Location: WorkerVerification.php");
    exit();
}

$wid = $_GET['wid'];

$selQry = "SELECT * FROM tbl_worker u 
INNER JOIN tbl_place p ON u.place_id = p.place_id 
INNER JOIN tbl_district d ON p.district_id = d.district_id 
INNER JOIN tbl_category c ON u.category_id = c.category_id 
WHERE u.worker_id = $wid";

$row = $Con->query($selQry);
$data = $row->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Worker Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-lg border-0">
        <div class="row g-0">
          <!-- Worker Photo -->
          <div class="col-md-4 d-flex align-items-center justify-content-center p-3">
            <img src="../Assets/Worker/Photo/<?php echo $data['worker_photo']?>" 
                 class="img-fluid rounded shadow" style="max-height:250px; object-fit:cover;">
          </div>
          <!-- Worker Details -->
          <div class="col-md-8">
            <div class="card-body">
              <h3 class="card-title"><?php echo $data['worker_name']; ?></h3>
              <h6 class="text-muted mb-3"><?php echo $data['category_name']; ?></h6>

              <p><strong>Email:</strong> <?php echo $data['worker_email']; ?></p>
              <p><strong>Contact:</strong> <?php echo $data['worker_contact']; ?></p>
              <p><strong>Address:</strong> <?php echo $data['worker_address']; ?>, 
                 <?php echo $data['place_name']; ?>, <?php echo $data['district_name']; ?></p>
              <p><strong>Proof:</strong> 
                <a href="../Assets/Worker/Proof/<?php echo $data['worker_proof']; ?>" target="_blank">
                  View Proof
                </a>
              </p>
              
              <!-- Action Buttons -->
              <div class="mt-4 d-flex gap-3">
                <a href="WorkerVerification.php?action=accept&id=<?php echo $data['worker_id']; ?>" 
                   class="btn btn-success">Accept</a>
                <a href="WorkerVerification.php?action=reject&id=<?php echo $data['worker_id']; ?>" 
                   class="btn btn-danger">Reject</a>
                <a href="WorkerVerification.php" class="btn btn-secondary">Back</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
ob_end_flush();
include("Footer.php");
?>
</body>
</html>

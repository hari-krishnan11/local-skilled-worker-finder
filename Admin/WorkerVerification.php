<?php
ob_start();
include("Header.php");

include("../Assets/Connection/Connection.php");
session_start();



if(isset($_GET['aid']))
{
  $upQry="update tbl_worker set worker_status=1 where worker_id='".$_GET['aid']."' ";
  if($Con->query($upQry))
  {
    ?>
    <script>
      alert("Accepted");
      window.location="WorkerVerification.php"
    </script>
    <?php
  }
}
if(isset($_GET['rid']))
{
  $upQry="update tbl_worker set worker_status=2 where worker_id='".$_GET['rid']."' ";
  if($Con->query($upQry))
  {
    ?>
    <script>
      alert("Rejected");
      window.location="WorkerVerification.php"
    </script>
    <?php
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Worker Verification</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .card-link {
      text-decoration: none;
      color: inherit;
    }
    .card-link:hover .card {
      transform: scale(1.03);
      transition: 0.2s;
    }
  </style>
</head>
<body>
<div class="container mt-5">
  <h2 class="mb-4 text-center">Worker Verification</h2>
  <div class="row g-4">

  <?php
  $selQry = "SELECT * FROM tbl_worker u 
INNER JOIN tbl_place p ON u.place_id = p.place_id 
INNER JOIN tbl_district d ON p.district_id = d.district_id 
INNER JOIN tbl_category c ON u.category_id = c.category_id where u.worker_status=0";

$row = $Con->query($selQry);
 while($data = $row->fetch_assoc()) { ?>
    <div class="col-md-2 col-sm-6">
      <div class="card shadow-lg border-0 h-100">
        <a href="WorkerVerificationProfile.php?wid=<?php echo $data['worker_id'] ?>" class="card-link">
          <img src="../Assets/Worker/Photo/<?php echo $data['worker_photo']?>" 
               class="card-img-top" style="height:180px; object-fit:cover;">
          <div class="card-body text-center">
            <h5 class="card-title mb-1"><?php echo $data['worker_name']; ?></h5>
            <p class="text-muted small mb-1"><?php echo $data['category_name']; ?></p>
          </div>
        </a>
        <div class="card-footer bg-white text-center">
          <div class="d-flex justify-content-around">
            <a href="WorkerVerification.php?aid=<?php echo $data['worker_id']; ?>" 
               class="btn btn-success btn-sm">Accept</a>
            <a href="WorkerVerification.php?rid=<?php echo $data['worker_id']; ?>" 
               class="btn btn-danger btn-sm">Reject</a>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  </div>


  <h2 class="mb-4 text-center">Accepted Worker Verification</h2>
  <div class="row g-4">

  <?php
  $selQry = "SELECT * FROM tbl_worker u 
INNER JOIN tbl_place p ON u.place_id = p.place_id 
INNER JOIN tbl_district d ON p.district_id = d.district_id 
INNER JOIN tbl_category c ON u.category_id = c.category_id where u.worker_status=1";

$row = $Con->query($selQry);
 while($data = $row->fetch_assoc()) { ?>
    <div class="col-md-2 col-sm-6">
      <div class="card shadow-lg border-0 h-100">
        <a href="WorkerVerificationProfile.php?wid=<?php echo $data['worker_id'] ?>" class="card-link">
          <img src="../Assets/Worker/Photo/<?php echo $data['worker_photo']?>" 
               class="card-img-top" style="height:180px; object-fit:cover;">
          <div class="card-body text-center">
            <h5 class="card-title mb-1"><?php echo $data['worker_name']; ?></h5>
            <p class="text-muted small mb-1"><?php echo $data['category_name']; ?></p>
          </div>
        </a>
        <div class="card-footer bg-white text-center">
          <div class="d-flex justify-content-around">
            <a href="WorkerVerification.php?aid=<?php echo $data['worker_id']; ?>" 
               class="btn btn-success btn-sm">Accept</a>
            <a href="WorkerVerification.php?rid=<?php echo $data['worker_id']; ?>" 
               class="btn btn-danger btn-sm">Reject</a>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  </div>

  <h2 class="mb-4 text-center">Rejected Worker Verification</h2>
  <div class="row g-4">

  <?php
  $selQry = "SELECT * FROM tbl_worker u 
INNER JOIN tbl_place p ON u.place_id = p.place_id 
INNER JOIN tbl_district d ON p.district_id = d.district_id 
INNER JOIN tbl_category c ON u.category_id = c.category_id where u.worker_status=2";

$row = $Con->query($selQry);
 while($data = $row->fetch_assoc()) { ?>
    <div class="col-md-2 col-sm-6">
      <div class="card shadow-lg border-0 h-100">
        <a href="WorkerVerificationProfile.php?wid=<?php echo $data['worker_id'] ?>" class="card-link">
          <img src="../Assets/Worker/Photo/<?php echo $data['worker_photo']?>" 
               class="card-img-top" style="height:180px; object-fit:cover;">
          <div class="card-body text-center">
            <h5 class="card-title mb-1"><?php echo $data['worker_name']; ?></h5>
            <p class="text-muted small mb-1"><?php echo $data['category_name']; ?></p>
          </div>
        </a>
        <div class="card-footer bg-white text-center">
          <div class="d-flex justify-content-around">
            <a href="WorkerVerification.php?aid=<?php echo $data['worker_id']; ?>" 
               class="btn btn-success btn-sm">Accept</a>
            <a href="WorkerVerification.php?rid=<?php echo $data['worker_id']; ?>" 
               class="btn btn-danger btn-sm">Reject</a>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  </div>
</div>

<?php
ob_end_flush();
include("Footer.php");
?>
</body>
</html>

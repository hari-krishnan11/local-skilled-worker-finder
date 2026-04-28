<?php
include("../Assets/Connection/Connection.php");
session_start();
include('Head.php');

if(isset($_POST['txt_submit']))
    {
        echo "cloigvh";
    $amt=$_POST['txt_amount'];
    $upqry = "UPDATE tbl_request SET request_amount='".$amt."',request_status=3 where request_id='".$_GET['rid']."'";
    if($Con->query($upqry))
			{
				?>
				<script>
				alert("Amount Updated");
				window.location="ViewBooking.php";
				</script>
				<?php
			}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Enter Amount</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f8f9fa;
    }
    .card {
      border-radius: 15px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    .form-label {
      font-weight: 600;
    }
  </style>
</head>
<body>
    <form action="" method="post">
  <div class="container d-flex justify-content-center align-items-center" style="min-height:100vh;">
    <div class="card p-4 col-md-6">
      <h3 class="text-center mb-4">Enter Amount</h3>
        <div class="mb-3">
          <label for="txt_amount" class="form-label">Amount</label>
          <input type="text" name="txt_amount" id="txt_amount" class="form-control" placeholder="Enter amount">
        </div>
        <div class="text-center">
          <input type="submit" name="txt_submit" class="btn btn-primary px-4">
          <button type="reset" class="btn btn-secondary px-4">Clear</button>
        </div>
    </div>
</div>
</form>

  <!-- Bootstrap JS (optional for better form UI) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
include('Foot.php');
?>

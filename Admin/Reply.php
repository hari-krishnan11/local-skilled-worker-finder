<?php
include("../Assets/Connection/Connection.php");
session_start();

if (isset($_POST['btn_submit'])) {
    $reply = $_POST['txt_replay'];

    $upQry = "UPDATE tbl_complaint 
              SET complaint_reply = '" . $reply . "', complaint_status = 1 
              WHERE complaint_id = '" . $_GET['cid'] . "'";

    if ($Con->query($upQry)) {
        echo "<script>
                alert('Reply Sent Successfully');
                window.location = 'ViewComplaint.php';
              </script>";
    } else {
        echo "<script>alert('Failed to send reply.');</script>";
    }
}

$selComp = "SELECT * FROM tbl_complaint WHERE complaint_id = '" . $_GET['cid'] . "'";
$resComp = $Con->query($selComp);
$dataComp = $resComp->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Reply to Complaint</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
    background-color: #f8fafc;
    font-family: 'Poppins', sans-serif;
}
.container {
    max-width: 500px;
    margin-top: 80px;
}
.card {
    border-radius: 12px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
}
.card-header {
    background-color: #0d6efd;
    color: white;
    font-weight: 600;
    text-align: center;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
}
.form-control {
    border-radius: 8px;
}
.btn-submit {
    width: 100%;
    border-radius: 8px;
}
</style>
</head>

<body>
<div class="container">
    <div class="card">
        <div class="card-header">
            Reply to Complaint
        </div>
        <div class="card-body">
            <form method="post" action="">
                <div class="mb-3">
                    <label for="txt_replay" class="form-label">Your Reply</label>
                    <input type="text" name="txt_replay" id="txt_replay" class="form-control" placeholder="Type your reply here..." required>
                </div>
                <button type="submit" name="btn_submit" class="btn btn-primary btn-submit">Submit Reply</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>

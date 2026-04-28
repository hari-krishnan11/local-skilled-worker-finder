<?php
ob_start();
include("Header.php");

include("../Assets/Connection/Connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
 <style>
    table {
      border-color: black;
    }
    .form-control {
      background-color: #0c02021f;
    }
  </style>

<body>
  <div class="container mt-5">
      <h2 class="mb-4 text-center">Manage ViewComplaint</h2>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
  <table class="table table-bordered table-striped">
        <thead class="table-dark">  
  <tr>
      <td>SNo</td>
      <td>Username</td>
      <td>content</td>
      <td>Date</td>
      <td>Reply</td>
      <td>Action</td>
    </tr>
    <?php
	$i=0;
    $sel="select * from tbl_complaint c inner join tbl_user u on u.user_id=c.user_id";
    $res=$Con->query($sel);
    while($data=$res->fetch_assoc())
    {

    $i++;
    ?>
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $data['user_name']?></td>
      <td><?php echo $data['complaint_content']?></td>
      <td><?php echo $data['complaint_date']?></td>
      <td><?php echo $data['complaint_reply']?></td>
      <td><a href="Reply.php?cid=<?php echo $data['complaint_id'] ?>"class="btn btn-sm btn-danger">replay</a></td>
    </tr>
    <?php
    }
    ?>
  </table>
  <a href="#"></a>
</form>
</body>
</html>

<?php
ob_end_flush();
include("Footer.php");
?>
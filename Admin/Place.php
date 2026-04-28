<?php
ob_start();
include("Header.php");

include("../Assets/Connection/Connection.php");
$dname="";
$did="";
$districtid="";
if(isset($_POST['btn_submit']))
{
	$Place=$_POST['txt_Pal'];
	$district=$_POST['sel_Dis'];
	$hid=$_POST['txt_id'];
	if($hid=="")
	{
		$InsQry="insert into tbl_place(place_name,district_id)values('".$Place."','".$district."')";
		if($Con->query($InsQry))
		{
			
				?>
        <script>
		alert("Inserted");
		window.location="Place.php";
		</script>
        <?php
		}
	}
	else
	{
		$upQry="update tbl_place set place_name='".$Place."',district_id='".$district."' where place_id='".$hid."' ";
		if($Con->query($upQry))
		{
		?>
        <script>
		alert("Updated");
		window.location="Place.php";
		</script>
        <?php
		}
	}
}
	

if(isset($_GET['delId']))
{
	$delQry="delete from tbl_place where place_id='".$_GET['delId']."'";
	if($Con->query($delQry))
		{
			
			?>
        <script>
		alert("Delete");
		window.location="Place.php";
		</script>
        <?php
		}
	
}
if(isset($_GET['editId']))
{
	$selQry="select * from tbl_place where place_id='".$_GET['editId']."'";
	$res=$Con->query($selQry);
	$editdata=$res->fetch_assoc();
	$dname=$editdata['place_name'];
	$did=$editdata['place_id'];
	$districtid=$editdata['district_id'];
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Place</title>
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
  <div class="container">
      <h2 class="mb-4 text-center">Manage place</h2>

      <form method="post" action="" class="mb-5">
        <div class="table-responsive">
          <div class="table-responsive">
            <table class="table table-bordered align-middle">    <tr>
            <td width="25">District</td>
            <td><label for="sel_Dis"></label>
              <select name="sel_Dis" id="sel_Dis" class="form-select">
                <option>SELECT</option>
          <?php
		  $selQry="select * from tbl_district";
		  $row=$Con->query($selQry);
		  while($data=$row->fetch_assoc())
		  {
			  
		  ?>
          <option 
          <?php
		  if($districtid==$data['district_id'])
		  {
			  echo "selected";
		  }
		  ?>
          value="<?php echo $data['district_id']?>"><?php echo $data['district_name']?></option>
          <?php
		  }
		  ?>
      </select></td>
    </tr>
    <tr>
      <td >Place</td>
      <td><label for="txt_Pal" ></label>
      <input type="hidden" name="txt_id" id="txt_id"  class="form-control" value="<?php echo $did?>" />
      <input type="text" name="txt_Pal" id="txt_Pal"  class="form-control" value="<?php echo $dname?>" required/></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit"    class="btn btn-primary" value="Submit" />
      </div></td>
    </tr>
  </table>
</form>
  <table class="table table-bordered table-striped">
        <thead class="table-dark">
  <tr>
    <td>No</td>
    <td>District</td>
    <td>Place</td>
    <td>Action</td>
  </tr>
    <?php
  $i=0;
  $selQry="select * from tbl_place p
  inner join tbl_district d on
  p.district_id=d.district_id";
  $row=$Con->query($selQry);
  while($data=$row->fetch_assoc())
  {
	  
  $i++;
  
  ?>
  <tr>
    <td><?php echo $i?></td>
    <td><?php echo $data['district_name']?></td>
    <td><?php echo $data['place_name']?></td>
        <td><a href="Place.php?delId=<?php echo $data['place_id']?>" class="btn btn-sm btn-danger">Delete</a>
            <a href="Place.php?editId=<?php echo $data['place_id']?>"class="btn btn-sm btn-warning">Edit</a></td>
  </tr>
    <?php
  }
  ?>

</table>
<p></p>
</body>
</html>


<?php
ob_end_flush();
include("Footer.php");
?>
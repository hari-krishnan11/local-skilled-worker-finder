   <?php
   ob_start();
include("Header.php");
include("../Assets/Connection/Connection.php");
$dname="";
$did="";
if(isset($_POST['btn_submit']))
{
	$category=$_POST['txt_Cat'];
	$did=$_POST['txt_id'];
	if($did == "")
	{
	$InsQry="insert into tbl_category(category_name)values('".$category."')";
	$InsQry="insert into tbl_category(category_name)values('".$category."')";
		if($Con->query($InsQry))
		{
			
				?>
        <script>
		alert("Inserted");
		window.location="Category.php";
		</script>
        <?php
		}
}
	else
	{
		$upQry="update tbl_category set category_name='".$category."' where category_id='".$did."'";
		if($Con->query($upQry))
	{
		?>
        <script>
		alert("Updated");
		window.location="Category.php";
		</script>
        <?php
	}
	}
	
}

if(isset($_GET['delId']))
{
	$delQry="delete from tbl_category where category_id='".$_GET['delId']."'";
	if($Con->query($delQry))
		{
			
			?>
        <script>
		alert("Delete");
		window.location="Category.php";
		</script>
        <?php
		}
	
}

if(isset($_GET['editId']))
{
	$selQry="select * from tbl_category where category_id='".$_GET['editId']."'";
	$res=$Con->query($selQry);
	$editdata=$res->fetch_assoc();
	$dname=$editdata['category_name'];
	$did=$editdata['category_id'];
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>category</title>
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
      <h2 class="mb-4 text-center">Manage category</h2>
 <form method="post" action="" class="mb-5">
        <div class="table-responsive">
          <table class="table table-bordered align-middle">
            <tbody>
    <tr>
      <td width="25">Category</td>
      <td width=""><label for="txt_Cat"  class="form-label mb-0"></label>
      <input type="text" name="txt_Cat" id="txt_Cat"  class="form-control" value="<?php echo $dname ?>" required />
      <input type="hidden" name="txt_id" id="txt_id"  value="<?php echo $did ?>" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit"  class="btn btn-primary" value="Submit" />
      </div></td>
    </tr>
  </table>
</form>
<table width="200" border="1">
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
  <tr>
    <td>No</td>
    <td>category</td>
    <td>Action</td>
  </tr>
      <?php
  $i=0;
  $selQry="select * from tbl_category";
  $row=$Con->query($selQry);
  while($data=$row->fetch_assoc())
  {
	  
  $i++;
  
  ?>
  <tr>
    <td><?php  echo $i ?></td>
    <td> <?php echo $data['category_name']?></td>
    <td><a href="Category.php?delId=<?php echo $data['category_id']?>"class="btn btn-sm btn-warning">Delete</a>
    <a href="Category.php?editId=<?php echo $data['category_id']?>"class="btn btn-sm btn-danger">Edit</a></td>
  </tr>
  <?php 
  }
  ?>
</table>
</body>
</html>
<?php
ob_end_flush();
include("Footer.php");
?>
<?php
include("../Assets/Connection/Connection.php");
session_start();
include('Head.php');

$select="select * from tbl_worker where worker_id='".$_SESSION['wid']."'";
$res=$Con->query($select);
$data=$res->fetch_assoc();
$dbpass=$data['worker_password'];

if(isset($_POST['btn_change']))
{
	$oldpass=$_POST['txt_old'];
	$newpass=$_POST['txt_new'];
	$retypepass=$_POST['txt_re'];
	
	if($oldpass == $dbpass)
	{
		if($newpass == $retypepass)
		{
			$upqry="update tbl_worker set worker_password='".$newpass."' where worker_id='".$_SESSION['wid']."'";
			if($Con->query($upqry))
			{
				?>
				<script>
				alert("Password Updated Successfully");
				window.location="MyProfile.php";
				</script>
				<?php
			}
		}
		else
		{
			?>
			<script>
			alert("Password Mismatch");
			</script>
			<?php
		}
	}
	else
	{
		?>
		<script>
		alert("Old Password Incorrect");
		</script>
		<?php
	}
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<title>Change Password</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background: #f4f7fb;
        margin: 0;
        padding: 0;
    }
    .form-container {
        width: 400px;
        margin: 80px auto;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        padding: 30px;
    }
    .form-container h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    td {
        padding: 12px 8px;
        font-size: 14px;
        color: #333;
    }
    input[type="password"], input[type="text"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 14px;
        outline: none;
        transition: 0.3s;
    }
    input[type="password"]:focus, input[type="text"]:focus {
        border-color: #4a90e2;
        box-shadow: 0 0 5px rgba(74,144,226,0.3);
    }
   .form-actions input {
    padding: 10px 18px;
    border: none;
    border-radius: 6px;
    margin: 0 5px;
    background: #4a90e2;
    color: #fff;
    font-size: 14px;
    cursor: pointer;
    transition: background 0.3s, transform 0.2s;
}
.form-actions input:hover {
    background: #357abd;
    transform: scale(1.03);
}
#btn_cancel {
    background: #888;
}
#btn_cancel:hover {
    background: #555;
}

</style>
</head>

<body>
    <div class="form-container">
        <h2>Change Password</h2>
        <form id="form1" name="form1" method="post" action="">
          <table>
            <tr>
              <td>Old Password</td>
              <td><input type="password" name="txt_old" id="txt_old" required /></td>
            </tr>
            <tr>
              <td>New Password</td>
              <td><input type="password" name="txt_new" id="txt_new" required /></td>
            </tr>
            <tr>
              <td>Re-Type Password</td>
              <td><input type="password" name="txt_re" id="txt_re" required /></td>
            </tr>
            <tr>
  <td colspan="2" class="form-actions">
    <input type="submit" name="btn_change" id="btn_change" value="Change Password" />
    <input type="button" name="btn_cancel" id="btn_cancel" value="Cancel" onclick="window.location='MyProfile.php';" />
  </td>
</tr>

          </table>
        </form>
    </div>
</body>
</html>
<?php
include('Foot.php');
?>
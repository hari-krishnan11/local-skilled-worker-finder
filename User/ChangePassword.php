<?php
include("../Assets/Connection/Connection.php");
session_start();
include('Head.php');

$select="select * from tbl_user where user_id='".$_SESSION['uid']."'";
$res=$Con->query($select);
$data=$res->fetch_assoc();
$dbpass=$data['user_password'];

if(isset($_POST['btn_change']))
{
    $oldpass=$_POST['txt_old'];
    $newpass=$_POST['txt_new'];
    $retypepass=$_POST['txt_re'];
    
    if($oldpass == $dbpass)
    {
        if($newpass == $retypepass)
        {
            $upqry="update tbl_user set user_password='".$newpass."' where user_id='".$_SESSION['uid']."'";
            if($Con->query($upqry))
            {
                ?>
                <script>
                alert("Password Updated Successfully!");
                window.location="MyProfile.php";
                </script>
                <?php
            }
            else
            {
                ?>
                <script>
                alert("Error updating password. Please try again.");
                </script>
                <?php
            }
        }
        else
        {
            ?>
            <script>
            alert("New passwords do not match!");
            </script>
            <?php
        }
    }
    else
    {
        ?>
        <script>
        alert("Current password is incorrect!");
        </script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Password</title>
<style>
    * {
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    body {
        background-color: #f5f7fa;
        margin: 0;
        padding: 0;
        min-height: 100vh;
    }

    .cont{
        display:flex;
        justify-content:center;
        align-items:center;
    }
    .password-container {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        padding: 30px;
        width: 100%;
        max-width: 450px;
    }
    .password-header {
        text-align: center;
        margin-bottom: 25px;
        color: #2c3e50;
    }
    .password-header h2 {
        margin: 0;
        font-size: 24px;
        color: #3498db;
    }
    .password-form {
        width: 100%;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #34495e;
    }
    .form-group input {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
        transition: all 0.3s;
    }
    .form-group input:focus {
        border-color: #3498db;
        outline: none;
        box-shadow: 0 0 0 2px rgba(52,152,219,0.2);
    }
    .form-group input[type="password"] {
        letter-spacing: 1px;
    }
    .button-group {
        display: flex;
        gap: 15px;
        margin-top: 25px;
    }
    .btn-submit {
        background-color: #3498db;
        color: white;
        border: none;
        padding: 12px 25px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        flex: 1;
        font-weight: 600;
    }
    .btn-submit:hover {
        background-color: #2980b9;
    }
    .btn-cancel {
        background-color: #e74c3c;
        color: white;
        border: none;
        padding: 12px 25px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        flex: 1;
        font-weight: 600;
        text-decoration: none;
        text-align: center;
    }
    .btn-cancel:hover {
        background-color: #c0392b;
    }
    .password-strength {
        margin-top: 5px;
        font-size: 14px;
        color: #7f8c8d;
    }
</style>
</head>
<body>
    <div class="cont">
        <div class="password-container">
        <div class="password-header">
            <h2>Change Your Password</h2>
            <p>Please enter your current and new password</p>
        </div>
        
        <form id="form1" name="form1" method="post" action="" class="password-form">
            <div class="form-group">
                <label for="txt_old">Current Password</label>
                <input type="password" name="txt_old" id="txt_old" required placeholder="Enter your current password" />
            </div>
            
            <div class="form-group">
                <label for="txt_new">New Password</label>
                <input type="password" name="txt_new" id="txt_new" required placeholder="Enter your new password" />
                <div class="password-strength">Use 8 or more characters with a mix of letters, numbers & symbols</div>
            </div>
            
            <div class="form-group">
                <label for="txt_re">Confirm New Password</label>
                <input type="password" name="txt_re" id="txt_re" required placeholder="Re-enter your new password" />
            </div>
            
            <div class="button-group">
                <input type="submit" name="btn_change" id="btn_change" value="Change Password" class="btn-submit" />
                <a href="javascript:history.back()" class="btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
    </div>
</body>
</html><?php
include('Foot.php')
?>
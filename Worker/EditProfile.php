<?php
include("../Assets/Connection/Connection.php");
session_start();
include('Head.php');

$select = "SELECT * FROM tbl_worker WHERE worker_id='".$_SESSION['wid']."'";
$res=$Con->query($select);
$data=$res->fetch_assoc();

if(isset($_POST['btn_update']))
{
    $name=$_POST['txt_name'];
    $email=$_POST['txt_email'];
    $contact=$_POST['txt_contact'];
    $address=$_POST['txt_add'];
    
    $upqry="update tbl_worker set worker_name='".$name."',worker_email='".$email."',worker_contact='".$contact."',worker_address='".$address."' where worker_id='".$_SESSION['wid']."'";
    if($Con->query($upqry))
    {
        ?>
        <script>
        alert("Profile Updated Successfully");
        window.location="MyProfile.php";
        </script>
        <?php
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<title>Edit Profile</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background: #f4f7fb;
        margin: 0;
        padding: 0;
    }
    .form-container {
        width: 420px;
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
    .form-group {
        margin-bottom: 15px;
    }
    .form-group label {
        display: block;
        font-size: 14px;
        color: #555;
        margin-bottom: 6px;
    }
    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 14px;
        outline: none;
        transition: 0.3s;
    }
    .form-group input:focus,
    .form-group textarea:focus {
        border-color: #4a90e2;
        box-shadow: 0 0 5px rgba(74,144,226,0.3);
    }
    .form-actions {
        text-align: center;
        margin-top: 20px;
    }
    .form-actions input {
        padding: 10px 20px;
        border: none;
        border-radius: 6px;
        background: #4a90e2;
        color: #fff;
        font-size: 14px;
        cursor: pointer;
        transition: background 0.3s;
    }
    .form-actions input:hover {
        background: #357abd;
    }
</style>
</head>

<body>
    <div class="form-container">
        <h2>Edit Profile</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="txt_name">Name</label>
                <input type="text" name="txt_name" id="txt_name" value="<?php echo $data['worker_name']; ?>" required />
            </div>
            <div class="form-group">
                <label for="txt_email">Email</label>
                <input type="email" name="txt_email" id="txt_email" value="<?php echo $data['worker_email']; ?>" required />
            </div>
            <div class="form-group">
                <label for="txt_contact">Contact</label>
                <input type="text" name="txt_contact" id="txt_contact" value="<?php echo $data['worker_contact']; ?>" required />
            </div>
            <div class="form-group">
                <label for="txt_add">Address</label>
                <textarea name="txt_add" id="txt_add" rows="3" required><?php echo $data['worker_address']; ?></textarea>
            </div>
            <div class="form-actions">
                <input type="submit" name="btn_update" id="btn_update" value="Update Profile" />
            </div>
        </form>
    </div>
</body>
</html>
<?php
include('Foot.php');
?>

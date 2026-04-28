<?php
include("../Assets/Connection/Connection.php");
session_start();
include('Head.php');


$select = "SELECT * FROM tbl_user WHERE user_id='".$_SESSION['uid']."'";
$res = $Con->query($select);
$data = $res->fetch_assoc();

if(isset($_POST['btn_update'])) {
    $name = $_POST['txt_name'];
    $email = $_POST['txt_email'];
    $contact = $_POST['txt_contact'];
    $address = $_POST['txt_add'];
    
   echo $upqry = "UPDATE tbl_user SET user_name='".$name."', user_email='".$email."', user_contact='".$contact."', user_address='".$address."' WHERE user_id='".$_SESSION['uid']."'";
    
    if($Con->query($upqry)) {
        echo "<script>alert('Profile updated successfully!'); window.location='myProfile.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Profile</title>
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
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .profile-container {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        padding: 30px;
        width: 100%;
        max-width: 600px;
    }
    
    .profile-header {
        text-align: center;
        margin-bottom: 30px;
    }
    
    .profile-header h2 {
        color: #2c3e50;
        margin-bottom: 10px;
    }
    
    .profile-form {
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
    
    .form-group input, 
    .form-group textarea {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
        transition: all 0.3s;
    }
    
    .form-group textarea {
        min-height: 100px;
        resize: vertical;
    }
    
    .form-group input:focus, 
    .form-group textarea:focus {
        border-color: #3498db;
        outline: none;
        box-shadow: 0 0 0 3px rgba(52,152,219,0.2);
    }
    
    .submit-btn {
        background-color: #3498db;
        color: white;
        border: none;
        padding: 12px 25px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        width: 100%;
        font-weight: 600;
        margin-top: 10px;
    }
    
    .submit-btn:hover {
        background-color: #2980b9;
    }
</style>
</head>

<body>
    <div class="cont">
        <div class="profile-container">
        <div class="profile-header">
            <h2>Edit Your Profile</h2>
            <p>Update your personal information below</p>
        </div>
        
        <form id="form1" name="form1" method="post" action="" class="profile-form">
            <div class="form-group">
                <label for="txt_name">Full Name</label>
                <input type="text" name="txt_name" id="txt_name" value="<?php echo htmlspecialchars($data['user_name']); ?>" required />
            </div>
            
            <div class="form-group">
                <label for="txt_email">Email Address</label>
                <input type="email" name="txt_email" id="txt_email" value="<?php echo htmlspecialchars($data['user_email']); ?>" required />
            </div>
            
            <div class="form-group">
                <label for="txt_contact">Contact Number</label>
                <input type="tel" name="txt_contact" id="txt_contact" value="<?php echo htmlspecialchars($data['user_contact']); ?>" required />
            </div>
            
            <div class="form-group">
                <label for="txt_add">Address</label>
                <textarea name="txt_add" id="txt_add" required><?php echo htmlspecialchars($data['user_address']); ?></textarea>
            </div>
            
            <input type="submit" name="btn_update" id="btn_update" value="UPDATE PROFILE" class="submit-btn" />
        </form>
    </div>
    </div>
</body>
</html>
<?php
include('Foot.php')
?>
<?php
include("../Assets/Connection/Connection.php");
session_start();
include('Head.php');

$select="select * from tbl_worker u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where worker_id='".$_SESSION['wid']."'";
$res=$Con->query($select);
$data=$res->fetch_assoc();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<title>MyProfile</title>

<style>

    .profile-container {
        width: 500px;
        margin: 50px auto;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        overflow: hidden;
    }
    .profile-header {
        background: #4a90e2;
        color: #fff;
        text-align: center;
        padding: 15px;
        font-size: 20px;
        font-weight: bold;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    td {
        padding: 12px 15px;
        border-bottom: 1px solid #eee;
        font-size: 15px;
    }
    td:first-child {
        font-weight: bold;
        color: #333;
        background: #fafafa;
        width: 40%;
    }
    tr:last-child td {
        border-bottom: none;
    }
    .profile-actions {
        text-align: center;
        padding: 15px;
        background: #fafafa;
    }
    .profile-actions a {
        text-decoration: none;
        padding: 8px 15px;
        border-radius: 5px;
        margin: 0 5px;
        background: #4a90e2;
        color: #fff;
        transition: background 0.3s;
    }
    .profile-actions a:hover {
        background: #357abd;
    }
</style>
</head>

<body>
    <div class="profile-container">
        <div class="profile-header">My Profile</div>
        <table>
          <tr>
            <td>Name</td>
            <td><?php echo $data['worker_name'] ?></td>
          </tr>
          <tr>
            <td>Email</td>
            <td><?php echo $data['worker_email'] ?></td>
          </tr>
          <tr>
            <td>Contact</td>
            <td><?php echo $data['worker_contact'] ?></td>
          </tr>
          <tr>
            <td>Address</td>
            <td><?php echo $data['worker_address'] ?></td>
          </tr>
          <tr>
            <td>District</td>
            <td><?php echo $data['district_name'] ?></td>
          </tr>
          <tr>
            <td>Place</td>
            <td><?php echo $data['place_name'] ?></td>
          </tr>
        </table>
        <div class="profile-actions">
            <a href="EditProfile.php">Edit Profile</a>
            <a href="ChangePassword.php">Change Password</a>
        </div>
    </div>
</body>
</html>
<?php
include('Foot.php');
?>
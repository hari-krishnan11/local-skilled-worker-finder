<?php
include("../Assets/Connection/Connection.php");

$dname = "";
$did = "";

if (isset($_POST['btn_Submit'])) {
    $name = $_POST['txt_Name'];
    $email = $_POST['txt_Email'];
    $password = $_POST['Password'];
    $did = $_POST['txt_id'] ?? "";

    if ($did == "") {
        $InsQry = "INSERT INTO tbl_adminreg(admin_name, admin_email, admin_password)
                   VALUES ('".$name."', '".$email."', '".$password."')";
        if ($Con->query($InsQry)) {
            echo "<script>alert('Admin Added Successfully'); window.location='AdminReg.php';</script>";
        }
    } else {
        $upQry = "UPDATE tbl_adminreg SET 
                  admin_name='".$name."', 
                  admin_email='".$email."', 
                  admin_password='".$password."'
                  WHERE admin_id='".$did."'";
        if ($Con->query($upQry)) {
            echo "<script>alert('Admin Updated Successfully'); window.location='AdminReg.php';</script>";
        }
    }
}

if (isset($_GET['delId'])) {
    $delQry = "DELETE FROM tbl_adminreg WHERE admin_id='".$_GET['delId']."'";
    if ($Con->query($delQry)) {
        echo "<script>alert('Deleted Successfully'); window.location='AdminReg.php';</script>";
    }
}

if (isset($_GET['editId'])) {
    $selQry = "SELECT * FROM tbl_adminreg WHERE admin_id='".$_GET['editId']."'";
    $res = $Con->query($selQry);
    $editdata = $res->fetch_assoc();
    $dname = $editdata['admin_name'];
    $did = $editdata['admin_id'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Registration</title>
<style>
    body {
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        background: #f5f7fa;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: 40px auto;
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    }

    h2 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    label {
        font-weight: bold;
        color: #444;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 14px;
    }

    input[type="submit"] {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 16px;
        transition: 0.3s;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 25px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    }

    th {
        background-color: #007bff;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    a {
        text-decoration: none;
        color: #e63946;
        font-weight: bold;
    }

    a:hover {
        text-decoration: underline;
    }
</style>
</head>
<body>

<div class="container">
    <h2>Admin Registration</h2>

    <form method="post" action="">
        <input type="hidden" name="txt_id" value="<?php echo $did; ?>">

        <div>
            <label for="txt_Name">Name</label>
            <input type="text" name="txt_Name" id="txt_Name" required value="<?php echo $dname; ?>">
        </div>

        <div>
            <label for="txt_Email">Email</label>
            <input type="email" name="txt_Email" id="txt_Email" required>
        </div>

        <div>
            <label for="Password">Password</label>
            <input type="text" name="Password" id="Password" required>
        </div>

        <input type="submit" name="btn_Submit" id="btn_Submit" value="Submit">
    </form>

    <table>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php
        $i = 0;
        $selQry = "SELECT * FROM tbl_adminreg";
        $row = $Con->query($selQry);
        while ($data = $row->fetch_assoc()) {
            $i++;
            echo "
            <tr>
                <td>{$i}</td>
                <td>{$data['admin_name']}</td>
                <td>{$data['admin_email']}</td>
                <td>
                    <a href='AdminReg.php?editId={$data['admin_id']}'>Edit</a> |
                    <a href='AdminReg.php?delId={$data['admin_id']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                </td>
            </tr>";
        }
        ?>
    </table>
</div>

</body>
</html>

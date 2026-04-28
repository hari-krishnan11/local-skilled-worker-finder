<?php
include("../Assets/Connection/Connection.php");
include('Head.php');

$districtid = "";

if (isset($_POST['btn_Submit'])) {
    $name = $_POST['txt_name'];
    $email = $_POST['txt_email'];
    $contact = $_POST['txt_contact'];
    $address = $_POST['txt_address'];
    $password = $_POST['txt_password'];
    $qualification = $_POST['txt_qualification'];
    $place = $_POST['sel_Pal'];
    $category = $_POST['sele_cate'];

    // ✅ Check if email already exists in tbl_worker
    $checkQry = "SELECT * FROM tbl_worker WHERE worker_email='$email'";
    $checkRes = $Con->query($checkQry);

    if ($checkRes->num_rows > 0) {
        echo "<script>alert('Email already exists! Please use another email.');</script>";
    } else {

        // --- Upload Photo ---
        $photo = $_FILES['file_photo']['name'];
        $path = $_FILES['file_photo']['tmp_name'];
        move_uploaded_file($path, "../Assets/Worker/Photo/" . $photo);

        // --- Upload Proof ---
        $proof = $_FILES['file_proof']['name'];
        $path2 = $_FILES['file_proof']['tmp_name'];
        move_uploaded_file($path2, "../Assets/Worker/Proof/" . $proof);

        // --- Insert Worker ---
        $InsQry = "INSERT INTO tbl_worker(worker_name, worker_email, worker_contact, worker_address, worker_password, place_id, category_id, worker_photo, worker_proof, worker_qualification)
                   VALUES('$name','$email','$contact','$address','$password','$place','$category','$photo','$proof','$qualification')";

        if ($Con->query($InsQry)) {
            echo "<script>alert('Registration Successful!'); window.location='../Guest/Login.php';</script>";
        } else {
            echo "<script>alert('Error occurred. Please try again.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Worker Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('../Assets/Images/bg-worker.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
        }
        .form-container {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
            max-width: 500px;
            margin: 7px auto;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-container">
        <h3 class="text-center mb-4">Worker Registration</h3>
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="txt_name" class="form-control" required pattern="^[A-Z]+[a-zA-Z ]*$" title="Name allows only alphabets, spaces and must start with a capital letter">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="txt_email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Contact</label>
                <input type="text" name="txt_contact" class="form-control" required pattern="[7-9]{1}[0-9]{9}" title="Phone number must start with 7-9 and have 10 digits">
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" name="txt_address" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Qualification</label>
                <input type="text" name="txt_qualification" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Photo</label>
                <input type="file" name="file_photo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Proof</label>
                <input type="file" name="file_proof" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">District</label>
                <select name="sel_Dis" id="sel_Dis" class="form-select" onchange="getPlace(this.value)" required>
                    <option value="">SELECT</option>
                    <?php
                    $selQry = "SELECT * FROM tbl_district";
                    $row = $Con->query($selQry);
                    while ($data = $row->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $data['district_id']; ?>" <?php if ($districtid == $data['district_id']) echo "selected"; ?>>
                            <?php echo $data['district_name']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Place</label>
                <select name="sel_Pal" id="sel_Pal" class="form-select" required>
                    <option value="">SELECT</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Category</label>
                <select name="sele_cate" class="form-select" required>
                    <option value="">SELECT</option>
                    <?php
                    $selQry = "SELECT * FROM tbl_category";
                    $row = $Con->query($selQry);
                    while ($data = $row->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $data['category_id']; ?>"><?php echo $data['category_name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="txt_password" class="form-control" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 characters">
            </div>
            <div class="d-grid">
                <button type="submit" name="btn_Submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script>
function getPlace(did) {
    $.ajax({
        url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
        success: function (result) {
            $("#sel_Pal").html(result);
        }
    });
}
</script>

</body>
</html>
<?php
include('Foot.php');
?>

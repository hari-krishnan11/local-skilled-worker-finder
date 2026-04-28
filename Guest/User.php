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
    $place = $_POST['sel_Pal'];

    // ✅ Check if email already exists
    $checkQry = "SELECT * FROM tbl_user WHERE user_email='$email'";
    $checkRes = $Con->query($checkQry);

    if ($checkRes->num_rows > 0) {
        echo "<script>alert('Email already exists! Please use another email.');</script>";
    } else {
        // Insert if email not found
        $InsQry = "INSERT INTO tbl_user(user_name,user_email,user_contact,user_address,user_password,place_id)
                   VALUES('$name','$email','$contact','$address','$password','$place')";
        if ($Con->query($InsQry)) {
            echo "<script>alert('Registration successful!'); window.location='../Guest/Login.php';</script>";
        } else {
            echo "<script>alert('Error occurred. Please try again.');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>User Registration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #f5f6fa;
      min-height: 100vh;
    }
    .form-container {
      background-color: #fff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.15);
      max-width: 500px;
      margin: 50px auto;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="form-container">
      <h3 class="text-center mb-4">User Registration</h3>
      <form method="post">
        <div class="mb-3">
          <label for="txt_name" class="form-label">Name</label>
          <input type="text" class="form-control" id="txt_name" name="txt_name" required pattern="^[A-Z]+[a-zA-Z ]*$" title="Name Allows Only Alphabets, Spaces and First Letter Must Be Capital Letter">
        </div>
        <div class="mb-3">
          <label for="txt_email" class="form-label">Email</label>
          <input type="email" class="form-control" id="txt_email" name="txt_email" required>
        </div>
        <div class="mb-3">
          <label for="txt_contact" class="form-label">Contact</label>
          <input type="text" class="form-control" id="txt_contact" name="txt_contact" required pattern="[7-9]{1}[0-9]{9}"  title="Phone number must start with 7-9 followed by 9 digits">
        </div>
        <div class="mb-3">
          <label for="txt_address" class="form-label">Address</label>
          <input type="text" class="form-control" id="txt_address" name="txt_address" required>
        </div>
        <div class="mb-3">
          <label for="sel_Dis" class="form-label">District</label>
          <select class="form-select" name="sel_Dis" id="sel_Dis" onChange="getPlace(this.value)">
            <option value="">-- Select District --</option>
            <?php
            $selQry = "SELECT * FROM tbl_district";
            $row = $Con->query($selQry);
            while ($data = $row->fetch_assoc()) {
            ?>
              <option <?php if ($districtid == $data['district_id']) echo "selected"; ?>
                value="<?php echo $data['district_id']; ?>"><?php echo $data['district_name']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="mb-3">
          <label for="sel_Pal" class="form-label">Place</label>
          <select class="form-select" name="sel_Pal" id="sel_Pal">
            <option value="">-- Select Place --</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="txt_password" class="form-label">Password</label>
          <input type="password" class="form-control" id="txt_password" name="txt_password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 characters">
        </div>
        <div class="text-center">
          <button type="submit" name="btn_Submit" id="btn_Submit" class="btn btn-primary w-100">Register</button>
        </div>
      </form>
    </div>
  </div>

  <!-- jQuery for place loading -->
  <script src="../Assets/JQ/jQuery.js"></script>
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

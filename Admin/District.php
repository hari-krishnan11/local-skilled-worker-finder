<?php
ob_start();
include("Header.php");

include("../Assets/Connection/Connection.php");

$dname = "";
$did = "";

if (isset($_POST['btn_submit'])) {
    $district = $_POST['txt_district'];
    $did = $_POST['txt_id'];

    if ($did == "") {
        $InsQry = "insert into tbl_district(district_name) values('" . $district . "')";
        if ($Con->query($InsQry)) { ?>
<script>
  alert(" Location Inserted");
  window.location = "District.php";
</script>
<?php
        }
    } else {
        $upQry = "update tbl_district set district_name='" . $district . "' where district_id='" . $did . "'";
        if ($Con->query($upQry)) { ?>
<script>
  alert("Location Updated");
  window.location = "District.php";
</script>
<?php
        }
    }
}

if (isset($_GET['delId'])) {
    $delQry = "delete from tbl_district where district_id='" . $_GET['delId'] . "'";
    if ($Con->query($delQry)) { ?>
<script>
  alert(" Location Deleted");
  window.location = "District.php";
</script>
<?php
    }
}

if (isset($_GET['editId'])) {
    $selQry = "select * from tbl_district where district_id='" . $_GET['editId'] . "'";
    $res = $Con->query($selQry); $editdata = $res->fetch_assoc(); $dname =
$editdata['district_name']; $did = $editdata['district_id']; } ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>District</title>
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
      <h2 class="mb-4 text-center">Manage Districts</h2>

      <form method="post" action="" class="mb-5">
        <div class="table-responsive">
          <table class="table table-bordered align-middle">
            <tbody>
              <tr>
                <th class="w-25">
                  <label for="txt_district" class="form-label mb-0"
                    >District</label
                  >
                </th>
                <td>
                  <input
                    type="text"
                    name="txt_district"
                    id="txt_district"
                    class="form-control"
                    value="<?php echo $dname ?>"required
                  />
                  <input
                    type="hidden"
                    name="txt_id"
                    id="txt_id"
                    value="<?php echo $did ?>"
                  />
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="text-center">
          <button
            type="submit"
            name="btn_submit"
            id="btn_submit"
            class="btn btn-primary"
          >
            Submit
          </button>
        </div>
      </form>

      <table class="table table-bordered table-striped">
        <thead class="table-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">District</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
        $i = 0;
        $selQry = "select * from tbl_district";
        $row = $Con->query($selQry); while ($data = $row->fetch_assoc()) { $i++;
          ?>
          <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $data['district_name'] ?></td>
            <td>
              <a
                href="District.php?editId=<?php echo $data['district_id'] ?>"
                class="btn btn-sm btn-warning"
                >Edit</a
              >
              <a
                href="District.php?delId=<?php echo $data['district_id'] ?>"
                class="btn btn-sm btn-danger"
                onclick="return confirm('Are you sure you want to delete this district?')"
                >Delete</a
              >
            </td>
          </tr>
          <?php
        }
        ?>
        </tbody>
      </table>
    </div>
  </body>
</html>

<?php
ob_end_flush();
include("Footer.php");
?>

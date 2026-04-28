<?php
include("../Assets/Connection/Connection.php");
session_start();
include('Head.php');

// --- Accept request ---
if(isset($_GET['aid']))
{
    $update="update tbl_request set request_status=1 where request_id='".$_GET['aid']."'";
    if($Con->query($update))
    {
        echo "<script>alert('Request Accepted!'); window.location='ViewBooking.php';</script>";
    }
}

// --- Reject request ---
if(isset($_GET['rid']))
{
    $update="update tbl_request set request_status=2 where request_id='".$_GET['rid']."'";
    if($Con->query($update))
    {
        echo "<script>alert('Request Rejected!'); window.location='ViewBooking.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Booking Requests</title>
<style>
/* ✅ Your same CSS kept exactly as it was */
* {
    box-sizing: border-box;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
body {
    background-color: #f5f7fa;
    margin: 0;
    padding: 20px;
    color: #333;
}
.container {
    max-width: 1200px;
    margin: 0 auto;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
    padding: 30px;
    overflow-x: auto;
}
h1 {
    text-align: center;
    color: #2c3e50;
    margin-bottom: 30px;
}
.booking-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}
.booking-table th, .booking-table td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #e0e0e0;
}
.booking-table th {
    background-color: #3498db;
    color: white;
    font-weight: 600;
    position: sticky;
    top: 0;
}
.booking-table tr:nth-child(even) {
    background-color: #f9f9f9;
}
.booking-table tr:hover {
    background-color: #f1f1f1;
}
.status-pending {
    color: #f39c12;
    font-weight: 600;
}
.status-accepted {
    color: #27ae60;
    font-weight: 600;
}
.status-rejected {
    color: #e74c3c;
    font-weight: 600;
}
.action-btn {
    display: inline-block;
    padding: 8px 15px;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-weight: 500;
    transition: all 0.3s;
    margin-right: 5px;
}
.accept-btn {
    background-color: #27ae60;
}
.accept-btn:hover {
    background-color: #219653;
}
.reject-btn {
    background-color: #e74c3c;
}
.reject-btn:hover {
    background-color: #c0392b;
}
.amount-btn {
    background-color: #3498db;
}
.amount-btn:hover {
    background-color: #2980b9;
}
.rejected-text {
    color: #e74c3c;
    font-style: italic;
}
@media (max-width: 768px) {
    .container {
        padding: 15px;
    }
    .booking-table {
        font-size: 14px;
    }
    .booking-table th, .booking-table td {
        padding: 10px 5px;
    }
    .action-btn {
        padding: 6px 10px;
        font-size: 12px;
        margin-bottom: 5px;
        display: block;
    }
}
</style>
</head>

<body>
<div class="container">
    <h1>WORKS</h1>
    <form id="form1" name="form1" method="post" action="">
        <table class="booking-table">
            <thead>
                <tr>
                    <th>SL No</th>
                    <th>User</th>
                    <th>Place & District</th> <!-- ✅ Added new combined column -->
                    <th>Content</th>
                    <th>Request Date</th>
                    <th>For Date</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                // ✅ Join with place and district to get full location
                $selQry = "SELECT * FROM tbl_request r
                    INNER JOIN tbl_user u ON u.user_id = r.user_id
                    INNER JOIN tbl_place p ON u.place_id = p.place_id
                    INNER JOIN tbl_district d ON p.district_id = d.district_id
                    WHERE r.worker_id='".$_SESSION['wid']."'";

                $row = $Con->query($selQry);
                while($data = $row->fetch_assoc()) {
                    $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo htmlspecialchars($data['user_name']); ?></td>
                    <td><?php echo htmlspecialchars($data['place_name']).", ".htmlspecialchars($data['district_name']); ?></td> <!-- ✅ Show Place + District -->
                    <td><?php echo htmlspecialchars($data['request_content']); ?></td>
                    <td><?php echo htmlspecialchars($data['request_date']); ?></td>
                    <td><?php echo htmlspecialchars($data['request_fordate']); ?></td>
                    <td><?php echo ($data['request_amount'] == "") ? "Nil" : htmlspecialchars($data['request_amount']); ?></td>
                    
                    <td>
                        <?php 
                        if($data['request_status']==0) {
                            echo '<a href="ViewBooking.php?aid='.$data['request_id'].'" class="action-btn accept-btn">Accept</a>';
                            echo '<a href="ViewBooking.php?rid='.$data['request_id'].'" class="action-btn reject-btn">Reject</a>';
                        }
                        elseif($data['request_status']==1) {
                            echo '<a href="AddAmount.php?rid='.$data['request_id'].'" class="action-btn amount-btn">Add Amount</a>';
                        }
                        elseif($data['request_status']==2) {
                            echo '<span class="status-rejected">Rejected</span>';
                        }
                        elseif($data['request_status']==3) {
                            echo '<span class="status-pending">Payment Pending</span>';
                        }
                        elseif($data['request_status']==4) {
                            echo '<span class="status-accepted">Payment Completed</span>';
                        }
                        ?>      
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </form>
</div>
</body>
</html>
<?php
include('Foot.php');
?>

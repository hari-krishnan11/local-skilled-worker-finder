<!-- <?php
// include("../Assets/Connection/Connection.php");
// session_start();

// if(isset($_POST['btn_submit'])){
//     $rating = $_POST['rating'];
//     $comment = $_POST['comment'];
//     $rid = $_GET['rid'];

//     // Get worker from request
//     $sel = "SELECT worker_id FROM tbl_request WHERE request_id='$rid'";
//     $res = $Con->query($sel);
//     $row = $res->fetch_assoc();
//     $wid = $row['worker_id'];

//     // Insert into feedback
//     $insert = "INSERT INTO tbl_feedback(request_id, user_id, worker_id, feedback_rating, feedback_content, feedback_date) 
//                VALUES('$rid','".$_SESSION['uid']."','$wid','$rating','$comment',UNIX_TIMESTAMP())";
//     if($Con->query($insert)){
//         echo "<script>alert('Feedback submitted!'); window.location='MyBooking.php';</script>";
//     } else {
//         echo "<script>alert('Error: ".$Con->error."');</script>";
//     }
// }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Feedback</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container my-5">
    <div class="card p-4 shadow">
        <h3 class="mb-4">Give Feedback</h3>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Rating</label>
                <select name="rating" class="form-select" required>
                    <option value="">Select</option>
                    <option value="1">⭐</option>
                    <option value="2">⭐⭐</option>
                    <option value="3">⭐⭐⭐</option>
                    <option value="4">⭐⭐⭐⭐</option>
                    <option value="5">⭐⭐⭐⭐⭐</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Comment</label>
                <textarea name="comment" class="form-control" rows="3" required></textarea>
            </div>
            <button type="submit" name="btn_submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
</body>
</html> -->

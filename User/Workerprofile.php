<?php
include("../Assets/Connection/Connection.php");
session_start();
include('Head.php');

if (!isset($_GET['wid'])) {
    echo "<script>alert('No worker selected'); window.location='WorkerList.php';</script>";
    exit();
}

$worker_id = $_GET['wid'];

$selQry = "SELECT * FROM tbl_worker u
    INNER JOIN tbl_place p ON u.place_id = p.place_id
    INNER JOIN tbl_district d ON p.district_id = d.district_id
    INNER JOIN tbl_category c ON u.category_id = c.category_id
    WHERE worker_id = '$worker_id'";

$result = $Con->query($selQry);

if (!$result || $result->num_rows == 0) {
    echo "<script>alert('Worker not found'); window.location='WorkerList.php';</script>";
    exit();
}

$data = $result->fetch_assoc();

// ✅ Get rating details
$ratingQry = "SELECT AVG(rating_value) as avg_rating, COUNT(rating_id) as total_reviews 
              FROM tbl_rating WHERE worker_id='$worker_id'";
$ratingRes = $Con->query($ratingQry);
$ratingData = $ratingRes->fetch_assoc();
$avgRating = round($ratingData['avg_rating'],1);
$totalReviews = $ratingData['total_reviews'];

// ✅ Fetch all reviews
$reviewQry = "SELECT r.*, u.user_name 
              FROM tbl_rating r 
              INNER JOIN tbl_user u ON r.user_id=u.user_id 
              WHERE r.worker_id='$worker_id' 
              ORDER BY r.rating_date DESC";
$reviewRes = $Con->query($reviewQry);
?>

<style>
.rounded-circle {
    border: 4px solid #f1f1f1;
}
.card-body h6 {
    font-weight: bold;
    color: #333;
}
.star {
    color: #ffc107;
    font-size: 16px;
}
.star-muted {
    color: #e4e5e9;
    font-size: 16px;
}
</style>

<!-- Worker Profile Start -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg">
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <img src="../Assets/Worker/Photo/<?php echo htmlspecialchars($data['worker_photo']); ?>" 
                             class="rounded-circle shadow" 
                             width="150" height="150"
                             style="object-fit: cover;" 
                             alt="Worker Photo">
                        <h3 class="mt-3"><?php echo htmlspecialchars($data['worker_name']); ?></h3>
                        <p class="text-muted"><?php echo htmlspecialchars($data['category_name']); ?></p>
                        <span class="badge bg-primary"><?php echo htmlspecialchars($data['district_name']); ?> District</span>
                        <span class="badge bg-secondary"><?php echo htmlspecialchars($data['place_name']); ?></span>
                    </div>

                    <!-- ✅ Rating Summary -->
                    <div class="text-center mb-3">
                        <h5>Rating & Reviews</h5>
                        <p>
                            <?php 
                            for($i=1;$i<=5;$i++){
                                echo ($i <= floor($avgRating)) 
                                    ? '<i class="fa fa-star star"></i>' 
                                    : '<i class="fa fa-star star-muted"></i>';
                            }
                            ?>
                            <strong><?php echo $avgRating; ?>/5</strong>
                        </p>
                        <p class="text-muted">(<?php echo $totalReviews; ?> reviews)</p>
                    </div>

                    <hr>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6><strong>Email:</strong></h6>
                            <p><?php echo htmlspecialchars($data['worker_email']); ?></p>
                        </div>
                        <div class="col-md-6">
                            <h6><strong>Contact:</strong></h6>
                            <p><?php echo htmlspecialchars($data['worker_contact']); ?></p>
                        </div>
                        <div class="col-md-12">
                            <h6><strong>Place:</strong></h6>
                            <p><?php echo htmlspecialchars($data['place_name']); ?></p>
                        </div>
                    </div>

                    <hr>

                    <div class="text-center">
                        <a href="BookWorker.php?wid=<?php echo $data['worker_id']; ?>" class="btn btn-success me-2">
                            Book This Worker
                        </a>
                        <a href="ViewWorker.php" class="btn btn-outline-secondary">
                            Back to Worker List
                        </a>
                    </div>
                </div>
            </div>

            <!-- ✅ User Reviews -->
            <div class="card shadow-lg mt-4">
                <div class="card-body">
                    <h5 class="mb-3">User Reviews</h5>
                    <?php 
                    if($reviewRes->num_rows > 0){
                        while($rev = $reviewRes->fetch_assoc()){ ?>
                            <div class="border p-3 mb-3 rounded">
                                <h6><?php echo htmlspecialchars($rev['user_name']); ?></h6>
                                <p class="mb-1">
                                    <?php for($i=1;$i<=5;$i++){ 
                                        echo ($i <= $rev['rating_value']) 
                                            ? '<i class="fa fa-star star"></i>' 
                                            : '<i class="fa fa-star star-muted"></i>';
                                    } ?>
                                </p>
                                <p><?php echo htmlspecialchars($rev['rating_comment']); ?></p>
                            </div>
                    <?php } 
                    } else {
                        echo "<p class='text-muted'>No reviews yet for this worker.</p>";
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Worker Profile End -->

<?php include('Foot.php'); ?>

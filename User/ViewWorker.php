<?php
include("../Assets/Connection/Connection.php");
session_start();
include('Head.php');

$i = 0;
$selQry = "SELECT u.*, p.place_name, d.district_id, d.district_name, c.category_name, 
                  (SELECT AVG(r.rating_value) FROM tbl_rating r WHERE r.worker_id = u.worker_id) AS avg_rating,
                  (SELECT COUNT(r.rating_id) FROM tbl_rating r WHERE r.worker_id = u.worker_id) AS total_reviews
           FROM tbl_worker u 
           INNER JOIN tbl_place p ON u.place_id = p.place_id 
           INNER JOIN tbl_district d ON p.district_id = d.district_id 
           INNER JOIN tbl_category c ON u.category_id = c.category_id 
           WHERE worker_status=1";
$row = $Con->query($selQry);
?>

<style>
/* ---- Card Styling ---- */
.card-img-top {
    border-bottom: 1px solid #dee2e6;
}
.card {
    transition: transform 0.3s ease;
}
.card:hover {
    transform: translateY(-6px);
}
.star {
    color: #ffc107;
    font-size: 14px;
}
.star-muted {
    color: #e4e5e9;
    font-size: 14px;
}
.filter-box {
    background: #fff;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    border-radius: 1rem;
    padding: 1.5rem;
}
</style>

<!-- 🔍 Filter Section Start -->
<div class="container my-5">
    <div class="filter-box">
        <h4 class="text-center text-primary fw-bold mb-3">Filter Workers by District</h4>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <label class="form-label fw-bold">District</label>
                <select class="form-select" id="sel_Dist" onchange="filterByDistrict(this.value)">
                    <option value="">All Districts</option>
                    <?php
                    $selDist = "SELECT * FROM tbl_district ORDER BY district_name ASC";
                    $distRow = $Con->query($selDist);
                    while ($distData = $distRow->fetch_assoc()) {
                        echo "<option value='{$distData['district_id']}'>{$distData['district_name']}</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
</div>
<!-- 🔍 Filter Section End -->

<!-- 👷 Workers Cards Start -->
<div class="container my-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="p-4 bg-white shadow rounded-4">
        <h2 class="mb-4 text-center text-primary fw-bold">Available Workers</h2>
        <div class="row g-4" id="workerContainer">
            <?php
            while ($data = $row->fetch_assoc()) {
                $avg = round($data['avg_rating'],1);
                $reviews = $data['total_reviews'];
            ?>
                <div class="col-lg-4 col-md-6 worker-card" 
                     data-district="<?php echo $data['district_id']; ?>"
                     data-place="<?php echo $data['place_id']; ?>">
                    <div class="card border-0 shadow h-100 hover-shadow">
                        <img src="../Assets/Worker/Photo/<?php echo htmlspecialchars($data['worker_photo']); ?>" 
                             class="card-img-top rounded-top" 
                             alt="Worker Photo"
                             style="height: 250px; object-fit: cover;">
                        <div class="card-body bg-light">
                            <h5 class="card-title text-dark mb-1"><?php echo htmlspecialchars($data['worker_name']); ?></h5>
                            <p class="card-text small mb-2">
                                <strong>Category:</strong> 
                                <span class="badge bg-warning text-dark"><?php echo htmlspecialchars($data['category_name']); ?></span>
                            </p>
                            <p class="small mb-1 text-muted">
                                <i class="fa fa-map-marker-alt me-1 text-danger"></i>
                                <?php echo htmlspecialchars($data['place_name'] . ", " . $data['district_name']); ?>
                            </p>
                            <!-- ⭐ Ratings -->
                            <p class="mb-1">
                                <?php 
                                $stars = ($avg > 0) ? $avg : 0;
                                for($i=1; $i<=5; $i++){
                                    echo $i <= floor($stars) 
                                        ? '<i class="fa fa-star star"></i>' 
                                        : '<i class="fa fa-star star-muted"></i>';
                                }
                                ?>
                                <small>(<?php echo $reviews; ?> reviews)</small>
                            </p>
                        </div>
                        <div class="card-footer bg-white text-center border-top-0">
                            <a href="WorkerProfile.php?wid=<?php echo $data['worker_id']; ?>" class="btn btn-primary btn-sm me-2">
                                View Profile
                            </a>
                            <a href="BookWorker.php?wid=<?php echo $data['worker_id']; ?>" class="btn btn-success btn-sm">
                                Request
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- 👷 Workers Cards End -->

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script>
function filterByDistrict(districtId) {
    if (districtId === "") {
        // Show all workers
        $(".worker-card").show();
    } else {
        $(".worker-card").each(function() {
            var cardDistrict = $(this).data("district");
            if (cardDistrict == districtId) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="../Assets/Templates/Main/lib/wow/wow.min.js"></script>
<script src="../Assets/Templates/Main/lib/easing/easing.min.js"></script>
<script src="../Assets/Templates/Main/lib/waypoints/waypoints.min.js"></script>
<script src="../Assets/Templates/Main/lib/counterup/counterup.min.js"></script>
<script src="../Assets/Templates/Main/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="../Assets/Templates/Main/js/main.js"></script>
</body>
</html>
<?php include('Foot.php') ?>

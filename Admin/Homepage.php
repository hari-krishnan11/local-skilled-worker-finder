<?php
include("Header.php");
include("../Assets/Connection/Connection.php");


// ---- OVERVIEW STATS ----
$total_users = $Con->query("SELECT COUNT(*) AS c FROM tbl_user")->fetch_assoc()['c'];
$total_workers = $Con->query("SELECT COUNT(*) AS c FROM tbl_worker")->fetch_assoc()['c'];
$total_categories = $Con->query("SELECT COUNT(*) AS c FROM tbl_category")->fetch_assoc()['c'];
$total_requests = $Con->query("SELECT COUNT(*) AS c FROM tbl_request")->fetch_assoc()['c'];
$total_completed = $Con->query("SELECT COUNT(*) AS c FROM tbl_request WHERE request_status >= 3")->fetch_assoc()['c'];
$total_revenue = $Con->query("SELECT SUM(request_amount) AS total FROM tbl_request WHERE request_status >= 3")->fetch_assoc()['total'] ?? 0;

// ---- SALES CHART ----
$salesQuery = "SELECT request_date, SUM(request_amount) AS total 
               FROM tbl_request 
               WHERE request_status >= 3 AND request_amount != ''
               GROUP BY request_date ORDER BY request_date ASC";
$salesResult = $Con->query($salesQuery);
$sales_labels = [];
$sales_values = [];
while ($r = $salesResult->fetch_assoc()) {
    $sales_labels[] = $r['request_date'];
    $sales_values[] = (float)$r['total'];
}

// ---- CATEGORY DISTRIBUTION ----
$catQuery = "SELECT c.category_name, COUNT(w.worker_id) AS count 
             FROM tbl_worker w 
             INNER JOIN tbl_category c ON w.category_id = c.category_id
             GROUP BY c.category_id";
$catRes = $Con->query($catQuery);
$cat_labels = [];
$cat_values = [];
while ($r = $catRes->fetch_assoc()) {
    $cat_labels[] = $r['category_name'];
    $cat_values[] = $r['count'];
}

// ---- REGISTRATION COUNTS ----
$reg_labels = ['Users', 'Workers'];
$reg_values = [$total_users, $total_workers];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Admin Dashboard | CareCrew</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-light">
<div class="container py-4">
    <h2 class="text-center mb-4">Admin Dashboard</h2>
    
    <!-- Summary Cards -->
    <div class="row g-3 mb-4">
        <?php
        $cards = [
            ["Total Users", $total_users, "bi-people-fill", "primary"],
            ["Total Workers", $total_workers, "bi-person-workspace", "success"],
            ["Categories", $total_categories, "bi-grid", "warning"],
            ["Total Requests", $total_requests, "bi-list-check", "info"],
            ["Completed Works", $total_completed, "bi-check2-circle", "secondary"],
            ["Total Revenue", "₹ " . number_format($total_revenue, 2), "bi-currency-rupee", "danger"]
        ];
        foreach ($cards as $c) {
            echo "
            <div class='col-md-4 col-lg-2'>
                <div class='card text-center shadow-sm border-0'>
                    <div class='card-body'>
                        <h6 class='text-muted'><i class='bi {$c[2]} me-1 text-{$c[3]}'></i>{$c[0]}</h6>
                        <h4 class='fw-bold'>{$c[1]}</h4>
                    </div>
                </div>
            </div>";
        }
        ?>
    </div>

    <!-- Charts -->
    <div class="row g-4">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">Daily Revenue Overview</div>
                <div class="card-body">
                    <canvas id="salesChart" height="100"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">User & Worker Registrations</div>
                <div class="card-body">
                    <canvas id="registrationChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark">Workers by Category</div>
                <div class="card-body">
                    <canvas id="categoryChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.js"></script>
<script>
new Chart(document.getElementById('salesChart'), {
    type: 'line',
    data: {
        labels: <?php echo json_encode($sales_labels); ?>,
        datasets: [{
            label: 'Total Revenue (₹)',
            data: <?php echo json_encode($sales_values); ?>,
            borderColor: '#0d6efd',
            backgroundColor: 'rgba(13,110,253,0.2)',
            fill: true,
            tension: 0.3
        }]
    }
});

new Chart(document.getElementById('registrationChart'), {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($reg_labels); ?>,
        datasets: [{
            label: 'Total Count',
            data: <?php echo json_encode($reg_values); ?>,
            backgroundColor: ['green', '#0dcaf0']
        }]
    },
    options: { scales: { y: { beginAtZero: true } } }
});

new Chart(document.getElementById('categoryChart'), {
    type: 'pie',
    data: {
        labels: <?php echo json_encode($cat_labels); ?>,
        datasets: [{
            data: <?php echo json_encode($cat_values); ?>,
            backgroundColor: [
                '#0d6efd','#6610f2','#6f42c1','#198754','#ffc107','#dc3545',
                '#20c997','#fd7e14','#0dcaf0','#adb5bd'
            ]
        }]
    }
});
</script>
</body>
</html>

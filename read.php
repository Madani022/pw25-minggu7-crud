<?php
include 'config/database.php';

$limit = 5;
$page = isset($_GET['page']) && $_GET['page'] > 0 ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

$sql = "SELECT * FROM crud_101 LIMIT $start, $limit";
$result = $conn->query($sql);

if (!$result) {
    die("Error: " . $conn->error);
}

$count_sql = "SELECT COUNT(*) AS total FROM crud_101";
$count_result = $conn->query($count_sql);
$count_row = $count_result->fetch_assoc();
$total_data = $count_row['total'];
$total_pages = $total_data > 0 ? ceil($total_data / $limit) : 1;
?>

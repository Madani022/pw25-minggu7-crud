<?php
include 'config/database.php';

$sql = "SELECT * FROM crud_101";
$result = $conn->query($sql);

if (!$result) {
    die("Error: " . $conn->error);
}
?>
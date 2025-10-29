<?php
include 'db_connect.php';
$result = $conn->query("SELECT * FROM jobs");
$jobs = [];
while ($row = $result->fetch_assoc()) {
    $jobs[] = $row;
}
echo json_encode($jobs);
?>
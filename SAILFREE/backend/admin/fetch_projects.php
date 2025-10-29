<?php
include 'db_connect.php';

$sql = "SELECT id, title, description, budget, deadline FROM projects";
$result = $conn->query($sql);

$projects = [];
while ($row = $result->fetch_assoc()) {
    $projects[] = $row;
}

echo json_encode($projects);
?>

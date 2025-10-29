<?php
include 'db_connect.php';

$sql = "SELECT id, name, email, phone FROM users";
$result = $conn->query($sql);

$users = [];
while ($row = $result->fetch_assoc()) {
    $users[] = $row;
}

echo json_encode($users);
?>

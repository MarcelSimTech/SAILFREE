<?php
$query = strtolower($_GET['q']);
$result = $db->query("SELECT * FROM projects WHERE LOWER(title) LIKE '%$query%'");
echo json_encode($result->fetch_all(MYSQLI_ASSOC));
?>
<?php
include 'db_connect.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $query = $conn->prepare("DELETE FROM projects WHERE id = ?");
    $query->bind_param("i", $id);

    if ($query->execute()) {
        echo json_encode(["success" => "Project deleted successfully"]);
    } else {
        echo json_encode(["error" => "Error deleting project"]);
    }
}
$conn->close();
?>

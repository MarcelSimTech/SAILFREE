<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db_connect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //if (!isset($_SESSION['user_id'])) {
      //  echo json_encode(["success" => false, "message" => "User not logged in"]);
        //exit();
    //}

    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $skills = $_POST['skills_required'];
    $budget = $_POST['budget'];
    $deadline = $_POST['deadline'];

    $sql = "INSERT INTO projects (user_id, title, description, skills_required, budget, deadline) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issss", $user_id, $title, $skils_required, $description, $budget, $deadline);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Project Submitted successfully"]);
    } else {
        echo json_encode(["success" => false, "message" => "Error: " . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["success" => false, "message" => "Invalid request"]);
}
?>

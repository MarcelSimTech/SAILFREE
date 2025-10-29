<?php
include 'db_connect.php'; // Ensure database connection
session_start();

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["status" => "error", "message" => "You must be logged in to submit a project."]);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $skills_required = $_POST['skills'];
    $budget = $_POST['budget'];
    $deadline = $_POST['deadline'];
    $user_id = $_SESSION['user_id'];

    // Insert into database
    $sql = "INSERT INTO projects (title, description, skills_required, budget, deadline, user_id) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $title, $description, $skills_required, $budget, $deadline, $user_id);
    
    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Project submitted successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Project submission failed, try again!"]);
    }

    $stmt->close();
    $conn->close();
}
?>

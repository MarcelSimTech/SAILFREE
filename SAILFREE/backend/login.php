<?php
session_start();
include 'db_connect.php'; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    if (!$conn) {
        echo json_encode(["success" => false, "message" => "Database connection failed"]);
        exit();
    }

    
    $sql = "SELECT id, password_hash FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo json_encode(["success" => false, "message" => "SQL error: " . $conn->error]);
        exit();
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Verify password
        if (password_verify($password, $row['password_hash'])) {
            $_SESSION['user_id'] = $row['id'];
            echo json_encode(["success" => true, "message" => "Login successful", "redirect" => "../frontend/dashboard.html"]);
        } else {
            echo json_encode(["success" => false, "message" => "Invalid password"]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "Invalid email or password"]);
    }

    $stmt->close();
    $conn->close();
}
?>

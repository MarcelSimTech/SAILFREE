<?php
include 'db_connect.php'; // Ensure database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Insert into database
    $sql = "INSERT INTO admins (name, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $password);
    
    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Admin account created successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Admin creation failed, try again!"]);
    }

    $stmt->close();
    $conn->close();
}
?>

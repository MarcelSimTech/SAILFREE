<?php
session_start();
include 'db_connect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = isset($_POST['password_hash']) ? $_POST['password_hash'] : ''; 
    
    if (!empty($username) && !empty($email) && !empty($password)) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert into database
        $sql = "INSERT INTO users (username, email, password_hash) VALUES ('$username', '$email', '$hashed_password')";
        
        if (mysqli_query($conn, $sql)) {
            $_SESSION['username'] = $username; // Store session data
            header("Location: dashboard.php"); // Redirect to dashboard
            exit;
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Please fill in all fields.";
    }
}
?>

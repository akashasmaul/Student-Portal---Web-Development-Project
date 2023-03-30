<?php

session_start();
$name = $_SESSION['name'];
$username = $_SESSION['username'];
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$profile_pic = $_SESSION['profile_pic'];

// Define database connection constants
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'info');

// Create database connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check database connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Insert user information into the database
$sql = "INSERT INTO users (name, username, email, password, profile_picture) VALUES ('$name', '$username', '$email', '$password', '$profile_pic')";

if (mysqli_query($conn, $sql)) {
    echo '<script>';
    echo 'if (window.confirm("New record created successfully. Click OK to proceed to login page.")) { window.location.href = "../login/login.php"; }';
    echo '</script>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


// Close the database connection
mysqli_close($conn);
?>

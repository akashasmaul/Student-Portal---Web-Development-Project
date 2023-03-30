<?php
// Start the session
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: ../login/login.php");
    exit();
}

// Define database connection constants
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'info');

// Create database connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $profile_pic = $_FILES["profile_pic"]["name"];

$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);
move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file);


}
    // Update user information in database
$username = $_SESSION['username'];
$sql = "UPDATE users SET name='$name', email='$email', password='$password', profile_picture='$profile_pic' WHERE username='$username'";
mysqli_query($conn, $sql);

if (mysqli_query($conn, $sql)) {
    // If the update was successful, redirect to the profile page
    echo '<script>';
    echo 'if (window.confirm("Record updated successfully. Click OK to proceed to profile page.")) { window.location.href = "../portal/portal.php"; }';
    echo '</script>';
    exit;
} else {
    // If there was an error updating the user information, display an error message
    echo "Error updating record: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
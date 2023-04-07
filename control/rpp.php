<! --
This code uses PDO instead of mysqli and uses prepared statements to prevent SQL injection attacks¹.

code for remove profile picture

 --!>

<?php
// Start the session
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: ../view/login.php");
    exit();
}

// Define database connection constants
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'info');

// Create database connection
$dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
$username = DB_USER;
$password = DB_PASS;

try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

// Get user information from database
$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username=:username";
$stmt = $pdo->prepare($sql);
$stmt->execute(['username' => $username]);
$user = $stmt->fetch();

// Delete the current profile picture from the server
if (!empty($user['profile_picture'])) {
    $path = "../data/uploads/" . $user['profile_picture'];
    if (file_exists($path)) {
        unlink($path);
    }
}

// Update the user profile in the database to remove the profile picture
$sql = "UPDATE users SET profile_picture='' WHERE username=:username";
$stmt = $pdo->prepare($sql);
$stmt->execute(['username' => $username]);

// Redirect to the edit profile page
header("Location: ../view/edit.php");
exit();
?>

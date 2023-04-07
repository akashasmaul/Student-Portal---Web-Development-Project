<! --

code page for connection database

 --!>

<?php
// Start the session
session_start();

// Check if the user is logged in
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
try {
    $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Get the logged in user's email
$username = $_SESSION['username'];


// Get user information from database
$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username=:username";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':username', $username);
$stmt->execute();
$user = $stmt->fetch();


// Close the database connection
$conn = null;
?>

<! --
This code uses PDO instead of mysqli and uses prepared statements to prevent SQL injection attacks¹.
 Prepared statements are a feature of PDO that allows you to execute a query multiple times with different parameters¹.
 This code also uses try-catch blocks to handle exceptions that may occur during database connection¹.

 --!>
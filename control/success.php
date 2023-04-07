<! --
This code uses PDO instead of mysqli and uses prepared statements to prevent SQL injection attacks¹.

code for add record to database (signup)

 --!>

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
$dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
$usernames = DB_USER;
$passwords = DB_PASS;

try {
    $pdo = new PDO($dsn, $usernames, $passwords);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

// Insert user information into the database
$sql = "INSERT INTO users (name, username, email, password, profile_picture) VALUES (:name, :username, :email, :password, :profile_pic)";
$stmt = $pdo->prepare($sql);
$stmt->execute(['name' => $name, 'username' => $username, 'email' => $email, 'password' => $password, 'profile_pic' => $profile_pic]);

if ($stmt->rowCount() > 0) {
    echo '<script>';
    echo 'if (window.confirm("New record created successfully. Click OK to proceed to login page.")) { window.location.href = "../view/login.php"; }';
    echo '</script>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
$pdo = null
?>

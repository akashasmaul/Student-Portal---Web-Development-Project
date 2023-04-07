<! --

code page for storing daily neutrition goals to database

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
try {
    $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Get the values from the URL
    $carbs = $_GET['carbs'];
    $protein = $_GET['protein'];
    $fats = $_GET['fats'];
    $consumedCalories = $_GET['consumedCalories'];
    $burnedCalories = $_GET['burnedCalories'];
    $startingWeight = $_GET['startingWeight'];
    $currentWeight = $_GET['currentWeight'];
    $goalWeight = $_GET['goalWeight'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO dng (carbs, protein, fats, consumedCalories, burnedCalories, startingWeight, currentWeight, goalWeight) VALUES (:carbs, :protein, :fats, :consumedCalories, :burnedCalories, :startingWeight, :currentWeight, :goalWeight)");

    // Bind the parameters
    $stmt->bindParam(':carbs', $carbs);
    $stmt->bindParam(':protein', $protein);
    $stmt->bindParam(':fats', $fats);
    $stmt->bindParam(':consumedCalories', $consumedCalories);
    $stmt->bindParam(':burnedCalories', $burnedCalories);
    $stmt->bindParam(':startingWeight', $startingWeight);
    $stmt->bindParam(':currentWeight', $currentWeight);
    $stmt->bindParam(':goalWeight', $goalWeight);

    // Execute the statement
    $stmt->execute();
}
if ($stmt) {
    // If the update was successful, redirect to the profile page
    echo '<script>';
    echo 'if (window.confirm("Record updated successfully. Click OK to proceed to Food Diary Page.")) { window.location.href = "../view/food.php"; }';
    echo '</script>';
    exit;
} else {
    // If there was an error updating the user information, display an error message
    echo "Error updating record: " . mysqli_error($conn);
}

// Close the database connection
$conn = null;
?>
<?php
// Start the session
session_start();

// Check if the user is logged in
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

// Check database connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the logged in user's email
$username = $_SESSION['username'];

// Get the user's information from the database
$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Portal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center"><?= $row['name'] ?>'s Profile</h2>
                    </div>
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <img src="../uploads/<?= $row['profile_picture'] ?>" alt="Profile Picture" class="rounded-circle" width="150">
                        </div>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" value="<?= $row['name'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" value="<?= $row['email'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">username:</label>
                            <input type="text" class="form-control" id="username" value="<?= $row['username'] ?>" readonly>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-primary btn-block" onclick="edit()">Update Profile</button>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-s btn-block" onclick="logout()">Sign Out</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        function edit() {
            window.location.href = "../editprofile/edit.php";
        }
        function logout() {
            window.location.href = "../logout/logout.php";
        }
    </script>
</body>
</html>

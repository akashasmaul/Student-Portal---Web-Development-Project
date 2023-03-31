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

// Check database connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get user information from database
$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);


?>

<?php
// Initialize variables
$name = $email = $password = $confirm_password = $profile_pic = '';
$name_err = $email_err = $password_err = $confirm_password_err = $profile_pic_err = '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<button type="button" class="profile" onclick="index()">Dashbord</button>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Hello, <?= $user['name'] ?></h2>
                    </div>
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <img src="../uploads/<?= $user['profile_picture'] ?>" alt="Profile Picture" class="rounded-circle" width="150">
                            <a class="btn btn-link" href="rpp.php">Remove Profile Picture</a>

                        </div>
                        <div class="form-group">
                            <label for="name">username:</label>
                            <input type="text" class="form-control" id="username" value="<?= $user['username'] ?>" readonly>
                        </div>
                        <h2>Edit Profile</h2>
                        <p>Please fill out this form to update your profile.</p>
                    </div>                   
                </div>
                
            </div>
            <form action="redirect.php" method="post" enctype="multipart/form-data">
            <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                <span class="help-block"><?php echo $name_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group">
                <label>Profile Picture</label>
                <input type="file" name="profile_pic" value="<?php echo $profile_pic; ?>">
                <span class="help-block"><?php echo $profile_pic_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
                
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <a class="btn btn-link" href="../portal/portal.php">Cancel</a>
            </div>
        </form>
        </div>
    </div>
    <script>
        function index() {
            window.location.href = "../index.php";
        }
        </script>
</body>
</html>

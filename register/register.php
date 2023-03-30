<?php

session_start();


// Initialize variables
$name = $email = $password = $confirm_password = $profile_pic = $username ='';
$name_err = $email_err = $password_err = $confirm_password_err = $profile_pic_err = $username_err ='';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate name
    if (empty($_POST['name'])) {
        $name_err = 'Please enter your full name.';
    } else {
        $name = htmlspecialchars($_POST['name']);
        if (!preg_match('/^[a-zA-Z ]*$/', $name)) {
            $name_err = 'Name can only contain letters and spaces.';
        }
    }

    if (empty($_POST['username'])) {
        $email_err = 'Please enter your username.';
    } else {
        $username = htmlspecialchars($_POST['username']);
        if (!preg_match('/^[a-zA-Z ]*$/', $username)) {
            $username_err = 'Name can only contain letters';
        }
    }

    // Validate email
    if (empty($_POST['email'])) {
        $email_err = 'Please enter your email address.';
    } else {
        $email = htmlspecialchars($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_err = 'Please enter a valid email address.';
        }
    }



    // Validate password
    if (empty($_POST['password'])) {
        $password_err = 'Please enter a password.';
    } else {
        $password = htmlspecialchars($_POST['password']);
        if (strlen($password) < 6) {
            $password_err = 'Password must be at least 6 characters long.';
        }
    }

    // Validate confirm password
    if (empty($_POST['confirm_password'])) {
        $confirm_password_err = 'Please confirm your password.';
    } else {
        $confirm_password = htmlspecialchars($_POST['confirm_password']);
        if ($password !== $confirm_password) {
            $confirm_password_err = 'Passwords do not match.';
        }
    }

    // Validate profile picture
    if (!empty($_FILES['profile_pic']['name'])) {
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
        $file_type = pathinfo($_FILES['profile_pic']['name'], PATHINFO_EXTENSION);
        if (!in_array($file_type, $allowed_types)) {
            $profile_pic_err = 'Only JPG, JPEG, PNG, and GIF files are allowed.';
        } elseif ($_FILES['profile_pic']['size'] > 1000000) {
            $profile_pic_err = 'File size cannot exceed 1 MB.';
        } else {
            $profile_pic = '../uploads/' . uniqid('', true) . '.' . $file_type;
            move_uploaded_file($_FILES['profile_pic']['tmp_name'], $profile_pic);
        }
    }


    // If there are no errors, redirect to success page
    if (empty($name_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err) && empty($profile_pic_err) && empty($username_err)) {
        $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['profile_pic'] = $profile_pic;
        header('Location: success.php');
        exit;
    }
    
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                    <h1 class="text-center mb-4">Register</h1>
                    <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" id="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>" placeholder="Enter your full name">
                    <span class="invalid-feedback"><?php echo $name_err; ?></span>
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" placeholder="Enter your username">
                    <span class="invalid-feedback"><?php echo $email_err; ?></span>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>" placeholder="Enter your email address">
                    <span class="invalid-feedback"><?php echo $email_err; ?></span>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>" placeholder="Enter your password">
                    <span class="invalid-feedback"><?php echo $password_err; ?></span>
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>" placeholder="Confirm your password">
                    <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                </div>

                <div class="form-group">
                    <label for="profile_pic">Profile Picture</label>
                    <input type="file" name="profile_pic" id="profile_pic" class="form-control-file <?php echo (!empty($profile_pic_err)) ? 'is-invalid' : ''; ?>" accept="image/*">
                    <span class="invalid-feedback"><?php echo $profile_pic_err; ?></span>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-block" value="Register">
                </div>

                <p class="text-center">Already have an account? <a href="../login/login.php">Login here</a>.</p>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
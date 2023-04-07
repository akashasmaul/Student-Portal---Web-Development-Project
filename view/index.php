<! --
dashbord page, need to select option
shows name fetched from database
 --!>

<?php include '../control/conn.php' ?>

<!DOCTYPE html>
<html>
<title>Student Portal</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="../css/style.css">
<body>
<!-- Sidebar -->
<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:17%">
  <h3 class="w3-bar-item"></h3>
  <a href="index.php" class="w3-bar-item w3-button nav-icons active"> Dashbord</a>
  <a href="calendar.php" class="w3-bar-item w3-button nav-icons "> Calendar</a>
  <a href="studytrack.php" class="w3-bar-item w3-button nav-icons"> Study Tracking</a>
  <a href="fitnesstrack.php" class="w3-bar-item w3-button nav-icons"> Fitness Tracking  </a>
</div>
<!-- Page Content -->
<div style="margin-left:30%">
<a href="portal.php" class="profile"> <?= $user['name'] ?></a>
<a href="logout.php" class="profile"> Logout</a>

  <h1>Student Portal</h1>
 
  <br><br><br>
  <h1>Welcome, <?= $user['name'] ?></h1>
  <br><br>
  <h3>Select options from the sidebar </h3>

</div>
<div class="w3-container">

</div>
</div>
</body>
</html>
<?php include 'conn.php' ?>

<!DOCTYPE html>
<html>
<title>Student Portal</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
/* Style for the profile button */
.profile {
  float: right;
  margin-top: 15px;
  margin-right: 30px;
  background-color: #f2f2f2;
  border: none;
  color: black;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  border-radius: 5px;
  cursor: pointer;
}
/* Style for the navigation icons */
.nav-icons {
  font-size: 24px;
  padding: 8px 16px;
  text-align: center;
  text-decoration: none;
  display: block;
}
/* Active class for the selected navigation icon */
.active {
  background-color: #4CAF50;
  color: white;
}
</style>
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
<div style="margin-left:20%">

  <h1>Student Portal</h1>
  <a href="portal/portal.php" class="profile"> <?= $user['name'] ?></a>
  
</div>
<div class="w3-container">

</div>
</div>
</body>
</html>
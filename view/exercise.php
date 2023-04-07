<! --
ecercise record page

 --!>

<?php include '../control/conn.php' ?>

<!DOCTYPE html>
<html>
<title>Student Portal</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="../css/style.css">

	
<body>
<!-- First sidebar -->
<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:17%">
  <h3 class="w3-bar-item"></h3>
  <a href="index.php" class="w3-bar-item w3-button nav-icons "> Dashbord</a>
  <a href="calendar.php" class="w3-bar-item w3-button nav-icons "> Calendar</a>
  <a href="studytrack.php" class="w3-bar-item w3-button nav-icons "> Study Tracking</a>
  <a href="fitnesstrack.php" class="w3-bar-item w3-button nav-icons active"> Fitness Tracking  </a>
</div>

<!-- Second sidebar -->
<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:17%; margin-left: 250px;">
  <h3 class="w3-bar-item">Fitness Tracking</h3>
  <a href="exercise.php" class="w3-bar-item w3-button sector-heading active">Exercise Tracking</a> 
  <div class="w3-bar-block sub-sector">
    <a href="monday.php" class="w3-bar-item w3-button sub-subsector">Monday</a>   
    <a href="tuesday.php" class="w3-bar-item w3-button sub-subsector">Tuesday</a>
    <a href="wednessday.php" class="w3-bar-item w3-button sub-subsector">Wednesday</a>
    <a href="thursday.php" class="w3-bar-item w3-button sub-subsector">Thursday</a>
    <a href="friday.php" class="w3-bar-item w3-button sub-subsector">Friday</a>
    <a href="saturday.php" class="w3-bar-item w3-button sub-subsector">Saturday</a>
    <a href="sunday.php" class="w3-bar-item w3-button sub-subsector">Sunday</a>
    </div>
  <a href="food.php" class="w3-bar-item w3-button sector-heading  ">Food Diary    </a>  
   
   
</div>
<!-- Page Content -->
<div style="margin-left:35%">
<a href="portal.php" class="profile"> <?= $user['name'] ?></a>
<a href="logout.php" class="profile"> Logout</a>
<br>

<body class="w3-light-grey">
<!-- add w3 container -->
<div class="w3-container w3-margin-top">
<h1 class="w3-text">Select Days</h1>

</body>


</html>
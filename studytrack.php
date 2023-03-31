<?php include 'conn.php' ?>

<!DOCTYPE html>
<html>
<title>Student Portal</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="style.css">
</style>
<body>
<!-- First sidebar -->
<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:17%">
  <h3 class="w3-bar-item"></h3>
  <a href="index.php" class="w3-bar-item w3-button nav-icons "> Dashbord</a>
  <a href="calendar.php" class="w3-bar-item w3-button nav-icons "> Calendar</a>
  <a href="studytrack.php" class="w3-bar-item w3-button nav-icons active"> Study Tracking</a>
  <a href="fitnesstrack.php" class="w3-bar-item w3-button nav-icons"> Fitness Tracking  </a>
</div>

<!-- Second sidebar -->
<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:17%; margin-left: 250px;">
  <h3 class="w3-bar-item">Study Tracking</h3>
  <a href="studytrack\studydiary.php" class="w3-bar-item w3-button sector-heading ">Study Diary</a>
   
  <a href="studytrack\mygrades.php" class="w3-bar-item w3-button sector-heading ">My Grades    </a>
  
  <a href="studytrack\gradecalc.php" class="w3-bar-item w3-button sector-heading ">Grade Calculator</a>

</div>
<!-- Page Content -->
<div style="margin-left:50%">
<a href="portal/portal.php" class="profile"> <?= $user['name'] ?></a>
<a href="logout/logout.php" class="profile"> Logout</a>
  <h1>Please Select Option</h1>
  
  
</div>

</div>
</body>
</html>
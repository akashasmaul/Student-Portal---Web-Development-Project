<! --
fitness tracing page, need to select option
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
  <a href="exercise.php" class="w3-bar-item w3-button sector-heading ">Excercise Diary</a> 
   <a href="food.php" class="w3-bar-item w3-button sector-heading  ">Food Diary    </a>  
   
   
</div>
<!-- Page Content -->
<div style="margin-left:35%">
<a href="portal.php" class="profile"> <?= $user['name'] ?></a>
<a href="logout.php" class="profile"> Logout</a>
<br>


<center><h1>Select Option</h1></center>

  

</div>

</body>
</html>
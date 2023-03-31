<?php include 'conn.php' ?>

<!DOCTYPE html>
<html>
<title>Student Portal</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="../style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="yr.js"></script>
  <link rel="stylesheet" href="yr.css">
	
<body>
<!-- First sidebar -->
<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:17%">
  <h3 class="w3-bar-item"></h3>
  <a href="../index.php" class="w3-bar-item w3-button nav-icons "> Dashbord</a>
  <a href="../calendar.php" class="w3-bar-item w3-button nav-icons "> Calendar</a>
  <a href="../studytrack.php" class="w3-bar-item w3-button nav-icons active"> Study Tracking</a>
  <a href="../fitnesstrack.php" class="w3-bar-item w3-button nav-icons"> Fitness Tracking  </a>
</div>

<!-- Second sidebar -->
<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:17%; margin-left: 250px;">
  <h3 class="w3-bar-item">Study Tracking</h3>
  <a href="studydiary.php" class="w3-bar-item w3-button sector-heading  ">Study Diary</a> 
   <a href="mygrades.php" class="w3-bar-item w3-button sector-heading  ">My Grades    </a>  
   <a href="gradecalc.php" class="w3-bar-item w3-button sector-heading active ">Grade Calculator</a>
   <div class="w3-bar-block sub-sector">
    <a href="modulecalc.php" class="w3-bar-item w3-button sub-subsector ">Module Calculator</a>
    <a href="yearcalc.php" class="w3-bar-item w3-button sub-subsector active">Year Calculator </a>
    <a href="degreecalc.php" class="w3-bar-item w3-button sub-subsector">Undergraduate Degree Calculator</a>
  </div>
</div>
<!-- Page Content -->
<div style="margin-left:35%">
<a href="../portal/portal.php" class="profile"> <?= $user['name'] ?></a>
<a href="../logout/logout.php" class="profile"> Logout</a>

<br>
<h1>Year Grade Calculator</h1>
  
  
  <form method="post" id="grade-form" class="w3-container w3-card-4 w3-light-grey w3-text-black w3-margin">
  <div id="module-inputs">
    <div class="module-input w3-row w3-section">
      <label for="module-name-1" class="w3-col">Module Name:</label>
      <input type="text" name="module-name[]" id="module-name-1" class="w3-input w3-col" required>
      <label for="module-grade-1" class="w3-col">Overall Grade (%):</label>
      <input type="number" name="module-grade[]" id="module-grade-1" class="w3-input w3-col" min="0" max="100" required>
      <label for="module-credit-1" class="w3-col">Credit:</label>
      <input type="number" name="module-credit[]" id="module-credit-1" class="w3-input w3-col" min="0" required>
      <button type="button" class="remove-module-btn w3-button w3-col w3-right-align w3-margin-top" onclick="removeModuleInput(this)">Remove</button>
    </div>
  </div>

  <button type="button" id="add-module-btn" onclick="addModuleInput()" class="w3-button w3-blue w3-margin">Add Another Module</button>

  <button type="submit" name="submit" class="w3-button w3-green w3-margin">Calculate</button>
</form>

<div id="result" class="w3-container w3-card-4 w3-light-grey w3-margin">
  <h2 class="w3-center w3-text-blue">Overall Weighted Grade:</h2>
  <p id="weighted-grade" class="w3-xlarge w3-center"></p>
  <h2 class="w3-center w3-text-blue">Degree Classification:</h2>
  <p id="degree-classification" class="w3-xlarge w3-center"></p>
</div>
</div>

</div>

</body>
</html>
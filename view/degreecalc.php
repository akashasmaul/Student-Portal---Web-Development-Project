<?php include '../control/conn.php' ?>

<!DOCTYPE html>
<html>
<title>Student Portal</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/yr.css">
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
  <a href="studydiary.php" class="w3-bar-item w3-button sector-heading  ">Study Diary</a> 
   <a href="mygrades.php" class="w3-bar-item w3-button sector-heading  ">My Grades    </a>  
   <a href="gradecalc.php" class="w3-bar-item w3-button sector-heading active ">Grade Calculator</a>
   <div class="w3-bar-block sub-sector">
    <a href="modulecalc.php" class="w3-bar-item w3-button sub-subsector ">Module Calculator</a>
    <a href="yearcalc.php" class="w3-bar-item w3-button sub-subsector ">Year Calculator </a>
    <a href="degreecalc.php" class="w3-bar-item w3-button sub-subsector active">Undergraduate Degree Calculator</a>
  </div>
</div>
<!-- Page Content -->
<div style="margin-left:35%">
<a href="portal.php" class="profile"> <?= $user['name'] ?></a>
<a href="logout.php" class="profile"> Logout</a>
<br>
<h1>Undergraduate Degree Calculator</h1>
<div class="w3-container">
    <form method="post" id="grade-form">
        <div id="year-inputs">
            <div class="year-input w3-row-padding">
                <div class="w3-col s12 m4">
                    <label for="year-name-1">Year Name:</label>
                    <input type="text" name="year-name[]" id="year-name-1" class="w3-input" required>
                </div>
                <div class="w3-col s12 m4">
                    <label for="year-grade-1">Year Grade (%):</label>
                    <input type="number" name="year-grade[]" id="year-grade-1" min="0" max="100" class="w3-input year-grade" required>

                </div>
                <div class="w3-col s12 m4">
                    <label for="year-weighting-1">Year Weighting (%):</label>
                    <input type="number" name="year-weighting[]" id="year-weighting-1" min="0" max="100" class="w3-input year-weighting" required>

                </div>
            </div>
        </div>

        <button type="button" id="add-year-btn" class="w3-button w3-blue" onclick="addYearInput()">Add Another Year</button>

        <button type="submit" name="submit" class="w3-button w3-green">Save</button>
    </form>
</div>

<div id="" class="w3-container w3-card-4 w3-light-grey w3-margin">
  <h2 class="w3-center w3-text-blue">Overall Weighted Grade:</h2>
  <p id="weighted-grade" class="w3-xlarge w3-center"></p>
  <h2 class="w3-center w3-text-blue">Degree Classification:</h2>
  <p id="degree-classification" class="w3-xlarge w3-center"></p>
</div>
</div>

</div>
<script src="../js/deg.js"></script>
</body>
</html>
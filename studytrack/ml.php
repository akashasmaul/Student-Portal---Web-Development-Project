<?php include '../conn.php' ?>

<!DOCTYPE html>
<html>
<title>Student Portal</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="../style.css">
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
  <button class="w3-bar-item w3-button sector-heading active ">Study Diary</button>
  <div class="w3-bar-block sub-sector">
    <a href="webdev.php" class="w3-bar-item w3-button sub-subsector ">Web Development</a>
    <a href="ml.php" class="w3-bar-item w3-button sub-subsector active">Machine Learning</a>
  </div>
   <button class="w3-bar-item w3-button w3-right" onclick="addSubSubSector()">+ Add Course</button>
   <br><br><br>
   <a href="mygrades.php" class="w3-bar-item w3-button sector-heading ">My Grades    </a>  
  <a href="gradecalc.php" class="w3-bar-item w3-button sector-heading ">Grade Calculator</a>
</div>
<!-- Page Content -->
<div style="margin-left:50%">

  <h1>Select Course</h1>
  <a href="../portal/portal.php" class="profile"> <?= $user['name'] ?></a>
  
</div>
<div class="w3-container">

</div>
</div>

<script>
function addSubSubSector() {
  var activeSector = document.querySelector(".sector-heading.active");
  if (activeSector.nextElementSibling && activeSector.nextElementSibling.classList.contains("sub-sector")) {
    var subSector = activeSector.nextElementSibling;
    var newSubSubSector = document.createElement("a");
    newSubSubSector.className = "w3-bar-item w3-button sub-subsector";
    newSubSubSector.textContent = "New Course";
    subSector.appendChild(newSubSubSector);
  }
}
</script>
</body>
</html>
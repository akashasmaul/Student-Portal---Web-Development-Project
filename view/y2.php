<!--

year 2 page 
for add  new assignments or task
for adding  new module
-->

<?php include '../control/conn.php' ?>

<!DOCTYPE html>
<html>
<title>Student Portal</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="../css/style.css">
<script src="../js/y2.js"></script>
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
  <div class="w3-bar-block sub-sector">
    <a href="webdev.php" class="w3-bar-item w3-button sub-subsector">Web Development</a>
    <a href="ml.php" class="w3-bar-item w3-button sub-subsector">Machine Learning</a>
  </div>
   
   <a href="mygrades.php" class="w3-bar-item w3-button sector-heading active ">My Grades    </a>  
   <div class="w3-bar-block sub-sector">
    <a href="y1.php" class="w3-bar-item w3-button sub-subsector ">Year 1</a>
    <a href="y2.php" class="w3-bar-item w3-button sub-subsector active ">Year 2</a>
    </div> 
    <button class="w3-bar-item w3-button w3-right" onclick="addSubSubSector()">+ Add Year</button>
  
    <br> <br><br>
   <a href="gradecalc.php" class="w3-bar-item w3-button sector-heading ">Grade Calculator</a>
</div>
<!-- Page Content -->
<div style="margin-left:35%">
<a href="portal.php" class="profile"> <?= $user['name'] ?></a>
<a href="logout.php" class="profile"> Logout</a>
<br>
  <h1>Second Year</h1>
  
  
<br>
  <h2 class="w3-center">Web Development</h2>
<div class="w3-container">
  <table id="module-1" class="w3-table-all w3-card-4">
    <thead>
      <tr class="w3-teal">
        <th>ASSIGNMENT NAME</th>
        <th>ASSIGNMENT MARKS (%)</th>
      </tr>
    </thead>
    <tbody>
    <td>Assignment 1</td>
      <td>90%</td>
      </tbody>
      <tbody>
      <td>Assignment 2</td>
      <td>80%</td>
      </tbody>      
  </table>
  <button class="w3-button w3-section w3-teal w3-ripple" onclick="addAssignmentToTable('module-1')">+ Add Assignment/Tasks</button>
  <br><br>

  <h2 class="w3-center">Machine Learning</h2>
<div class="w3-container">
  <table id="module-2" class="w3-table-all w3-card-4">
    <thead>
      <tr class="w3-teal">
        <th>ASSIGNMENT NAME</th>
        <th>ASSIGNMENT MARKS (%)</th>
      </tr>
    </thead>
    <tbody>
    <td>Assignment 1</td>
      <td>85%</td>
      </tbody>
      <tbody>
      <td>Assignment 2</td>
      <td>95%</td>
      </tbody>      
  </table>
  
  <button class="w3-button w3-section w3-teal w3-ripple" onclick="addAssignmentToTable('module-2')">+ Add Assignment/Tasks</button>

  <br><br>

</div>
<button class="w3-button w3-section w3-teal w3-ripple" onclick="addNewModule()">+ Add Module</button>

</div>


<script>
  function addSubSubSector() {
  var activeSector = document.querySelector(".sector-heading.active");
  var newYear = prompt("Enter the number of the year:");
  if (activeSector.nextElementSibling && activeSector.nextElementSibling.classList.contains("sub-sector")) {
    var subSector = activeSector.nextElementSibling;
    var newSubSubSector = document.createElement("div");
    newSubSubSector.className = "w3-bar";
    var newSubSubSectorText = document.createElement("a");
    newSubSubSectorText.className = "w3-bar-item w3-button sub-subsector";
    newSubSubSectorText.textContent = "Year " + newYear;
    newSubSubSector.appendChild(newSubSubSectorText);
    var removeButton = document.createElement("button");
    removeButton.className = "";
    removeButton.textContent = "x";
    removeButton.onclick = function() {
      newSubSubSector.remove();
    };
    newSubSubSector.appendChild(removeButton);
    subSector.appendChild(newSubSubSector);
  }
}
</script>

</body>
</html>
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
    <a href="y1.php" class="w3-bar-item w3-button sub-subsector active">Year 1</a>
    <a href="y2.php" class="w3-bar-item w3-button sub-subsector  ">Year 2</a>
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
  <h1>First Year</h1>
  
  <br>

  <h2 class="w3-center">Object Oriented Programming</h2>
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

  <h2 class="w3-center">Software Engineering</h2>
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
    var newSubSubSector = document.createElement("a");
    newSubSubSector.className = "w3-bar-item w3-button sub-subsector";
    newSubSubSector.textContent = "Year " + newYear;
    subSector.appendChild(newSubSubSector);
  }
}
function addAssignmentToTable(tableId) {
  // find the table element
  var table = document.getElementById(tableId);

  // create the new row
  var newRow = table.insertRow(-1);

  // create the cells for the row
  var assignmentNameCell = newRow.insertCell(0);
  var assignmentMarksCell = newRow.insertCell(1);
  var removeBtnCell = newRow.insertCell(2);

  // create the input fields for the cells
  var assignmentNameInput = document.createElement("input");
  assignmentNameInput.type = "text";
  var assignmentMarksInput = document.createElement("input");
  assignmentMarksInput.type = "number";

  // set the input field names and IDs
  assignmentNameInput.name = "assignmentName";
  assignmentMarksInput.name = "assignmentMarks";
  var rowCount = table.rows.length - 1;
  assignmentNameInput.id = "assignmentName" + rowCount;
  assignmentMarksInput.id = "assignmentMarks" + rowCount;

  // add the input fields to the cells
  assignmentNameCell.appendChild(assignmentNameInput);
  assignmentMarksCell.appendChild(assignmentMarksInput);

  // create the remove button for the row
  var removeBtn = document.createElement("button");
  removeBtn.textContent = "Remove";
  removeBtn.onclick = function() {
    table.deleteRow(newRow.rowIndex);
    saveDataToLocalStorage(tableId);
  };

  // add the remove button to the cell
  removeBtnCell.appendChild(removeBtn);

  // save the row to local storage
  saveDataToLocalStorage(tableId);
  
  
}

function saveDataToLocalStorage(tableId) {
  // get the table element
  var table = document.getElementById(tableId);

  // create an array to store the rows
  var rows = [];

  // loop through each row in the table
  for (var i = 1; i < table.rows.length; i++) {
    // get the input values
    var assignmentName = table.rows[i].cells[0].childNodes[0].value;
    var assignmentMarks = table.rows[i].cells[1].childNodes[0].value;

    // create an object to store the input values
    var rowObject = {
      assignmentName: assignmentName,
      assignmentMarks: assignmentMarks
    };

    // add the row object to the array
    rows.push(rowObject);
  }

  // save the rows array to local storage
  localStorage.setItem(tableId, JSON.stringify(rows));
  
}

function loadDataFromLocalStorage(tableId) {
  var rows = JSON.parse(localStorage.getItem(tableId));
  if (rows) {
    var table = document.getElementById(tableId);
    for (var i = 0; i < rows.length; i++) {
      var newRow = table.insertRow(-1);
      var assignmentNameCell = newRow.insertCell(0);
      var assignmentMarksCell = newRow.insertCell(1);
      var removeBtnCell = newRow.insertCell(2);
      
      assignmentNameCell.innerHTML = rows[i].assignmentName;
      assignmentMarksCell.innerHTML = rows[i].assignmentMarks;
      
      var removeBtn = document.createElement("button");
      removeBtn.textContent = "Remove";
      removeBtn.onclick = function() {
        table.deleteRow(newRow.rowIndex);
        saveDataToLocalStorage(tableId);
      };
      
      removeBtnCell.appendChild(removeBtn);
    }
  }  
}


function addNewModule() {
  // create the module header
  var moduleName = prompt("Enter the name of the course:");
  var moduleHeader = document.createElement("h2");
  moduleHeader.classList.add("w3-center");
  moduleHeader.textContent = moduleName;

  // create the module table
  var moduleTable = document.createElement("table");
  moduleTable.id = moduleName.toLowerCase().replace(" ", "-");

  // add the table header
  var tableHeader = document.createElement("thead");
  var tableHeaderRow = document.createElement("tr");
  var tableHeaderCell1 = document.createElement("th");
  tableHeaderCell1.textContent = "ASSIGNMENT NAME";
  var tableHeaderCell2 = document.createElement("th");
  tableHeaderCell2.textContent = "ASSIGNMENT MARKS (%)";
  var tableHeaderCell3 = document.createElement("th");
  tableHeaderCell3.textContent = "REMOVE";
  tableHeaderRow.appendChild(tableHeaderCell1);
  tableHeaderRow.appendChild(tableHeaderCell2);
  tableHeaderRow.appendChild(tableHeaderCell3);
  tableHeader.appendChild(tableHeaderRow);
  moduleTable.appendChild(tableHeader);

  // add the table body
  var tableBody = document.createElement("tbody");
  moduleTable.appendChild(tableBody);

  // add the "Add Assignment/Tasks" button
  var addAssignmentBtn = document.createElement("button");
  addAssignmentBtn.textContent = "+ Add Assignment/Tasks";
  
  // add event listener for button click
  addAssignmentBtn.addEventListener("click", function() {
    addAssignmentToTable(moduleTable.id);
  });

  // create the module container and add the header, table, and button
  var moduleContainer = document.createElement("div");
  moduleContainer.classList.add("w3-container");
  moduleContainer.appendChild(moduleHeader);
  moduleContainer.appendChild(moduleTable);
  moduleContainer.appendChild(addAssignmentBtn);

  // append the module container to the end of the document
  document.body.appendChild(moduleContainer);
}

function addSaveButton() {
  var saveBtn = document.createElement("button");
  saveBtn.textContent = "Save";
  
  saveBtn.addEventListener("click", function() {
    // get the table
    var table = document.getElementById(tableId);

    // create an array to store the table data
    var tableData = [];

    // iterate over each row in the table
    for (var i = 1; i < table.rows.length; i++) {
      // get the cells in the row
      var cells = table.rows[i].cells;

      // create an object to store the row data
      var rowData = {};

      // add the cell data to the row object
      rowData.assignmentName = cells[0].querySelector("input").value;
      rowData.assignmentMarks = cells[1].querySelector("input").value;

      // add the row object to the table data array
      tableData.push(rowData);
    }

    // save the table data to local storage
    localStorage.setItem(tableId, JSON.stringify(tableData));
  });

  // add the save button to the module container
  var moduleContainer = document.querySelector(".w3-container");
  moduleContainer.appendChild(saveBtn);
}

</script>
</body>
</html>
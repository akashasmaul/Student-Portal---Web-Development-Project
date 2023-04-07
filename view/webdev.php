<! --
Add task to module web dev

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
  <a href="index.php" class="w3-bar-item w3-button nav-icons "> Dashboard</a>
  <a href="calendar.php" class="w3-bar-item w3-button nav-icons "> Calendar</a>
  <a href="studytrack.php" class="w3-bar-item w3-button nav-icons active"> Study Tracking</a>
  <a href="fitnesstrack.php" class="w3-bar-item w3-button nav-icons"> Fitness Tracking  </a>
</div>

<!-- Second sidebar -->
<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:17%; margin-left: 250px;">
  <h3 class="w3-bar-item">Study Tracking</h3>
  <button class="w3-bar-item w3-button sector-heading active ">Study Diary</button>
  <div class="w3-bar-block sub-sector">
    <a href="webdev.php" class="w3-bar-item w3-button sub-subsector active">Web Development</a>
    <button class="" onclick="removeModule()">x</button>
    <a href="ml.php" class="w3-bar-item w3-button sub-subsector">Machine Learning</a>
  </div>
  <button class="w3-bar-item w3-button w3-right" onclick="addSubSubSector()">+ Add Course</button>

  <br><br><br>
  <a href="mygrades.php" class="w3-bar-item w3-button sector-heading ">My Grades</a>  
  <a href="gradecalc.php" class="w3-bar-item w3-button sector-heading ">Grade Calculator</a>
  
</div>

<!-- Page Content -->
<div style="margin-left:34%">
<a href="portal.php" class="profile"> <?= $user['name'] ?></a>
<a href="logout.php" class="profile"> Logout</a>
<br>
  <center><h1>Web Development</h1></center>



<div class="w3-container">
  <!-- Module tasks -->
  <div class="module-tasks">
    <h2>Tasks</h2>
    <button class="w3-button add-button" onclick="addTask()">+ Add Task</button>
    <br><br>
    <table class="w3-table-all">
      <thead>
        <tr class="w3-grey">
          <th>Task Name</th>
          <th>Task Description</th>
          <th>Due Date</th>
          <th>Status</th>
          <th>Priority</th>
          <th></th>
        </tr>
      </thead>
      <tbody id="task-list">
        <!-- Task rows will be added dynamically here -->
      </tbody>
    </table>
    <br>
    <button class="w3-button save-button" onclick="saveTasks()">Save</button>
  </div>
    </div>
</div>


<script>
  
  function addSubSubSector() {
  var activeSector = document.querySelector(".sector-heading.active");
  var newCourse = prompt("Enter the name of the course:");
  if (activeSector.nextElementSibling && activeSector.nextElementSibling.classList.contains("sub-sector")) {
    var subSector = activeSector.nextElementSibling;
    var newSubSubSector = document.createElement("a");
    newSubSubSector.className = "w3-bar-item w3-button sub-subsector";
    newSubSubSector.textContent = newCourse;

    // Create remove button
    var removeButton = document.createElement("button");
    removeButton.className = "";
    removeButton.textContent = "X";
    removeButton.onclick = function() {
      newSubSubSector.remove();
      removeButton.remove();
    }

    // Create div to contain sub-subsector and remove button
    var div = document.createElement("div");
    div.className = "w3-bar";

    // Append sub-subsector and remove button to div
    div.appendChild(newSubSubSector);
    div.appendChild(removeButton);

    // Append div to sub-sector
    subSector.appendChild(div);
  }
}
// Remove the module from the sidebar
function removeModule() {
  var module = document.querySelector(".sub-sector .active");
  module.parentNode.removeChild(module);
}


    // Save tasks to localStorage
function saveTasks() {
  var taskList = document.getElementById("task-list");
  var tasks = [];

  // Loop through each row and save the task data
  for (var i = 0; i < taskList.rows.length; i++) {
    var task = {
      name: taskList.rows[i].cells[0].getElementsByTagName("input")[0].value,
      desc: taskList.rows[i].cells[1].getElementsByTagName("textarea")[0].value,
      date: taskList.rows[i].cells[2].getElementsByTagName("input")[0].value,
      status: taskList.rows[i].cells[3].getElementsByTagName("select")[0].value,
      priority: taskList.rows[i].cells[4].getElementsByTagName("select")[0].value
    };
    tasks.push(task);
    
  }
  
  // Store the task data in localStorage
  localStorage.setItem("tasks", JSON.stringify(tasks));
}

function addTask() {
  var taskList = document.getElementById("task-list");
  var row = taskList.insertRow(-1);
  var nameCell = row.insertCell(0);
  var descCell = row.insertCell(1);
  var dueCell = row.insertCell(2);
  var statusCell = row.insertCell(3);
  var priorityCell = row.insertCell(4);
  var deleteCell = row.insertCell(5);

  nameCell.innerHTML = '<input type="text" class="w3-input" name="task-name">';
  descCell.innerHTML = '<textarea class="w3-input" name="task-desc"></textarea>';
  dueCell.innerHTML = '<input type="date" class="w3-input" name="task-due">';
  statusCell.innerHTML = '<select class="w3-select" name="task-status"><option value="not-started">Not Started</option><option value="in-progress">In Progress</option><option value="completed">Completed</option></select>';
  priorityCell.innerHTML = '<select class="w3-select" name="task-priority"><option value="low">Low</option><option value="medium">Medium</option><option value="high">High</option></select>';
  deleteCell.innerHTML = '<button class="w3-button delete-button" onclick="deleteTask(this)">Delete</button>';
  

  // Call saveTasks function after adding the new task
  saveTasks();
  
}


function deleteTask(button) {
  var row = button.parentNode.parentNode;
  var taskList = document.getElementById("task-list");
  var tasks = [];

  // Loop through each row and save the task data to tasks array
  for (var i = 0; i < taskList.rows.length; i++) {
    if (taskList.rows[i] !== row) {
      var task = {
        name: taskList.rows[i].cells[0].getElementsByTagName("input")[0].value,
        desc: taskList.rows[i].cells[1].getElementsByTagName("textarea")[0].value,
        date: taskList.rows[i].cells[2].getElementsByTagName("input")[0].value,
        status: taskList.rows[i].cells[3].getElementsByTagName("select")[0].value,
        priority: taskList.rows[i].cells[4].getElementsByTagName("select")[0].value
      };
      tasks.push(task);
    }
  }

  // Clear the task list and re-add tasks
  taskList.innerHTML = "";
  for (var i = 0; i < tasks.length; i++) {
    var task = tasks[i];
    var newRow = taskList.insertRow(-1);
    var nameCell = newRow.insertCell(0);
    var descCell = newRow.insertCell(1);
    var dueCell = newRow.insertCell(2);
    var statusCell = newRow.insertCell(3);
    var priorityCell = newRow.insertCell(4);
    var deleteCell = newRow.insertCell(5);

    nameCell.innerHTML = '<input type="text" class="w3-input" name="task-name" value="' + task.name + '">';
    descCell.innerHTML = '<textarea class="w3-input" name="task-desc">' + task.desc + '</textarea>';
    dueCell.innerHTML = '<input type="date" class="w3-input" name="task-due" value="' + task.date + '">';
    statusCell.innerHTML = '<select class="w3-select" name="task-status"><option value="not-started"' + (task.status == "not-started" ? ' selected' : '') + '>Not Started</option><option value="in-progress"' + (task.status == "in-progress" ? ' selected' : '') + '>In Progress</option><option value="completed"' + (task.status == "completed" ? ' selected' : '') + '>Completed</option></select>';
    priorityCell.innerHTML = '<select class="w3-select" name="task-priority"><option value="low"' + (task.priority == "low" ? ' selected' : '') + '>Low</option><option value="medium"' + (task.priority == "medium" ? ' selected' : '') + '>Medium</option><option value="high"' + (task.priority == "high" ? ' selected' : '') + '>High</option></select>';
    deleteCell.innerHTML = '<button class="w3-button delete-button" onclick="deleteTask(this)">Delete</button>';
  }

  // Call saveTasks function after removing the task
  saveTasks();
}


function removeTask(button) {
  var row = button.parentNode.parentNode;
  row.parentNode.removeChild(row);

  // Call saveTasks function after deleting the task
  saveTasks();
}


// Retrieve tasks from localStorage and populate table
function populateTasks() {
  var taskList = document.getElementById("task-list");
  var tasks = JSON.parse(localStorage.getItem("tasks"));

  if (tasks != null) {
    for (var i = 0; i < tasks.length; i++) {
      var row = taskList.insertRow(-1);
      var nameCell = row.insertCell(0);
      var descCell = row.insertCell(1);
      var dateCell = row.insertCell(2);
      var statusCell = row.insertCell(3);
      var priorityCell = row.insertCell(4);
      var removeCell = row.insertCell(5);

      nameCell.innerHTML = '<input type="text" value="' + tasks[i].name + '">';
      descCell.innerHTML = '<textarea>' + tasks[i].desc + '</textarea>';
      dateCell.innerHTML = '<input type="date" value="' + tasks[i].date + '">';
      statusCell.innerHTML = '<select><option value="not-started">Not started</option><option value="in-progress">In progress</option><option value="completed">Completed</option></select>';
      statusCell.getElementsByTagName("select")[0].value = tasks[i].status;
      priorityCell.innerHTML = '<select><option value="low">Low</option><option value="medium">Medium</option><option value="high">High</option></select>';
      priorityCell.getElementsByTagName("select")[0].value = tasks[i].priority;
      removeCell.innerHTML = '<button class="w3-button remove-button" onclick="removeTask(this)">Remove</button>';
    }
  }
}

function loadTasks() {
  var tasks = JSON.parse(localStorage.getItem("webdevTasks")) || [];
  var taskList = document.getElementById("task-list");

  for (var i = 0; i < tasks.length; i++) {
    var row = taskList.insertRow(-1);
    var nameCell = row.insertCell(0);
    var descCell = row.insertCell(1);
    var dateCell = row.insertCell(2);
    var statusCell = row.insertCell(3);
    var priorityCell = row.insertCell(4);
    var deleteCell = row.insertCell(5);

    nameCell.innerHTML = tasks[i].name;
    descCell.innerHTML = tasks[i].description;
    dateCell.innerHTML = tasks[i].dueDate;
    statusCell.innerHTML = tasks[i].status;
    priorityCell.innerHTML = tasks[i].priority;

    // Add delete button with onclick function
    var deleteButton = document.createElement("button");
    deleteButton.innerHTML = "Delete";
    deleteButton.setAttribute("onclick", "deleteTask(this)");
    deleteCell.appendChild(deleteButton);
  }
}

loadTasks();


// Call populateTasks() when the page is loaded

window.onload = populateTasks();
window.onload = loadTasks();

</script>

</body>
</html>
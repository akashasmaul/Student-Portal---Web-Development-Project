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
/* Style for the modal dialog */
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.4);
}
.modal-content {
  background-color: #fefefe;
  margin: 15% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 30%;
  border-radius: 5px;
}
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}
.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
</style>

<head>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' />
  <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js'></script>
</head>

<body>
<!-- Sidebar -->
<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:17%">
  <h3 class="w3-bar-item"></h3>
  <a href="index.php" class="w3-bar-item w3-button nav-icons "> Dashbord</a>
  <a href="calendar.php" class="w3-bar-item w3-button nav-icons active"> Calendar</a>
  <a href="studytrack.php" class="w3-bar-item w3-button nav-icons"> Study Tracking</a>
  <a href="fitnesstrack.php" class="w3-bar-item w3-button nav-icons"> Fitness Tracking  </a>
</div>
<!-- Page Content -->
<div style="margin-left:20%">

  <h1>Student Portal</h1>
  <a href="portal/portal.php" class="profile"> <?= $user['name'] ?></a>  

  <!-- Calendar container -->
  <div id='calendar'></div>

  <!-- "Add task" modal dialog -->
  <div id="add-task-modal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
<h2>Add Task</h2>
<form action="add_task.php" method="post">
<label for="task-name">Task Name:</label>
<input type="text" id="task-name" name="task-name" required><br><br>
<label for="task-date">Task Date:</label>
<input type="date" id="task-date" name="task-date" required><br><br>
<button type="submit" class="w3-button w3-green">Add Task</button>
</form>
</div>

  </div>
</div>
<script>
  // Calendar initialization
  $(document).ready(function() {
    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      defaultDate: Date.now(),
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: 'get_tasks.php', // URL for fetching events
      // "Add task" modal dialog
      dayClick: function(date, jsEvent, view) {
        $('#add-task-modal').css("display", "block");
        $('#task-date').val(moment(date).format("YYYY-MM-DD"));
      },
      // Close modal dialog
      $(".close").click(function() {
        $("#add-task-modal").css("display", "none");
      });
    });
  });
</script>
</body>
</html>
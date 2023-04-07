<! --
calendar page, includes full calendar.io

 --!>

<?php include '../control/conn.php' ?>

<!DOCTYPE html>
<html>
<title>Student Portal</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="../css/style.css">

<head>
    <meta charset='utf-8' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.5/index.global.min.js'></script>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' rel='stylesheet' />
    <script>

document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
  left: 'prevYear,prev,next,nextYear today',
  center: 'title',
  right: 'dayGridMonth,dayGridWeek,dayGridDay'
},

navLinks: true, // can click day/week names to navigate views
editable: true,
initialView: 'dayGridMonth',
color: 'red',
 eventColor: 'white',
 backgroundColor: 'white',
 

  });

  // define the event data
  var eventData = JSON.parse(localStorage.getItem('eventData')) || [
        
        ];

  // add the event data to the calendar
  calendar.addEventSource(eventData);
   // set the colors of the events

   var events = calendar.getEvents();
        for (var i = 0; i < events.length; i++) {
          var event = events[i];
          var color = event.extendedProps.color;
          if (color) {
            event.setProp('backgroundColor', color);
            event.setProp('borderColor', color);
          }
        }

  // add button click event to add events dynamically
  document.getElementById('add-event-btn').addEventListener('click', function() {
    var title = prompt('Enter event title:');
    if (title) {
      var start = prompt('Enter start date/time (YYYY-MM-DD HH:MM:SS):');
      var end = prompt('Enter end date/time (YYYY-MM-DD HH:MM:SS):');
      var color = prompt('Enter color (hex code or name):');
      var eventData = {
        title: title,
              start: start,
              end: end,
              color: color,
              backgroundColor: color,
              eventColor: color
      };
      calendar.addEvent(eventData);
            eventData = calendar.getEvents().map(function(event) {
              return {
                title: event.title,
                  start: event.start,
                  end: event.end,
                  color: event.color
              
              };
            });
            localStorage.setItem('eventData', JSON.stringify(eventData));
          }
  });
  // add event click event to edit events dynamically
  calendar.on('eventClick', function(info) {
  var edit = confirm("Do you want to edit this event?");
  if (edit) {
    var title = prompt('Enter event title:', info.event.title);
    if (title) {
      var start = prompt('Enter start date/time (YYYY-MM-DD HH:MM:SS):', info.event.startStr);
      var end = prompt('Enter end date/time (YYYY-MM-DD HH:MM:SS):', info.event.endStr);
      var color = prompt('Enter color:', info.event.color);
      var eventData = {
        title: title,
        start: start,
        end: end,
        color: color
      };
      info.event.setProp('title', title);
      info.event.setStart(start);
      info.event.setEnd(end);
      info.event.setProp('color', color);
      eventData = calendar.getEvents().map(function(event) {
        return {
          title: event.title,
          start: event.start,
          end: event.end,
          color: event.color
        };
      });
      localStorage.setItem('eventData', JSON.stringify(eventData));
    }
  } else {
    if (confirm("Are you sure you want to delete this event?")) {
      info.event.remove();
      var eventData = calendar.getEvents().map(function(event) {
        return {
          title: event.title,
          start: event.start,
          end: event.end,
          color: event.color
        };
      });
      localStorage.setItem('eventData', JSON.stringify(eventData));
    }
  }
});
         // set the event color when rendering events on the calendar
  calendar.on('eventRender', function(info) {
    info.el.style.backgroundColor = info.event.backgroundColor;
  });

  calendar.render();
});

</script>
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
<a href="portal.php" class="profile"> <?= $user['name'] ?></a>
<a href="logout.php" class="profile"> Logout</a>
  <h1>Calendar</h1>
  
  <br><br>

<div class="w3-container">
<div>
      <button id='add-event-btn' >Add Event</button>
    </div>
    <div id='calendar'></div>

</div>
</body>
</html>
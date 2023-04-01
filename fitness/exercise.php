<?php include 'conn.php' ?>

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
  <a href="../studytrack.php" class="w3-bar-item w3-button nav-icons "> Study Tracking</a>
  <a href="../fitnesstrack.php" class="w3-bar-item w3-button nav-icons active"> Fitness Tracking  </a>
</div>

<!-- Second sidebar -->
<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:17%; margin-left: 250px;">
  <h3 class="w3-bar-item">Fitness Tracking</h3>
  <a href="exercise.php" class="w3-bar-item w3-button sector-heading active">Exercise Tracking</a> 
   <a href="food.php" class="w3-bar-item w3-button sector-heading  ">Food Diary    </a>  
   
   
</div>
<!-- Page Content -->
<div style="margin-left:35%">
<a href="../portal/portal.php" class="profile"> <?= $user['name'] ?></a>
<a href="../logout/logout.php" class="profile"> Logout</a>
<br>

<body class="w3-light-grey">
<!-- add w3 container -->
<div class="w3-container w3-margin-top">
<center><h1 class="w3-text-teal">Student Exercise Tracker</h1></center>
<p>Enter your exercise information below.</p>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="w3-container w3-card-4 w3-padding">
<label for="exercise">Exercise:</label>
<select name="exercise" class="w3-select w3-border">
<option value="bench press">Bench Press</option>
<option value="squat">Squat</option>
<option value="deadlift">Deadlift</option>
</select>
<label for="reps">Reps:</label>
<input type="number" name="reps" value="10" min="1" max="100" class="w3-input w3-border">
<label for="sets">Sets:</label>
<input type="number" name="sets" value="3" min="1" max="10" class="w3-input w3-border">
<label for="recovery">Recovery:</label>
<select name="recovery" class="w3-select w3-border">
<option value="minutes">Minutes</option>
<option value="seconds">Seconds</option>
</select>
<label for="calories">Calories:</label>
<input type="number" name="calories" value="425" min="1" max="1000" class="w3-input w3-border">
<label for="exercise2">Exercise:</label>
<select name="exercise2" class="w3-select w3-border">
<option value="elliptical">Elliptical</option>
<option value="treadmill">Treadmill</option>
<option value="bike">Bike</option>
</select>
<label for="duration">Duration:</label>
<input type="number" name="duration" value="30" min="1" max="60" class="w3-input w3-border">
<label for="calories2">Calories:</label>
<input type="number" name="calories2" value="350" min="1" max="1000" class="w3-input w3-border">


<input type="submit" value="Save"  class="w3-button w3-teal w3-margin-top" >
</form>
</div>
  
<?php
// Check if the form was submitted
if (isset($_POST['exercise']) && isset($_POST['reps']) && isset($_POST['sets']) && isset($_POST['recovery']) && isset($_POST['calories']) && isset($_POST['exercise2']) && isset($_POST['duration']) && isset($_POST['calories2'])) {
// Get the form data
$exercise = $_POST['exercise'];
$reps = $_POST['reps'];
$sets = $_POST['sets'];
$recovery = $_POST['recovery'];
$calories = $_POST['calories'];
$exercise2 = $_POST['exercise2'];
$duration = $_POST['duration'];
$calories2 = $_POST['calories2'];

// Calculate the total calories burned
$totalCalories = $calories + $calories2;

// Get the burned calories target
$burnedCaloriesTarget = getBurnedCaloriesTarget();

// Calculate the remaining calories
$remainingCalories = $burnedCaloriesTarget - $totalCalories;

// Output the results


echo "<h2>Exercise Information</h2>";
echo "<ul>";
echo "<li>Exercise: $exercise</li>";
echo "<li>Reps: $reps</li>";
echo "<li>Sets: $sets</li>";
echo "<li>Recovery: $recovery</li>";
echo "<li>Calories: $calories</li>";
echo "<li>Exercise: $exercise2</li>";
echo "<li>Duration: $duration</li>";
echo "<li>Calories: $calories2</li>";
echo "</ul>";

echo "<br>Total Calories Burned: $totalCalories";
echo "<br>Burned Calories Target: $burnedCaloriesTarget";
echo "<br>Remaining Calories: $remainingCalories";
echo "<br><br><br>";
}

function getBurnedCaloriesTarget() {
  // Get the user's weight in pounds
  $weightInPounds = getUserWeightInPounds();
  
  // Calculate the burned calories target based on the user's weight
  $burnedCaloriesTarget = $weightInPounds * 10;
  
  return $burnedCaloriesTarget;
  }
  
  function getUserWeightInPounds() {
  // In a real application, this function would retrieve the user's weight from a database or user profile
  // For the purposes of this exercise, we'll just return a hardcoded value
  return 150;
  }
  
  ?>
</div>

</body>


</html>
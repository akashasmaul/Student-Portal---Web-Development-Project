<!--
	daily neutrition goals page
-->

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
  <a href="exercise.php" class="w3-bar-item w3-button sector-heading ">Excercise Tracking</a> 
   <a href="food.php" class="w3-bar-item w3-button sector-heading active ">Food Diary </a> 
   <div class="w3-bar-block sub-sector">
    <a href="dng.php" class="w3-bar-item w3-button sub-subsector active">Daily Neutrition Goals</a> 
	<a href="calbymeal.php" class="w3-bar-item w3-button sub-subsector">Calories by Meals</a>  
    
    </div> 
   
   
</div>
<!-- Page Content -->
<div style="margin-left:35%">
<a href="portal.php" class="profile"> <?= $user['name'] ?></a>
<a href="logout.php" class="profile"> Logout</a>
<br>




   
<div class="w3-container">
		<h2 class="w3-text-black">Macros</h2>
    <h6 class="w3-text-grey">Please enter your macros</h6>
		<form action="../control/savedng.php" method="get">
			<label class="w3-text-black" for="carbs">Carbs:</label>
			<input class="w3-input w3-border w3-round" type="text" id="carbs" name="carbs"><br>

			<label class="w3-text-black" for="protein">Protein:</label>
			<input class="w3-input w3-border w3-round" type="text" id="protein" name="protein"><br>

			<label class="w3-text-black" for="fats">Fats:</label>
			<input class="w3-input w3-border w3-round" type="text" id="fats" name="fats"><br>

			<h2 class="w3-text-black">Consumed Calories Target</h2>
      <h6 class="w3-text-grey">Please enter your consumption goals</h6>

			<label class="w3-text-black" for="consumedCalories">Consumed Calories:</label>
			<input class="w3-input w3-border w3-round" type="text" id="consumedCalories" name="consumedCalories"><br>

      <h2 class="w3-text-black">Burned Calories Target</h2>
      <h6 class="w3-text-grey">Please enter a figure for your burned calories target</h6>

			<label class="w3-text-black" for="burnedCalories">Burned Calories:</label>
			<input class="w3-input w3-border w3-round" type="text" id="burnedCalories" name="burnedCalories"><br>

			<h2 class="w3-text-black">Weight Information</h2>

			<label class="w3-text-black" for="startingWeight">Starting Weight:</label>
			<input class="w3-input w3-border w3-round" type="text" id="startingWeight" name="startingWeight"><br>

			<label class="w3-text-black" for="currentWeight">Current Weight:</label>
			<input class="w3-input w3-border w3-round" type="text" id="currentWeight" name="currentWeight"><br>

			<label class="w3-text-black" for="goalWeight">Goal Weight:</label>
			<input class="w3-input w3-border w3-round" type="text" id="goalWeight" name="goalWeight"><br>

			<input class="w3-button w3-teal w3-round" type="submit" value="Save">
		</form>
	</div>


</body>
</html>
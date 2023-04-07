<!--
	calories by meal page
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
    <a href="dng.php" class="w3-bar-item w3-button sub-subsector ">Daily Neutrition Goals</a> 
	<a href="calbymeal.php" class="w3-bar-item w3-button sub-subsector active">Calories by Meals</a>  
    
    </div> 
   
   
</div>

<?php
$getfile = file_get_contents('../data/storage.json');
$jsonfile = json_decode($getfile);
?>
<!-- Page Content -->
<div style="margin-left:35%">
<a href="portal.php" class="profile"> <?= $user['name'] ?></a>
<a href="logout.php" class="profile"> Logout</a>
<br>

<h1>Daily Meal Tracker</h1>
	
		<h2>Breakfast</h2>
		
		<table class="w3-table-all w3-margin-top">
			<tr>
				<th>Name</th>
				<th>Serving size (g)</th>
				<th>Calories (kcal)</th>
				<th>Carbs (g)</th>
				<th>Protein (g)</th>
				<th>Fats (g)</th>
			</tr>
			<tbody>
	    <?php foreach ($jsonfile->food as $index => $obj): ?>
	        <tr>
	            <td><?php echo $obj->name; ?></td>
	            <td><?php echo $obj->quantity; ?></td>
	            <td><?php echo $obj->kcal; ?></td>
	            <td><?php echo $obj->carbs; ?></td>
				<td><?php echo $obj->protein; ?></td>
	            <td><?php echo $obj->fats; ?></td>
	            <td>
	                <a href="editfood.php?id=<?php echo $index; ?>" class="w3-button w3-blue">Edit</a>
	                <a href="delete.php?id=<?php echo $index; ?>" class="w3-button w3-red">Delete</a>
	            </td>
	        </tr>
	    <?php endforeach; ?>
	    </tbody>
		</table>
		<a class="w3-button w3-green" href="addbreakfast.php">Add Breakfast</a>

		<br><br>

		
		

</body>
</html>
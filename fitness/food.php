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
  <a href="exercise.php" class="w3-bar-item w3-button sector-heading ">Excercise Tracking</a> 
   <a href="food.php" class="w3-bar-item w3-button sector-heading active ">Food Diary </a>  
   
   
</div>
<!-- Page Content -->
<div style="margin-left:35%">
<a href="../portal/portal.php" class="profile"> <?= $user['name'] ?></a>
<a href="../logout/logout.php" class="profile"> Logout</a>
<br>

<?php
$getfile = file_get_contents('storage.json');
$jsonfile = json_decode($getfile);
?>
<div class="w3-container">
	<a class="w3-button w3-green" href="add.php">Add</a>
	<table class="w3-table-all w3-margin-top">
	    <thead>
	        <tr class="w3-green">
	            <th>Name</th>
	            <th>Quantity</th>
	            <th>Kcal</th>
	            <th>Notes</th>
	            <th>Time</th>
	            <th></th>
	        </tr>
	    </thead>
	    <tbody>
	    <?php foreach ($jsonfile->food as $index => $obj): ?>
	        <tr>
	            <td><?php echo $obj->name; ?></td>
	            <td><?php echo $obj->quantity; ?></td>
	            <td><?php echo $obj->kcal; ?></td>
	            <td><?php echo $obj->notes; ?></td>
	            <td><?php echo $obj->time; ?></td>
	            <td>
	                <a href="edit.php?id=<?php echo $index; ?>" class="w3-button w3-blue">Edit</a>
	                <a href="delete.php?id=<?php echo $index; ?>" class="w3-button w3-red">Delete</a>
	            </td>
	        </tr>
	    <?php endforeach; ?>
	    </tbody>
	</table>
</div>
  

</div>

</body>
</html>
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

//reading saved meal information

<?php

$getfile = file_get_contents('../data/storage.json');
$jsonfile = json_decode($getfile);
?>

<?php
$getfiles = file_get_contents('../data/lunch.json');
$jsonfiles = json_decode($getfiles);
?>

<?php
$getfiless = file_get_contents('../data/dinner.json');
$jsonfiless = json_decode($getfiless);
?>

<?php
$getfilesss = file_get_contents('../data/snacks.json');
$jsonfilesss = json_decode($getfilesss);
?>

// calculating consumed data
<?php
foreach ($jsonfile->food as $index => $obj):
$calbreakfast = $obj->kcal;
$carbsbreakfast = $obj->carbs;
$proteinbreakfast = $obj->protein;
$fatsbreakfast = $obj->fats;
endforeach;

foreach ($jsonfiles->lunch as $index2 => $objs):
$callunch = $objs->kcal;
$carbslunch = $objs->carbs;
$proteinlunch = $objs->protein;
$fatslunch = $objs->fats;
endforeach;

foreach ($jsonfiless->dinner as $index3 => $objss):
$caldinner = $objss->kcal;
$carbsdinner = $objss->carbs;
$proteindinner = $objss->protein;
$fatsdinner = $objss->fats;
endforeach;

foreach ($jsonfilesss->snacks as $index4 => $objsss):
$calsnacks = $objsss->kcal;
$carbssnacks = $objsss->carbs;
$proteinsnacks = $objsss->protein;
$fatssnacks = $objsss->fats;
endforeach;

$consumedCal = $calbreakfast + $callunch + $caldinner + $calsnacks ;
$consumedCarbs = $carbsbreakfast + $carbslunch + $carbsdinner + $carbssnacks ;
$consumedpro = $proteinbreakfast + $proteinlunch + $proteindinner + $proteinsnacks ;
$consumedfats = $fatsbreakfast + $fatslunch + $fatsdinner + $fatssnacks ;

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

<h2>Lunch</h2>
		
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
	    <?php foreach ($jsonfiles->lunch as $index2 => $objs): ?>
	        <tr>
	            <td><?php echo $objs->name; ?></td>
	            <td><?php echo $objs->quantity; ?></td>
	            <td><?php echo $objs->kcal; ?></td>
	            <td><?php echo $objs->carbs; ?></td>
				<td><?php echo $objs->protein; ?></td>
	            <td><?php echo $objs->fats; ?></td>
	            <td>
	                <a href="editlunch.php?id=<?php echo $index2; ?>" class="w3-button w3-blue">Edit</a>
	                <a href="deletelunch.php?id=<?php echo $index2; ?>" class="w3-button w3-red">Delete</a>
	            </td>
	        </tr>
	    <?php endforeach; ?>
	    </tbody>
		</table>
		<a class="w3-button w3-green" href="addlunch.php">Add Lunch</a>

		<h2>Dinner</h2>
		
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
	    <?php foreach ($jsonfiless->dinner as $index3 => $objss): ?>
	        <tr>
	            <td><?php echo $objss->name; ?></td>
	            <td><?php echo $objss->quantity; ?></td>
	            <td><?php echo $objss->kcal; ?></td>
	            <td><?php echo $objss->carbs; ?></td>
				<td><?php echo $objss->protein; ?></td>
	            <td><?php echo $objss->fats; ?></td>
	            <td>
	                <a href="editdinner.php?id=<?php echo $index3; ?>" class="w3-button w3-blue">Edit</a>
	                <a href="deletedinner.php?id=<?php echo $index3; ?>" class="w3-button w3-red">Delete</a>
	            </td>
	        </tr>
	    <?php endforeach; ?>
	    </tbody>
		</table>
		<a class="w3-button w3-green" href="adddinner.php">Add Dinner</a>

		<h2>Snacks</h2>
		
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
	    <?php foreach ($jsonfilesss->snacks as $index4 => $objsss): ?>
	        <tr>
	            <td><?php echo $objsss->name; ?></td>
	            <td><?php echo $objsss->quantity; ?></td>
	            <td><?php echo $objsss->kcal; ?></td>
	            <td><?php echo $objsss->carbs; ?></td>
				<td><?php echo $objsss->protein; ?></td>
	            <td><?php echo $objsss->fats; ?></td>
	            <td>
	                <a href="editsnacks.php?id=<?php echo $index4; ?>" class="w3-button w3-blue">Edit</a>
	                <a href="deletesnacks.php?id=<?php echo $index4; ?>" class="w3-button w3-red">Delete</a>
	            </td>
	        </tr>
	    <?php endforeach; ?>
	    </tbody>
		</table>
		<a class="w3-button w3-green" href="addsnacks.php">Add Snacks</a>

		<br><br>
<?php 


//  generating daily targets data from daily nrutrition goals page
try {
    $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Get user information from database
$query = "SELECT * FROM dng ORDER BY id DESC LIMIT 1";
$result = $conn->query($query);
$userInfo = $result->fetch(PDO::FETCH_ASSOC);

//taking values into variables 
$targetcal = $userInfo['consumedCalories'];
$targetpro = $userInfo['protein'];
$targetcarbs = $userInfo['carbs'];
$targetfats = $userInfo['fats'];

// calculating remaining targets
$remcal = $targetcal - $consumedCal ;
$remcarbs = $targetcarbs - $consumedCarbs ;
$rempro = $targetpro - $consumedpro ;
$remfats = $targetfats - $consumedfats ;
?>
		<table class="w3-table-all">
  <thead>
    <tr class="w3-blue">
      <th>Total</th>
      
      <th>Calories</th>
      <th>Carbs</th>
      <th>Protein</th>
      <th>Fats</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td rowspan="2">Daily Targets</td>
      <td><?php echo $targetcal ?></td>
      <td><?php echo $targetcarbs ?></td>
      <td><?php echo $targetpro ?></td>
      <td><?php echo $targetfats ?></td>
    </tr>
    <tr>
      <td colspan="4"></td>
    </tr>
    <tr>
      <td rowspan="2">Consumed</td>
      <td colspan="4"></td>
    </tr>
    <tr>
      <td><?php echo $consumedCal ?> </td>
      <td><?php echo $consumedCarbs ?></td>
      <td><?php echo $consumedpro ?></td>
      <td><?php echo $consumedfats ?></td>
      
    </tr>

	<tr>
      <td rowspan="2">Remaining</td>
      <td colspan="4"></td>
    </tr>
    <tr>
      <td><?php echo $remcal ?> </td>
      <td><?php echo $remcarbs ?></td>
      <td><?php echo $rempro ?></td>
      <td><?php echo $remfats ?></td>
      
    </tr>
  </tbody>
</table>
<br><br>
</body>
</html>
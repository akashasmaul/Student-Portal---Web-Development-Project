<! --
Add a food details  breakfast

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
<!-- Page Content -->
<div style="margin-left:35%">
<a href="portal.php" class="profile"> <?= $user['name'] ?></a>
<a href="logout.php" class="profile"> Logout</a>
<br>

<div class="w3-container">
    <form class="w3-container" action="addlunch.php" method="POST">
        <label>Name:</label>
        <input class="w3-input" type="text" name="name" size="50" placeholder="Name"/><br>

        <label>Serving size (g):</label>
    <input class="w3-input" type="text" name="quantity" size="50" maxlength="4" placeholder="Quantity"/><br>

    <label>Calories (kcal):</label>
    <input class="w3-input" type="text" name="kcal" size="50" maxlength="4" placeholder="Kcal"/><br>

    <label>Carbs (g):</label>
    <input class="w3-input" type="text" name="carbs" size="50" placeholder="gram"/><br>
    
    <label>Protein (g):</label>
    <input class="w3-input" type="text" name="protein" size="50" placeholder="gram"/><br>

    <label>Fats (g):</label>
    <input class="w3-input" type="text" name="fats" size="50" ><br>

    <input class="w3-button w3-green" type="submit" name="addl" value="Add"/>
    <button type="button" class="w3-button w3-red" onclick="cancel()">Cancel</button>
</form>
</div>



<?php
if (isset($_POST["addl"])) {
    $file = file_get_contents('../data/lunch.json');
    $data = json_decode($file, true);
    unset($_POST["addl"]);
    $data["lunch"] = array_values($data["lunch"]);
    array_push($data["lunch"], $_POST);
    file_put_contents("../data/lunch.json", json_encode($data));
    header("Location: calbymeal.php");
}
?>
  
</div>


<script>
        function cancel() {
            window.location.href = "calbymeal.php";
        }
        </script>
</body>
</html>




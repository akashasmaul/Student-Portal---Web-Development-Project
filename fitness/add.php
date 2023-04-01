

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

<div class="w3-container">
    <form class="w3-container" action="add.php" method="POST">
        <label>Name:</label>
        <input class="w3-input" type="text" name="name" size="50" placeholder="Name"/><br>

        <label>Quantity:</label>
    <input class="w3-input" type="text" name="quantity" size="50" maxlength="2" placeholder="Quantity"/><br>

    <label>Kcal:</label>
    <input class="w3-input" type="text" name="kcal" size="50" maxlength="4" placeholder="Kcal"/><br>

    <label>Notes:</label>
    <input class="w3-input" type="text" name="notes" size="50" placeholder="Notes"/><br>

    <label>Time:</label>
    <input class="w3-input" type="text" name="time" size="50" placeholder="D.M.Y-H:M"/><br>

    <input class="w3-button w3-green" type="submit" name="add" value="Add"/>
    <button type="button" class="w3-button w3-red" onclick="cancel()">Cancel</button>
</form>
</div>



<?php
$time = date("d.m.Y-H:i");
if (isset($_POST["add"])) {
    $file = file_get_contents('storage.json');
    $data = json_decode($file, true);
    unset($_POST["add"]);
    $data["food"] = array_values($data["food"]);
    array_push($data["food"], $_POST);
    file_put_contents("storage.json", json_encode($data));
    header("Location: food.php");
}
?>
  
</div>


<script>
        function cancel() {
            window.location.href = "food.php";
        }
        </script>
</body>
</html>




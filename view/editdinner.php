
<! --
edit food  record breakfast

 --!>
<?php
if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $getfile = file_get_contents('../data/dinner.json');
    $jsonfile = json_decode($getfile, true);
    $jsonfile = $jsonfile["dinner"];
    $jsonfile = $jsonfile[$id];
}

if (isset($_POST["id"])) {
    $id = (int) $_POST["id"];
    $getfile = file_get_contents('../data/dinner.json');
    $all = json_decode($getfile, true);
    $jsonfile = $all["dinner"];
    $jsonfile = $jsonfile[$id];

    $post["name"] = isset($_POST["name"]) ? $_POST["name"] : "";
    $post["quantity"] = isset($_POST["quantity"]) ? $_POST["quantity"] : "";
    $post["kcal"] = isset($_POST["kcal"]) ? $_POST["kcal"] : "";
    $post["carbs"] = isset($_POST["carbs"]) ? $_POST["carbs"] : "";
    $post["protein"] = isset($_POST["protein"]) ? $_POST["protein"] : "";
    $post["fats"] = isset($_POST["fats"]) ? $_POST["fats"] : "";



    if ($jsonfile) {
        unset($all["dinner"][$id]);
        $all["dinner"][$id] = $post;
        $all["dinner"] = array_values($all["dinner"]);
        file_put_contents("../data/dinner.json", json_encode($all));
    }
    header("Location: calbymeal.php");
}
?>




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
<br><br><br><br>

<?php if (isset($_GET["id"])): ?>
    <form class="w3-container w3-card-4 w3-light-grey" action="editdinner.php" method="POST">
    <br>
        <input type="hidden" value="<?php echo $id ?>" name="id"/>
        <label class="w3-text-black">Name</label>
        <input class="w3-input w3-border" type="text" value="<?php echo $jsonfile["name"] ?>" name="name"/>
        <label class="w3-text-black">Serving size (g)</label>
        <input class="w3-input w3-border" type="text" value="<?php echo $jsonfile["quantity"] ?>" name="quantity"/>
        <label class="w3-text-black">Calories (kcal)</label>
        <input class="w3-input w3-border" type="text" value="<?php echo $jsonfile["kcal"] ?>" name="kcal"/>
        <label class="w3-text-black">Carbs (g)</label>
        <input class="w3-input w3-border" type="text" value="<?php echo $jsonfile["carbs"] ?>" name="carbs"/>
        <label class="w3-text-black">Protein (g)</label>
        <input class="w3-input w3-border" type="text" value="<?php echo $jsonfile["protein"] ?>" name="protein"/>
        <label class="w3-text-black">Protein (g)</label>
        <input class="w3-input w3-border" type="text" value="<?php echo $jsonfile["fats"] ?>" name="fats"/>
        <br>
        <button class="w3-btn w3-green" type="submit">Save</button>
        <button type="button" class="w3-button w3-red" onclick="cancel()">Cancel</button>
        <br><br>
    </form>
<?php endif; ?>




<?php
if (isset($_POST["add2"])) {
    $file = file_get_contents('../data/dinner.json');
    $data = json_decode($file, true);
    unset($_POST["add2"]);
    $data["dinner"] = array_values($data["dinner"]);
    array_push($data["dinner"], $_POST);
    file_put_contents("../data/dinner.json", json_encode($data));
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





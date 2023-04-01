<?php
if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $getfile = file_get_contents('storage.json');
    $jsonfile = json_decode($getfile, true);
    $jsonfile = $jsonfile["food"];
    $jsonfile = $jsonfile[$id];
}

if (isset($_POST["id"])) {
    $id = (int) $_POST["id"];
    $getfile = file_get_contents('storage.json');
    $all = json_decode($getfile, true);
    $jsonfile = $all["food"];
    $jsonfile = $jsonfile[$id];

    $post["name"] = isset($_POST["name"]) ? $_POST["name"] : "";
    $post["quantity"] = isset($_POST["quantity"]) ? $_POST["quantity"] : "";
    $post["kcal"] = isset($_POST["kcal"]) ? $_POST["kcal"] : "";
    $post["notes"] = isset($_POST["notes"]) ? $_POST["notes"] : "";
    $post["time"] = isset($_POST["time"]) ? $_POST["time"] : "";



    if ($jsonfile) {
        unset($all["food"][$id]);
        $all["food"][$id] = $post;
        $all["food"] = array_values($all["food"]);
        file_put_contents("storage.json", json_encode($all));
    }
    header("Location: food.php");
}
?>




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
<br><br><br><br>

<?php if (isset($_GET["id"])): ?>
    <form class="w3-container w3-card-4 w3-light-grey" action="edit.php" method="POST">
    <br>
        <input type="hidden" value="<?php echo $id ?>" name="id"/>
        <label class="w3-text-black">Name</label>
        <input class="w3-input w3-border" type="text" value="<?php echo $jsonfile["name"] ?>" name="name"/>
        <label class="w3-text-black">Quantity</label>
        <input class="w3-input w3-border" type="text" value="<?php echo $jsonfile["quantity"] ?>" name="quantity"/>
        <label class="w3-text-black">Kcal</label>
        <input class="w3-input w3-border" type="text" value="<?php echo $jsonfile["kcal"] ?>" name="kcal"/>
        <label class="w3-text-black">Notes</label>
        <input class="w3-input w3-border" type="text" value="<?php echo $jsonfile["notes"] ?>" name="notes"/>
        <label class="w3-text-black">Time</label>
        <input class="w3-input w3-border" type="text" value="<?php echo $jsonfile["time"] ?>" name="time"/>
        <br>
        <button class="w3-btn w3-green" type="submit">Save</button>
        <button type="button" class="w3-button w3-red" onclick="cancel()">Cancel</button>
        <br><br>
    </form>
<?php endif; ?>




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





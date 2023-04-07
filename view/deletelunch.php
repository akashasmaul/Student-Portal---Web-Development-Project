
<! --
for deleting a food record lunch
 --!>
<?php

if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $all = file_get_contents('../data/lunch.json');
    $all = json_decode($all, true);
    $jsonfile = $all["lunch"];
    $jsonfile = $jsonfile[$id];

    if ($jsonfile) {
        unset($all["lunch"][$id]);
        $all["lunch"] = array_values($all["lunch"]);
        file_put_contents("../data/lunch.json", json_encode($all));
    }
    header("Location: calbymeal.php");
}
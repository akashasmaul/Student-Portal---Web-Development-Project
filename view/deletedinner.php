
<! --
for deleting a food record dinner
 --!>
<?php

if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $all = file_get_contents('../data/dinner.json');
    $all = json_decode($all, true);
    $jsonfile = $all["dinner"];
    $jsonfile = $jsonfile[$id];

    if ($jsonfile) {
        unset($all["dinner"][$id]);
        $all["dinner"] = array_values($all["dinner"]);
        file_put_contents("../data/dinner.json", json_encode($all));
    }
    header("Location: calbymeal.php");
}

<! --
for deleting a food record snacks
 --!>
<?php

if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $all = file_get_contents('../data/snacks.json');
    $all = json_decode($all, true);
    $jsonfile = $all["snacks"];
    $jsonfile = $jsonfile[$id];

    if ($jsonfile) {
        unset($all["snacks"][$id]);
        $all["snacks"] = array_values($all["snacks"]);
        file_put_contents("../data/snacks.json", json_encode($all));
    }
    header("Location: calbymeal.php");
}
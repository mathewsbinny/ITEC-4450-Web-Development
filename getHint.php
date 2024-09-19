<?php
    $NameList = array("Anna", "Brittany", "Cinderella", "Diana", "Eva", "Fiona", "Gunda", 
    "Hege", "Inga", "Johanna", "Kitty", "Linda", "Nina", "Ophelia", "Petunia", 
    "Amanda", "Raquel", "Cindy", "Doris", "Eve", "Evita", "Sunniva", "Tove", "Unni", 
    "Violet", "Liza", "Elizabeth", "Ellen", "Wenche", "Vicky", "Andy", "Danny","Brady", "Ace");

    $query = $_GET["q"];
    $hint="";
    if($query !== "") {
        $query = strtolower($query);
        $len = strlen($query);
        for($i=0; $i<count($NameList); $i++) {
            if($query == strtolower(substr($NameList[$i], 0, $len))) {
                $hint = $hint."<div class='menu' style='width:100%;' onclick = selectMe('".$NameList[$i]."')>".$NameList[$i]."</div>";
            }
        }
    }
    echo $hint;
?>
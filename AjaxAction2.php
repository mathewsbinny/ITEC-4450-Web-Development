<?php
    //used to simulate percentage
    $p=$_GET["cp"];
    $p += rand(0,2);
    //simulate the process assuming Internet speed is not always consistent
    //inclusive
    if($p > 100) {
        $p = 100;
    }
    echo $p;
?>
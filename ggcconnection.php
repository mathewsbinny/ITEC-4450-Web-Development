<?php
    $hostname="localhost";
    $username="mbinnydo_mathewsbinny";
    $password="orangejuice926";
    $dbname="mbinnydo_4450_registration";

    $dbc=mysqli_connect($hostname, $username, $password, $dbname) OR die("Cannot connect database, error...");

    echo "Connected to the database ".$dbname." successfully! <br>";
?>
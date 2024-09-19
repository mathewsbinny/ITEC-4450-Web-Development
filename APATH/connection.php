<?php
    $hostname="localhost";
    $username="root";
    $password="";
    $dbname="itec4450";

    $dbc=mysqli_connect($hostname, $username, $password, $dbname) OR die("Cannot connect database, error...");

    echo "Connected to the database ".$dbname." successfully! <br>";
?>
<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        //echo "My ID inside POST method is ".$id."<br>";
        include "connection.php";

        $id = $_POST["id"];
        $newfirstname = mysqli_real_escape_string($dbc, trim($_POST["firstname"]));
        $newlastname = mysqli_real_escape_string($dbc, trim($_POST["lastname"]));
        $newemail = mysqli_real_escape_string($dbc, trim($_POST["email"]));


    }
    $qs = "DELETE FROM users WHERE id=$id";
    mysqli_query($dbc, $qs);
    echo "This user with ".$newemail." has been successfully deleted!";
    echo "<br> Please <a href='admin_display.php'> click here </a> to go back <br>";

?>
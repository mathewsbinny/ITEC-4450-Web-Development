<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        //echo "My ID inside POST method is ".$id."<br>";
        include "connection.php";
        $id = $_POST["id"];
        $newfirstname = mysqli_real_escape_string($dbc, trim($_POST["firstname"]));
        $newlastname = mysqli_real_escape_string($dbc, trim($_POST["lastname"]));
        $newemail = mysqli_real_escape_string($dbc, trim($_POST["email"]));
        $newphone = mysqli_real_escape_string($dbc, trim($_POST["phone"]));
        $newmajor = mysqli_real_escape_string($dbc, trim($_POST["major"]));
        $newpass = mysqli_real_escape_string($dbc, trim($_POST["pass"]));

        //build query statement 
        $qs="UPDATE users SET firstname='$newfirstname', lastname='$newlastname', email='$newemail', phone='$newphone', major='$newmajor', pw='$newpass' WHERE id='$id'";
        echo "Update statement is ".$qs."<br>";
        //run the query
        mysqli_query($dbc,$qs);
        //1 row should be affected
        if(mysqli_affected_rows($dbc)==1) {
            echo "You have updated the user successfully!";
            echo "<br> Please <a href='admin_display.php'> click here </a> to go back <br>";
        } else {
            echo "Something is wrong";
        }
    }
?>
<?php
    session_start();
    //$id="";
    //$id = $_SESSION["id"];
    //echo "Session ID is ".$id."<br>"; // for developer

    session_unset();
    session_destroy();

    $_SESSION = array();
    //go to index.php
    header("Location: index.php");
?>
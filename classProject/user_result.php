<?php
    session_start();
    $id="";
    $id = $_SESSION["id"];
    echo "Session ID is ".$id."<br>"; // for developer
?>

<html>
    <head>
        <title>Online Test - Test Results</title>
        <style>
            .error {color:#FF0000;}
        </style>
    </head>
    <body>
        <h2>Welcome to the FREE online test</h2>
        <?php
            include "user_nav.php";
        ?>

        <h3>Here are your assessment results.</h3>
        <p>The result of all four quizzes to be displayed in the table:</p>
        <?php
            include "connection.php";
            $qs="SELECT * FROM users WHERE id=$id";
            //echo $qs for developers
            $qresult=mysqli_query($dbc, $qs);
            $numrows = mysqli_num_rows($qresult);
            if($numrows==1) {
                $row = mysqli_fetch_array($qresult);
                $php=$row["quiz1"]; //make sure you match your database column name
                $sql=$row["quiz2"];
                $htmlcss=$row["quiz3"];
                $js=$row["quiz4"];

                echo "<br>";
                echo "<table>";
                    echo "<tr>";
                        echo "<td> Name: ".$row["firstname"]." ".$row["lastname"]."<br>";
                            echo "</td>";
                        //echo "<td> PHP Quiz Result: ".$php."<br>";
                            //echo "</td>";
                        //echo "<td> SQL Quiz Result: ".$sql."<br>";
                            //echo "</td>";
                        //echo "<td> HTML/CSS Quiz Result: ".$htmlcss."<br>";
                            //echo "</td>";
                        //echo "<td> PHP Quiz Result: ".$js."<br>";
                            //echo "</td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td> PHP Quiz Result: ".$php."<br>";
                            echo "</td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td> SQL Quiz Result: ".$sql."<br>";
                            echo "</td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td> HTML/CSS Quiz Result: ".$htmlcss."<br>";
                            echo "</td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td> PHP Quiz Result: ".$js."<br>";
                            echo "</td>";
                    echo "</tr>";
                echo "</table>";

                echo "<br><br><br><br>";
                $average = ($php + $sql + $htmlcss + $js)/4;
                if($average >= 90) {
                    $msg =  "Your overall skill level in Web Development is excellent!<br>
                            I would reccomend you to browse the available positions on our website and start to apply.<br>";
                } else if($average >= 80) {
                    $msg =  "Your overall skill level in Web Development is OK.<br>";
                } else if($average >= 70) {
                    $msg =  "Your overall skill level in Web Development could be improved.<br>";
                } else {
                    $msg =  "You have a beginner level skill level in Web Development.<br>
                            We would reccommend you to continue learning using the resources on our website<br>";
                }

                echo $msg;
            }
        ?>
    </body>
</html>
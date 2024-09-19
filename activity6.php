<html>
    <head>
        <title>Activity 6 Jan 30</title>
    </head>
    <body>
        <h1>Activity 6</h1>
        <p>Submitted by Mathews Binny</p>
        <?php
            $students=array(
                array("Mike",22,"male"),
                array("Jenny",20,"female"),
                array("Josh",18,"male"),
                array("Susan",21,"female")
            );

            echo "Display 2D Array in a Table";
            echo "<table border='1' style='width:40%;margin:auto;'>";
                echo "<tr>  <td>Name</td>   <td>Age</td>    <td>Gender</td>    </tr>";
                foreach($students as $row=>$person){
                    echo "<tr>";
                    foreach($person as $value) {
                        echo "<td>";
                        echo "$value";
                        echo "</td>";
                    }
                    echo "</tr>";
                }
            echo "</table>";

            echo "Searching through the 2D array to find Jenny<br>";
            $name = "Jenny";
            foreach($students as $person) {
                if ($name == $person[0]) {
                    echo "Name: ".$person[0];
                    echo "<br>Age: ".$person[1];
                    echo "<br>Gender: ".$person[2];
                }
            }

            $students[10]=array("Jason",22,"male"); //php is flexible with index
            $students[11]=array("Megan",18,"female");
            echo "<br><br><br>Searching for the youngest student<br>";
            $youngest = $students[0][1];
            foreach($students as $index=>$person) {
                if($person[1]<$youngest)
                    $youngest = $person[1];
            }
            echo "The youngest age is: ".$youngest;
            //display the information about the person with the youngest age
            //echo "<br>Display the student with the youngest age<br>";
            //update the array students[10] age from 21 to 22 && students[11] age from 19 to 18
            echo "<br>Display all the students with the youngest age<br>";
            $found=0;
            foreach($students as $person) {
                if($person[1] == $youngest) {
                    $found++;
                    echo "Student ".$person[0]." has age ".$person[1].", and is ".$person[2]."<br>";
                }
            }
            echo "Total ".$found." student(s) has been found with age ".$youngest.".<br><br><br>";


            echo "Find the oldest age of the students <br>";
            $oldest = $students[0][1];
            foreach($students as $index=>$person) {
                if($person[1]>$oldest)
                    $oldest = $person[1];
            }
            echo "The oldest age is: ".$oldest;
            echo "<br>Display all the students with the oldest age<br>";
            $found=0;
            foreach($students as $person) {
                if($person[1] == $oldest) {
                    $found++;
                    echo "Student ".$person[0]." has age ".$person[1].", and is ".$person[2]."<br>";
                }
            }
            echo "Total ".$found." student(s) has been found with age ".$oldest.".<br><br><br>";

            echo "Find all the male students and display their names and age<br>";
            $found = 0;
            foreach($students as $person) {
                if($person[2] == "male") {
                    $found++;
                    echo "Student ".$person[0]." has age ".$person[1]."<br>";
                }
            }
            echo "Total how many male students<br>";
            echo "There are ".$found." male students<br><br><br>";

            echo "Find all the female students less than or equal to 20 years of age<br>";
            foreach($students as $person) {
                if($person[2] == "female" && $person[1] <=20) {
                    $found++;
                    echo "Student ".$person[0]." has age ".$person[1]."<br>";
                }
            }
            echo "<br><br>Total how many found?<br>";
            echo "There are ".$found." total students found.<br>";
        ?>
    </body>
</html>

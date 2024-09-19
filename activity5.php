<html>
    <head>
        <title>Activity 5</title>
    </head>
    <body>
        <h1>Activity 5</h1>
        <p>Submitted by Mathews Binny</p>

        <h2>Using Array</h2>
        <?php
            $cars = array("Lexus", "BMW", "Audi");
            //access the array at index
            echo "After graduation, I want to have a ".$cars[0].".<br>";

            $friends[0] = "Abel";
            $friends[1] = "Anish";
            $friends[2] = "Karan";
            $friends[3] = "Tobenna";
            $friends[4] = "Timothy"; //last index is size-1

            echo "<p>Using Loop for Array</p>";
            for($i=0; $i<count($friends); $i++) {
                echo "Friend Number ".$i." is ".$friends[$i]."<br>";
            }

            echo"<p>Looping Using Associative Array</p>";
            //define associative array
            $SID["Abel"] = "9001234";
            $SID["Anish"] = "9004321";
            $SID["Karan"] = "9005678";
            $SID["Tobenna"] = "9008765";
            $SID["Timothy"] = "9009999";

            foreach($SID as $name=>$id) {
                echo "Student ID of ".$name." is ".$id."<br>";
            }

            echo "<hr>";
            echo "<p>Define Another Associative Array</p>";
            $salary = array("Abel"=>300000, "Anish"=>90000, "Karan"=>95000, "Tobenna"=>85000, "Timothy"=>65000);

            $sum = 0;
            foreach($salary as $payment){
                $sum+=$payment;
            }
            echo "The total salary is $".$sum.".<br>";

            echo "Find the highest paid employee: <br>";
            $topSalary = $salary["Abel"];
            $lowestSalary = $salary["Abel"];
            $topPerson = "Abel";
            $lowestPerson = "Abel";
            foreach($salary as $name=>$payment) {
                if($payment > $topSalary) {
                    $topSalary = $payment;
                    $topPerson = $name;
                }
            if($payment < $topSalary) {
                    $lowestSalary = $payment;
                    $lowestPerson = $name;
                }
            }
            echo $topPerson." has the highest salary, which is ".$topSalary."<br>";

            echo "Find the lowest paid employee: <br>";
            echo $lowestPerson." has the lowest salary, which is ".$lowestSalary."<br>";
        ?>
        <hr>

        <h2>About 2D Array</h2>
        <?php
            $students=array(
                    array("Abel", 22, "Male"),
                    array("Mariam", 23, "Female"),
                    array("Felina", 23, "Female"),
                    array("Kevin", 24, "Male"),
                    array("Timothy", 25, "Male")
            );
            for($row=0; $row<count($students); $row++) {
                echo "<p>Student No. ".($row+1)."</p>";
                echo "<ul>";
                    for($col=0; $col<count($students[$row]); $col++) {
                        echo "<li>".$students[$row][$col]."</li>";
                    }
                echo "</ul>";
            }
        ?>
    </body>
</html>
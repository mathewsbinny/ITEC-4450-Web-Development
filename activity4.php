<html>
    <head>
        <title>Activity 4 Jan 23</title>
    </head>
    <body>
        <h1>Activity 4</h1>
        <p>Submitted by Mathews Binny</p>
        <h2>Variable Scope</h2>
        <?php
            //global variable
            $x = 10;
            echo "The value of my global variable x is ".$x.".<br>";
            function myFunction() {
                //access the global variable inside a function
                echo "Accessing the global variable x inside a function".$x;
                echo " will generate a warning message. <br>";
                //accessing it after declaring it as a global variable
                global $x;
                echo "Accessing global variable x, the value is ".$x."<br><br>";
                //accessing a local variable
                $y = 20;
                echo "The value of the local variable y is ".$y."<br>";
            }
            myFunction();
            echo "Accessing the local variable y outide of the function".$y;
            echo " will generate a warning message. <br>";
        ?> 
        <h2>Using Looping to Build Tables</h2>
        <p>Table 1</p>
        <?php
            echo "You can access global variable from another section of the php.<br>";
            echo "The value for x is ".$x."<br>";

            $rowSize = 8;
            $columnSize = 8;
            $alternate = 0;
            echo "<table border='1' style='width:20%; margin:auto;'>";
                for($i=0; $i<$rowSize; $i++) {
                    echo "<tr>";
                        for($j=0; $j<$columnSize; $j++) {
                            if($j%2 == $alternate) 
                                echo "<td style='background-color:white'>";
                            else 
                                echo "<td style='background-color:black'>";
                                    echo $j;
                                echo "</td>";
                        }
                    $alternate = !$alternate;
                    echo "</tr>";
                }
            echo "</table>";
            echo "<hr>";
            echo "<p>Table 2</p>";
            $alternate = 1;
            echo "<table border='1' style='width:20%; margin:auto;'>";
                for($i=0; $i<$rowSize; $i++) {
                    echo "<tr>";
                        for($j=0; $j<$columnSize; $j++) {
                            if($j%2 == $alternate) 
                                echo "<td style='background-color:white'>";
                            else 
                                echo "<td style='background-color:black'>";
                                    echo $j;
                                echo "</td>";
                        }
                    $alternate = !$alternate;
                    echo "</tr>";
                }
            echo "</table>";
        ?>
        <hr>
        <p>Table 3: RGB</p>
        <?php
            $rowSize = 18;
            $columnSize = 18;
            $alternate = 0;
            echo "<table border='1' style='width:40%; margin:auto;'>";
                for($i=0; $i<$rowSize; $i++) {
                    echo "<tr>";
                        for($j=0; $j<$columnSize; $j++) {
                            if(($i+$j)%3 == 0) 
                                echo "<td style='background-color:red'>";
                            else if(($i+$j)%3 == 1)
                                echo "<td style='background-color:green'>";
                            else
                                echo "<td style='background-color:blue'>";
                                    echo "&nbsp";
                                echo "</td>";
                    }
                $alternate = !$alternate;
                echo "</tr>";
                }
            echo "</table>";
        ?>
        <hr>
        <p>Table 4: RGB & CMY</p>
        <?php
            $rowSize = 18;
            $columnSize = 18;
            $alternate = 0;
            echo "<table border='1' style='width:40%; margin:auto;'>";
                for($i=0; $i<$rowSize; $i++) {
                    echo "<tr>";
                        for($j=0; $j<$columnSize; $j++) {
                            if(($i+$j)%6 == 0) 
                                echo "<td style='background-color:red'>";
                            else if(($i+$j)%6 == 1)
                                echo "<td style='background-color:green'>";
                            else if(($i+$j)%6 == 2)
                                echo "<td style='background-color:blue'>";
                            else if(($i+$j)%6 == 3)
                                echo "<td style='background-color:magenta'>";
                            else if(($i+$j)%6 == 4)
                                echo "<td style='background-color:cyan'>";
                            else
                                echo "<td style='background-color:yellow'>";
                                    echo "&nbsp";
                                echo "</td>";
                    }
                $alternate = !$alternate;
                echo "</tr>";
                }
            echo "</table>";
        ?>
        <hr>
        <p>Table 5: Any Number of Colors</p>
        <?php
            $n = 6; //this defines the number of colors we want
            $myColor=array("yellow", "cyan", "magenta", "red", "green", "blue");
            echo "<table border='1' style='width:40%; margin:auto;'>";
                for($i=0; $i<$rowSize; $i++) {
                    echo "<tr>";
                        for($j=0; $j<$columnSize; $j++) {
                            /*if(($i+$j)%6 == 0) 
                                echo "<td style='background-color:red'>";
                            else if(($i+$j)%6 == 1)
                                echo "<td style='background-color:green'>";
                            else
                                echo "<td style='background-color:blue'>";
                            */
                            for($k=0;$k<$n;$k++)
                                if(($i+$j)%$n == $k)
                                    echo "<td style='background-color:".$myColor[$k]."'>";
                                echo "&nbsp";
                                echo "</td>";
                    }
                $alternate = !$alternate;
                echo "</tr>";
                }
            echo "</table>";
        ?>
    </body>
</html>
<html>
    <head>
        <title>Lab 2</title>
    </head>
    <body>
        <h1 style='text-align:center;'>Lab 2</h1>
        <p style='text-align:center;'>Submitted by Mathews Binny</p>
        <hr>
        <h2 style='text-align:center;'>Multiplication Table: RGB & CMY</h2>
        <?php
            $rowSize = rand(5,20);
            $columnSize = $rowSize;
            $alternate = 0;
            echo "<p style='text-align:center;'>This is a multiplication table of ".$rowSize."x".$rowSize."</p>";
            echo "<table border='1' style='width:auto; margin:auto;'>";
                for($i=0; $i<$rowSize; $i++) {
                    echo "<tr>";
                        for($j=0; $j<$columnSize; $j++) {
                            if(($i+$j)%6 == 0) 
                                echo "<td style='background-color:red;'>";
                            else if(($i+$j)%6 == 1)
                                echo "<td style='background-color:green;'>";
                            else if(($i+$j)%6 == 2)
                                echo "<td style='background-color:blue;'>";
                            else if(($i+$j)%6 == 3)
                                echo "<td style='background-color:magenta;'>";
                            else if(($i+$j)%6 == 4)
                                echo "<td style='background-color:cyan;'>";
                            else {
                                echo "<td style='background-color:yellow;'>";
                            }
                                echo ($j+1)*($i+1);
                                echo "</td>";
                    }
                $alternate = !$alternate;
                echo "</tr>";
                }
            echo "</table>";
        ?>
        <hr>
    </body>
</html>
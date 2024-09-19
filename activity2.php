<html>
    <head>
        <title>Activity 2</title>
    </head>
    <body>
        <h1>Activity 2</h1>
        <h2>While Loop</h2>
        <?php
            //while loop
            $x=1;
            while ($x<=6) {
                echo "The value for x is ".$x."<br>";
                $x++;
            }
            echo "The final value for x after the while-loop is ".$x."<br>";

            //for loop
            echo "<h2>For Loop</h2>";
            for($x=0; $x<100; $x+=10) {
                echo "The value for x is ".$x."<br>";
            }
            echo "The final value for x after the for-loop is ".$x."<br>";

            //2nd for loop
            echo "<p>The 2nd For Loop</p>";
            echo "The sum for 0+1+2+...+100 <br>";
            $sum=0;
            for($x=0; $x<=100; $x++) {
                echo $x." ";
                $sum = $sum+$x;
            }
            echo "<br>The sum from 0+1+2+...+100 = ".$sum;

            //nested loop
            echo "<h2>Nested Loop</h2>";
            for($row=0; $row<10; $row++) {
                for($column=0; $column<8; $column++) {
                    echo "*";
                }
                echo "<br>";
            }

            //2nd nested loop
            echo "The 2nd Nested Loop<br>";
            for($row=0; $row<10; $row++) {
                for($column=0; $column<$row+1; $column++) {
                    echo "*";
                }
                echo "<br>";
            }

            //3rd nested loop
            echo "The 3rd Nested Loop<br>";
            for($row=4; $row<10; $row++) {
                for($column=0; $column<$row+1; $column++) {
                    echo "*";
                }
                echo "<br>";
            }
        ?>
        <hr>
        <h2>Function</h2>
        <?php
            function drawTrapezoid($top, $bottom, $symbol) {
                for($row=$top; $row<$bottom; $row++) {
                    for($column=0; $column<$row+1; $column++) {
                        echo $symbol;
                    }
                    echo "<br>";
                }
            }

            drawTrapezoid(0, 10, "^");

        ?>
        <h2>Adding Style</h2>
        <?php
            echo "<div style='width:50%; margin:auto; background-color:blue; text-align:center; color:yellow;'>";
                drawTrapezoid(0, 10, "&");
            echo "</div>";
            echo "<hr>";

            echo "<div style='width:50%; margin:auto; background-color:blue; text-align:center; color:yellow; line-height:0.5;'>";
                drawTrapezoid(0, 10, "&");
            echo "</div>";
            echo "<hr>";

            echo "<div style='width:50%; margin:auto; background-color:blue; color:yellow; text-align:right;'>";
                drawTrapezoid(0, 10, "&");
            echo "</div>";
            echo "<hr>";
        ?>

        <h2>Table</h2>
        <?php
            echo "<table style='background-color:blue; color:yellow; width:50%; margin:auto;'>";
                echo "<tr>";
                    echo "<td>";
                        echo "<div style='width:50%; margin:auto; background-color:blue; color:yellow; text-align:center;'>";
                            drawTrapezoid(0, 10, "&");
                        echo "</div>";
                    echo "</td>";
                    echo "<td>";
                    echo "<div style='width:50%; margin:auto; background-color:blue; color:yellow; text-align:center;'>";
                        drawTrapezoid(0, 10, "&");
                    echo "</div>";
                echo "</td>";
                echo "</tr>";
            echo "</table>";
        ?>

        <p>Submitted by Mathews Binny</p>
    </body>
</html>
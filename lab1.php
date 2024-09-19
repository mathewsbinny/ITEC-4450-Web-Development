<html>
    <head>
        <title>Lab 1</title>
    </head>
    <body>
        <h2 style='text-align:center;'>Part 1: One Tree Displayed</h2>
            <?php
                function drawTrapezoid($top, $bottom, $symbol) {
                    for($row=$top; $row<$bottom; $row++) {
                        for($column=0; $column<$row+1; $column++) {
                            echo $symbol;
                        }
                        echo "<br>";
                    }
                }

                echo "<div style='width:75%; margin:auto; background-color:pink; text-align:center; color:red; line-height:0.50;'>";
                    drawTrapezoid(0, 5, "*");
                    drawTrapezoid(2, 7, "*");
                    drawTrapezoid(4, 10, "*");
                    for($row=0; $row<5; $row++) {
                        for($column=0; $column<4; $column++) {
                            echo "*";
                        }
                        echo "<br>";
                    }
                echo "</div>";
            ?>
        <hr>
        <h2 style='text-align:center;'>Part 2: Four Trees Displayed</h2>
            <?php
                echo "<table style='background-color:#add8e6; color:red; width:50%; margin:auto;'>";
                echo "<tr>";
                    echo "<td>";
                        echo "<div style='width:75%; margin:auto; background-color:#add8e6; text-align:center; color:red; line-height:0.50;'>";
                            drawTrapezoid(0, 5, "*");
                            drawTrapezoid(2, 7, "*");
                            drawTrapezoid(4, 10, "*");
                            for($row=0; $row<5; $row++) {
                                for($column=0; $column<4; $column++) {
                                    echo "*";
                                }
                                echo "<br>";
                            }
                        echo "</div>";
                    echo "</td>";
                    echo "<td>";
                        echo "<div style='width:75%; margin:auto; background-color:#add8e6; text-align:center; color:red; line-height:0.50;'>";
                            drawTrapezoid(0, 5, "*");
                            drawTrapezoid(2, 7, "*");
                            drawTrapezoid(4, 10, "*");
                            for($row=0; $row<5; $row++) {
                                for($column=0; $column<4; $column++) {
                                    echo "*";
                                }
                                echo "<br>";
                            }
                        echo "</div>";
                    echo "</td>";
                    echo "<td>";
                        echo "<div style='width:75%; margin:auto; background-color:#add8e6; text-align:center; color:red; line-height:0.50;'>";
                            drawTrapezoid(0, 5, "*");
                            drawTrapezoid(2, 7, "*");
                            drawTrapezoid(4, 10, "*");
                            for($row=0; $row<5; $row++) {
                                for($column=0; $column<4; $column++) {
                                    echo "*";
                                }
                                echo "<br>";
                            }
                        echo "</div>";
                    echo "</td>";
                    echo "<td>";
                        echo "<div style='width:75%; margin:auto; background-color:#add8e6; text-align:center; color:red; line-height:0.50;'>";
                            drawTrapezoid(0, 5, "*");
                            drawTrapezoid(2, 7, "*");
                            drawTrapezoid(4, 10, "*");
                            for($row=0; $row<5; $row++) {
                                for($column=0; $column<4; $column++) {
                                    echo "*";
                                }
                                echo "<br>";
                            }
                        echo "</div>";
                    echo "</td>";
                echo "</tr>";
                echo "</table>";
            ?>
        <hr>
        <h2 style='text-align:center;'>Part 3: When You Refresh the Page, Different Number (From 1-8) of Trees Displayed</h2>
            <?php
                echo "<table style='background-color:#add8e6; color:red; width:75%; margin:auto;'>";
                echo "<tr>";
                    $t=rand(1, 8);
                    for($i=0; $i<$t; $i++) {
                        echo "<td>";
                        echo "<div style='width:75%; margin:auto; background-color:#add8e6; text-align:center; color:red; line-height:0.50;'>";
                            drawTrapezoid(0, 5, "*");
                            drawTrapezoid(2, 7, "*");
                            drawTrapezoid(4, 10, "*");
                            for($row=0; $row<5; $row++) {
                                for($column=0; $column<4; $column++) {
                                    echo "*";
                                }
                                echo "<br>";
                            }
                        echo "</div>";
                    echo "</td>";
                    }
                echo "</tr>";
                echo "</table>";
            ?>
        <hr>

        <p>Submitted by Mathews Binny</p>
    </body>
</html>
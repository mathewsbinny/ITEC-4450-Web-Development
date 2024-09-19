<html>
    <head>
        <title>Activity 3</title>
    </head>
    <body>
        <h1>Activity 3</h1>
        <h2>Function in a Different File</h2>
        <?php
            include "lib01.php";
            showMSG();

            echo "<h3>Using Looping to Show Message</h3>";
            for($i=0; $i<5; $i++) {
                echo "Message ".($i+1).":";
                showMSG();
            }

            for($i=0; $i<20; $i++) {
                // add a different color element to make it cyan or magenta or yellow
                echo "<span style='font-size: ".($i*2+10)."; color:rgba(".($i*10+50).", 0, 0, 1);'>";
                    echo "Message ".($i+1).":";
                    showMSG();
                echo "</span>";
            }
        ?>
        <hr>

        <?php
            $t=rand(10, 100);
            echo "The temperature today is ".$t.".<br>";
            if($t<40) {
                showImage("Freezing");
            } elseif($t<55) {
                showImage("Cold");
            } elseif($t<80) {
                showImage("Warm");
            } else {
                showImage("Hot");
            }
        ?>

        <p>Submitted by Mathews Binny</p>
    </body>
</html>
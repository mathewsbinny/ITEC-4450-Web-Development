<html>
    <head>
        <title>First Activity</title>
    </head>
    <body>
        <h1> Activity 1- Jan 9, 2024 </h1>
        <hr>
        <?php
            echo "<span style = 'color:red;'>My first php activity</span><br>";
        ?>
        <h2> Some additional PHP code </h2>
        <?php
            //This is a single line comment
            $school = "GGC";
            echo "I like ".$school."!<br>";
            /*
            This is a block
            comment
            */

            //about numbers
            $n = 1234.5678;
            echo "This number is ".$n."<br>";
            printf("The number in float is: %f <br>", $n);
            printf("The number in float with three digit decimal point is: %.3f <br>", $n);
        ?>
        <h2> If-Else </h2>
        <?php
            $t = date("H"); //returns time in 24hr format
            echo "The time is: ".$t."<br>";
            if($t<10) {
                echo "Have a good morning! <br>";
            }
            else if($t<20) {
                echo "Have a good day! <br>";
            }
            else {
                echo "Have a good night! <br>";
            }
        ?>
        <p>Submitted by Mathews Binny</p>
    </body>
</html>
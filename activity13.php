<html>
    <head>
        <title>Activity 13</title>
    </head>
    <body>
        <p>Submitted by Mathews Binny</p>
        <ol>
            <li>plain pw</li>
            <li>md5() function</li>
            <li>adding salt to md5()</li>
            <li>password</li>
        </ol>
        <hr>
        

        <?php
        /*
            1. 

        */
            $pw = "1112";
            echo "The original password is: ".$pw."<br>";

            $pw1 = md5($pw);
            echo "The encrypted string with md5() function is: ".$pw1."<br>";

            $salt = "abc.ggc.edu"; //any random string
            echo "The salt is: ".$salt."<br>";

            $pw2 = md5($salt.$pw);
            echo "The encrypted string method md5() and the salt is: ".$pw2."<br>";

            $salt = md5($salt);
            echo "The new salt with md5() applied: ".$salt."<br>";

            $pw3 = md5($salt.$pw);
            echo "The encrypted string with md5() function and the salt also applied md5: ".$pw3."<br>";


            //using hash function if it's php5 or later
            $pw4 = password_hash($pw, PASSWORD_DEFAULT);
            echo "The encrypted string using password_hash() is: ".$pw4."<br>";
            echo "<h4>  The encrypted string is very long.
                        Make sure you check your database column for password.
                        You need to have enough space/length to store the encrypted pw
                </h4>";

            //check pw to see if it matches password in the database
            $userinput = "1112";
            $verify = password_verify($userinput, $pw4); // (original password, encrypted password)
            if($verify) {
                echo "Password verified successfully!";
            } else {
                echo "Your password does not match with our records. Try again.";
            }

            $userinput = "1111";
            $verify = password_verify($userinput, $pw4); // (original password, encrypted password)
            if($verify) {
                echo "Password verified successfully!";
            } else {
                echo "Your password does not match with our records. Try again.";
            }
        ?>
    </body>

</html>
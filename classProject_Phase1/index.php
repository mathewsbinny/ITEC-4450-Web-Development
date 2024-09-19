<?php
    session_start(); 
?>
<html>
    <head>
        <title>Activity 9 February 13</title>
        <style>
            .error {color:#FF0000;}
        </style>
    </head>
    <body>
        <?php
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            $dbfirstname = $dblastname = $dbpw = $email = "";

            if($_SERVER["REQUEST_METHOD"]=="POST") {
                $email = test_input($_POST["email"]);
                $pw=test_input($_POST["pw"]); //password is a reserved word, try to avoid using it as a variable name

                include "connection.php";
                // get email and password from the database
                $qs="SELECT * FROM users WHERE email='$email'";
                $qresult = mysqli_query($dbc, $qs);
                $numrows = mysqli_num_rows($qresult);
                if($numrows == 1) {
                    $row=mysqli_fetch_array($qresult);
                    $dbfirstname=$row["firstname"];
                    $dblastname=$row["lastname"];
                    $dbpw=$row["pw"];
                    $user_type=$row["user_type"];
                    $dbid=$row["id"];

                    $_SESSION["id"] = $dbid;
                    if($pw==$dbpw) {
                        echo "Welcome to our website ".$dbfirstname." ".$dblastname."!<br>";
                        mysqli_close($dbc);
                        if($user_type==0) {
                            header("Location:admin_home.php");
                        } else {
                            header("Location:user_home.php");
                        }
                    } else {
                        echo "Sorry, your password is not correct! Please try again!";
                    }
                } else if($numrows == 0) {
                    echo "Email is not in our system. Please register first!";
                } else {
                    echo "Something happened with our system. Please try again later.";
                }
            }
        ?>
        <h1>Activity 9: Login Form/Index Page</h1>
        <p>Submitted by Mathews Binny</p>
        <hr>

        <h1>Welcome to Matt's Free Online Testing Site</h1>
        <p>If you already have an account with us, please login.</p>
        <p>Otherwise, please <a href="registration.php">sign up.</a></p>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Email:      <input type="text" name="email" maxlength="50"><br><br>
            Password:   <input type="password" name="pw" maxlength="15"><br><br>

            <input type="submit" name="submit" value="Login">
        </form>
        <hr>
        <h3>Testing Area</h3>
        <p>Feb 20:</p>
            <ul>
                <li>1. General User: Login & Take The Quizzes</li>
                <li>2. Admin User: Login & Manage the Website</li>
            </ul>
        <p>To Do:</p>
            <ol>
                <li>Update the database: need to add column: user_type</li>
                <li>Create admin_nav.php</li>
                <li>Create admin function to help manage the website</li>
            </ol>
        <?php
            //echo "For Developers Only <br>";
            //echo "Data collected from the form: <br>";
            //echo $dbfirstname."<br>".$dblastname."<br>".$email."<br>".$dbpw."<br>";
        ?>
    </body>
</html>
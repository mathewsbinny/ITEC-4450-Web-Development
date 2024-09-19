<?php
    session_start();
?>
<html>
    <head>
        <title>APATH Login</title>
        <style>
            .error {color:#FF0000;}
        </style>
        <link rel="stylesheet" href="apath.css">
    </head>
    <body>
        <?php
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            $dbpw = $email = "";

            if($_SERVER["REQUEST_METHOD"]=="POST") {
                $email = test_input($_POST["email"]);
                $pw=test_input($_POST["pw"]); //password is a reserved word

                include "connection.php";
                //get email & password from database
                $qs="SELECT * FROM apath_users WHERE email='$email'";
                $qresult = mysqli_query($dbc, $qs);
                $numrows = mysqli_num_rows($qresult);
                if($numrows == 1) {
                    $row=mysqli_fetch_array($qresult);
                    $dbpw=$row["pw"];
                    $user_type=$row["user_type"];
                    $dbid=$row["id"];
    
                    $_SESSION["id"] = $dbid;
                    if($pw==$dbpw) {
                        echo "Welcome to our website!<br>";
                        mysqli_close($dbc);
                        if($user_type==0) {
                            header("Location:admin_home.php");
                        } else if($user_type==1) {
                                header("Location:student_home.php");
                        } else {
                                header("Location:volunteer_home.php");
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
        <div id=wrapper>
        <h1>APATH</h1>
        <nav>
            <!-- Navigation Bar -->
            <a href="apath_index.php">Home</a> |
            <a href="apath_about.php">About</a> |
            <a href="apath_login.php">Login</a> |
            <a href="apath_registration.php">Sign Up</a> |
            <a href="apath_forum.php">Forum</a> |
            <a href="apath_contact.php">Contact</a>
        </nav>
        <hr><br><br><br>
        <p>If you already have an account with us, please login.</p>
        <p>Otherwise, please <a href="apath_registration.php">sign up.</a></p>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Email:      <input type="text" name="email" placeholder="Email" maxlength="50"><br><br>
            Password:   <input type="password" name="pw" placeholder="Password" maxlength="15"><br><br>

            <input type="submit" name="submit" value="Login">
        </form>
        <hr>
        <footer>
            <p>Submitted by Mathews Binny</p>
        </footer>
    </div>
    </body>
</html>
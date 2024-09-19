<html>
    <head>
        <title>APATH Registration</title>
        <style>
            .error {color:#FF0000;}
        </style>
        <link rel="stylesheet" href="apath.css">
    </head>
    <body>
        <?php
            $email = $user_type = $password1 = $password2 = "";
            $emailErr = $user_typeErr = $password1Err = $password2Err = "";
            //$email = "Email";
            //$password1 = "Password";
            //$password2 = "Confirm Password";
            $flag=0; //no red flag

            if($_SERVER["REQUEST_METHOD"]=="POST") {
                $email = $_POST["email"];
                $user_type = $_POST["user_type"];

                if($email == "") {
                    $emailErr = "Email is required!";
                    $flag=1;
                }else {
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailErr="Invalid e-mail format";
                        $flag=1;
                    }
                }
                if($user_type == "") {
                    $user_typeErr = "Select one!";
                    $flag=1;
                }

                $password1=$_POST["password1"];
                $password2=$_POST["password2"];
                if($password1 == "") {
                    $password1Err = "Password is required!";
                    $flag=1;
                } else {
                    if($password1 != $password2) {
                        $flag=1;
                        $password2Err = "Passwords do not match!";
                    }
                }

                ///////FIX THIS & CREATE TABLE

                //if no red flag, ready to insert into database
                if($flag==0){
                    include "connection.php";
                    $sqs = "SELECT * from apath_users WHERE email = '$email'";
                    $queryresult = mysqli_query($dbc, $sqs);
                    $num = mysqli_num_rows($queryresult);
                    //$num should be 0 indicating email is NOT in the database
                    if($num!=0) {
                        echo "<h3>This email has been used! Please try a different email.</h3>";
                    } else {
                        $sqs="INSERT INTO apath_users(email, user_type, pw) VALUES('$email', '$user_type', '$password1')";
                        mysqli_query($dbc, $sqs);
                        $registered = mysqli_affected_rows($dbc);
                        echo $registered." registration is successful.<br><br>";
                        mysqli_close($dbc);
                        header("Location:registersuccess.php");
                    }
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
        <p>We are going to communicate with you using email often.</p>
        <p>Please create your new account with your most frequently used email.</p>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <!-- Email -->     <input type="text" name="email" placeholder="Email" value="<?php echo $email; ?>"><span class="error"> * <?php echo $emailErr; ?></span> <br><br>
            <!-- Password -->  <input type="text" name="password1" placeholder="Password" value="<?php echo $password1; ?>"><span class="error"> * <?php echo $password1Err; ?></span> <br><br>
            <!-- Confirm -->   <input type="text" name="password2" placeholder="Confirm Password" value="<?php echo $password2; ?>"><span class="error"> * <?php echo $password2Err; ?></span> <br><br>
            
            <input type="radio" name="user_type" <?php if(isset($user_type)&&$user_type=="1") echo "checked"; ?> value="1"> I am signing up as a volunteer
            <input type="radio" name="user_type" <?php if(isset($user_type)&&$user_type=="2") echo "checked"; ?> value="2"> I am an international student that needs help
            <br><br>
            <input type="submit" value="Create Account">
            <p>Already have an account? <a href="apath_index">Login</a></p>
            
            <br><br>
        </form>
        <hr>
        <footer>
            <p>Submitted by Mathews Binny</p>
        </footer>
        </div>
        <h3>Testing Area</h3>
        <?php
            echo "For Developers Only <br>";
            echo "Data collected from the form: <br>";
            echo $email."<br>".$user_type."<br>".$password1."<br>".$password2."<br>";
        ?>
        <hr>
        
    </body>
</html>
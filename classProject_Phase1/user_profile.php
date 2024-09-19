<?php
    session_start();
    $id="";
    $id = $_SESSION["id"];
    echo "Session ID is ".$id."<br>"; // for developer

    include "connection.php";
    $qs = "SELECT * FROM users WHERE id=$id";
    //echo query statement
    $result = mysqli_query($dbc,$qs);
    $numrows= mysqli_num_rows($result);

    if($numrows == 1){
        $row = mysqli_fetch_array($result);
        $dbid=$row["id"];
        $firstname = $row["firstname"];
        $lastname = $row["lastname"];
        $email = $row["email"];
        $phone = $row["phone"];
        $major = $row["major"];
        $gender = $row["gender"];
        $pass = $row["pw"];
    } else {
        echo "Something is wrong!";
    }
?>
<?php
    include "input_test.php";
    $flag = 0;
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $firstname = test_input($_POST["firstname"]);
        $lastname = test_input($_POST["lastname"]);
        $email = test_input($_POST["email"]);
        $phone = test_input($_POST["phone"]);
        $major = test_input($_POST["major"]);
        $gender = $_POST["gender"];

        if($firstname == "") {
            $firstnameErr = "First name is required!";
            $flag=1;
        } else{
            echo "Welcome ".$firstname."<br>";
        }

        if($lastname == "") {
            $lastnameErr = "Last name is required!";
            $flag=1;
        }

        if($email == "" || $email == "example@ggc.edu") {
            $emailErr = "Email is required!";
            $flag=1;
        }else {
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr="Invalid e-mail format";
                $flag=1;
            }
        }

        if($phone == "") {
            $phoneErr = "Phone number is required!";
            $flag=1;
        }

        if($major == "") {
            $majorErr = "Major is required!";
            $flag=1;
        }

        if($gender == "") {
            $genderErr = "Gender is required!";
            $flag=1;
        }

        $pass=test_input($_POST["pass"]);
        $pass2=test_input($_POST["pass2"]);
        if($pass == "") {
            $password1Err = "Password is required!";
            $flag=1;
        } else {
            if($pass != $pass2) {
                $flag=1;
                $password2Err = "Passwords do not match!";
            }
        }

        //if no red flag, ready to update user info
        if($flag==0){
            include "connection.php";
            $sqs = "UPDATE users SET firstname='$firstname', lastname='$lastname', email='$email', phone='$phone', major='$major', gender='$gender', pw='$pass' WHERE id=$id";
            echo "Update statement is ".$sqs."<br>";
            //run the query
            mysqli_query($dbc,$sqs);
            //1 row should be affected
            if(mysqli_affected_rows($dbc)==1) {
                echo "You have updated your personal profile successfully!";
                echo "<br> Please <a href='user_home.php'> click here </a> to go back <br>";
            } else {
                echo "Something is wrong";
            }
        }
    }
?>
<html>
    <head>
        <title>User Profile Editor</title>
    </head>
    <body>
        <h2>Welcome to the User Profile Editor</h2>
        <?php
            include "user_nav.php";
        ?>
        <p>Feel free to update your personal profile.</p>
        <form method="post" action="user_profile.php">
            ID: <input type="text" name="id" value="<?php echo $dbid; ?>"><br><br>
            First Name:         <input type="text" name="firstname" value="<?php echo $firstname; ?>"><br><br>
            Last Name:          <input type="text" name="lastname" value="<?php echo $lastname; ?>"><br><br>
            Email:              <input type="text" name="email" value="<?php echo $email; ?>"><br><br>
            Phone:              <input type="text" name="phone" value="<?php echo $phone; ?>"><br><br>
            Major:              <input type="text" name="major" value="<?php echo $major; ?>"><br><br>
            Gender:             <span class="error"> * <?php echo $genderErr; ?></span><br>
                                <input type="radio" name="gender" <?php if(isset($gender)&&$gender=="female") echo "checked"; ?> value="female"> Female
                                <input type="radio" name="gender" <?php if(isset($gender)&&$gender=="male") echo "checked"; ?> value="male"> Male
                                <input type="radio" name="gender" <?php if(isset($gender)&&$gender=="other") echo "checked"; ?> value="other"> Other
                                <br><br>
            Password:           <input type="text" name="pass" value="<?php echo $pass; ?>"><br><br>
            Confirm Password:   <input type="text" name="pass2" value="<?php echo $pass; ?>"><br><br>

            <input type="submit" name="update" value="Update Profile">
        </form>
    </body>
</html>
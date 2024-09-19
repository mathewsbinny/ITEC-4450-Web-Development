<html>
    <head>
        <title>Activity 9 February 13</title>
        <style>
            .error {color:#FF0000;}
        </style>
    </head>
    <body>
        <h1>Activity 9: Registration Form</h1>
        <p>Submitted by Mathews Binny</p>
        <hr>
        <?php
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            $firstname = $lastname = $email = $phone = $major = $gender = $password1 = $password2 = "";
            $firstnameErr = $lastnameErr = $emailErr = $phoneErr = $majorErr = $genderErr = $password1Err = $password2Err = "";
            $firstname = "firstname";
            $lastname = "lastname";
            $email = "example@ggc.edu";
            $phone = "678-123-1234";
            $flag=0; //no red flag

            if($_SERVER["REQUEST_METHOD"]=="POST") {
                $firstname = test_input($_POST["firstname"]);
                $lastname = test_input($_POST["lastname"]);
                $email = test_input($_POST["email"]);
                $phone = test_input($_POST["phone"]);
                $major = test_input($_POST["major"]);
                $gender = $_POST["gender"];

                if($firstname == "" || $firstname == "firstname") {
                    $firstnameErr = "First name is required!";
                    $flag=1;
                } else{
                    echo "Welcome ".$firstname."<br>";
                }

                if($lastname == "" || $lastname == "lastname") {
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

                if($phone == "" || $phone == "678-123-1234") {
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

                $password1=test_input($_POST["password1"]);
                $password2=test_input($_POST["password2"]);
                if($password1 == "") {
                    $password1Err = "Password is required!";
                    $flag=1;
                } else {
                    if($password1 != $password2) {
                        $flag=1;
                        $password2Err = "Passwords do not match!";
                    }
                }

                //if no red flag, ready to insert into database
                if($flag==0){
                    include "connection.php";
                    $sqs = "SELECT * from users WHERE email = '$email'";
                    $queryresult = mysqli_query($dbc, $sqs);
                    $num = mysqli_num_rows($queryresult);
                    //$num should be 0 indicating email is NOT in the database
                    if($num!=0) {
                        echo "<h3>This email has been used! Please try a different email.</h3>";
                    } else {
                        $sqs="INSERT INTO users(firstname, lastname, email, phone, major, gender, pw) VALUES('$firstname', '$lastname', '$email', '$phone', '$major', '$gender', '$password1')";
                        mysqli_query($dbc, $sqs);
                        $registered = mysqli_affected_rows($dbc);
                        echo $registered." registration is successful.<br><br>";
                        mysqli_close($dbc);
                        header("Location:registersuccess.php");
                    }
                }
            }
        ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            First Name:         <input type="text" name="firstname" value="<?php echo $firstname; ?>"><span class="error"> * <?php echo $firstnameErr; ?></span> <br><br>
            Last Name:          <input type="text" name="lastname" value="<?php echo $lastname; ?>"><span class="error"> * <?php echo $lastnameErr; ?></span> <br><br>
            Email:              <input type="text" name="email" value="<?php echo $email; ?>"><span class="error"> * <?php echo $emailErr; ?></span> <br><br>
            Phone:              <input type="text" name="phone" value="<?php echo $phone; ?>"><span class="error"> * <?php echo $phoneErr; ?></span> <br><br>
            Major:              <input type="text" name="major" value="<?php echo $major; ?>"><span class="error"> * <?php echo $majorErr; ?></span> <br><br>
            Gender:             <span class="error"> * <?php echo $genderErr; ?></span><br>
                                <input type="radio" name="gender" <?php if(isset($gender)&&$gender=="female") echo "checked"; ?> value="female"> Female
                                <input type="radio" name="gender" <?php if(isset($gender)&&$gender=="male") echo "checked"; ?> value="male"> Male
                                <input type="radio" name="gender" <?php if(isset($gender)&&$gender=="other") echo "checked"; ?> value="other"> Other
                                <br><br>
            Password:           <input type="text" name="password1" value="<?php echo $password1; ?>"><span class="error"> * <?php echo $password1Err; ?></span> <br><br>
            Confirm Password:   <input type="text" name="password2" value="<?php echo $password2; ?>"><span class="error"> * <?php echo $password2Err; ?></span> <br><br>
            
            
            <br><br>
            <input type="submit">
        </form>
        <hr>
        <h3>Testing Area</h3>
        <?php
            echo "For Developers Only <br>";
            echo "Data collected from the form: <br>";
            echo $firstname."<br>".$lastname."<br>".$email."<br>".$phone."<br>".$major."<br>".$gender."<br>".$password1."<br>".$password2."<br>";

        ?>
        <hr>
    </body>
</html>
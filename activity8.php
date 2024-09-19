<html>
    <head>
        <title>Activity 8 Feb 6</title>
        <style>
            .error {color:#FF0000;}
        </style>
    </head>
    <body>
        <h1>Activity 8</h1>
        <p>Submitted by Mathews Binny</p>
        <hr>
        <h2>Connecting to Database</h2>
        <p>Store information submitted from the form to our database</p>
        <h2>Steps</h2>
        <ul>
            <li>Go to phpmyadmin, create a new database and a new table inside that database</li>
            <li>create connection.php</li>
            <li>Update the activity8.php file to include the SQL part</li>
        </ul>
        <h3>Homework: Store all the information from this form.</h3>


        <?php
            $nameErr=$emailErr=$commentErr=$genderErr=$timeErr=$Q1Err="";
            $name=$email=$website=$Q1=$gender=$time=$comment=$sqs="";
            $flag=0; //no red flag
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = test_input($_POST["name"]);
                $email = test_input($_POST["email"]);
                $website = test_input($_POST["website"]);
                $comment = test_input($_POST["comment"]);
                $gender = $_POST["gender"];
                $time = $_POST["time"];
                
                if($name == "") {
                    $nameErr = "Name is required!";
                    $flag=1;
                    //echo $nameErr;
                } else{
                    echo "Welcome ".$name."<br>";
                }

                if($email == "") {
                    $emailErr = "Email is required!";
                    $flag=1;
                    //echo $emailErr;
                }else {
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailErr="Invalid e-mail format";
                        $flag=1;
                    }
                }

                if($gender == "") {
                    $genderErr = "Gender is required!";
                    $flag=1;
                }

                if($time == "") {
                    $timeErr = "Time is required!";
                    $flag=1;
                }

                /*  if($comment == "") {
                        $commentErr = "Comment is required!<br>";
                        //echo $commentErr;
                    }
                */
                //echo "Your email is ".$email."<br>";
                //echo "Your comment is ".$comment."<br><br>";

                //if no red flag, ready to insert into database
                if($flag==0){
                    include "connection.php";
                    //check email to make sure it is NOT in the table
                    $sqs = "SELECT * from registration WHERE email = '$email'";
                    $queryresult = mysqli_query($dbc, $sqs);
                    $num = mysqli_num_rows($queryresult);
                    //$num should be 0 indicating email is NOT in the database
                    if($num!=0) {
                        echo "This email has been used! Please try a different email.";
                    } else {
                        $sqs="INSERT INTO registration(name, email, website, gender, time, comment) VALUES('$name','$email','$website','$gender', '$time', '$comment')";
                        mysqli_query($dbc, $sqs);
                        $registered = mysqli_affected_rows($dbc);
                        echo $registered." row is affected.<br><br>";
                    }
                }

            }
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
        ?>
        <hr>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Name:       <input type="text" name="name" value="<?php echo $name; ?>"><span class="error"> * <?php echo $nameErr; ?></span> <br><br>
            Email:      <input type="text" name="email" value="<?php echo $email; ?>"><span class="error"> * <?php echo $emailErr; ?></span> <br><br>
            Website:    <input type="text" name="website" value="<?php echo $website; ?>"> <br><br>
            Gender:     <span class="error"> * <?php echo $genderErr; ?></span><br>
                        <input type="radio" name="gender" <?php if(isset($gender)&&$gender=="female") echo "checked"; ?> value="female"> Female
                        <input type="radio" name="gender" <?php if(isset($gender)&&$gender=="male") echo "checked"; ?> value="male"> Male
                        <input type="radio" name="gender" <?php if(isset($gender)&&$gender=="other") echo "checked"; ?> value="other"> Other
                        <br><br>
            Select your preferred time:
                        <span class="error"> * <?php echo $timeErr; ?></span>
                        <select name="time">
                            <option value="AM" <?php if($time=="AM") echo "selected"; ?>> MWF 9AM - 11AM </option>
                            <option value="PM" <?php if($time=="PM") echo "selected"; ?>> TuTh 2PM - 4PM </option>
                            <option value="EV" <?php if($time=="EV") echo "selected"; ?>> M-F 6PM - 8PM </option>
                        </select> <br><br>
            Comment:    <span class="error"> * </span><br><textarea name="comment" cols="40" rows="5">  <?php echo $commentErr; ?>  </textarea> <br><br>

            1. What is 1+1 ? <span class="error"> * <?php echo $Q1Err; ?></span><br>
                <input type="radio" name="Q1" <?php if(isset($Q1)&&$Q1=="10") echo "checked"; ?> value="10"> 10
                <input type="radio" name="Q1" <?php if(isset($Q1)&&$Q1=="2") echo "checked"; ?> value="2"> 2
                <input type="radio" name="Q1" <?php if(isset($Q1)&&$Q1=="3") echo "checked"; ?> value="3"> 3
            <br><br>
            <input type="submit">
        </form>
        <hr>
        <h3>Testing Area</h3>
        <?php
            echo "For Developers Only <br>";
            echo "Data collected from the form: <br>";
            echo $name."<br>".$email."<br>".$website."<br>".$comment."<br>";
            echo $gender."<br>".$time."<br>";
            echo $flag."<br>";
            echo $sqs."<br>";
        ?>
    </body>
</html>
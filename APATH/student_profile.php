<?php
    session_start();
    $id="";
    $id = $_SESSION["id"];
    echo "Session ID is ".$id."<br>"; // for developer

    /* FIX THIS?!
    include "connection.php";
    $qs = "SELECT * FROM student WHERE id=$id";
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
    */
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
        $bring = $_POST["bring"];
        $status = $_POST["status"];


        /**DO THE DATABASE CHECK LOGIC FOR THE FORM*/
        /**BE CAREFUL, EMAIL & PW GO TO APATH_USER TABLE, ALL OTHERS GO TO APATH_STUDENT TABLE */

        //if no red flag, ready to update user info
        if($flag==0){
            include "connection.php";
            $sqs = "UPDATE apath_user SET firstname='$firstname', lastname='$lastname', email='$email', phone='$phone', major='$major', gender='$gender', pw='$pass' WHERE id=$id";
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
        <title>Student Personal Profile Editor</title>
        <link rel="stylesheet" href="apath.css">
    </head>
    <body>
    <div id=wrapper>
        <h2>Welcome to the Personal Profile Editor</h2>
        <?php
            include "student_nav.php";
        ?>
        <br><br><br><br>
        <p>Feel free to update your personal profile.</p>
        <!-- FINISH MAKING FORM -->
        <form method="post" action="student_profile.php">
            ID:                 <input type="text" name="id" value="<?php echo $dbid; ?>"><br><br>
            First Name:         <input type="text" name="firstname" value="<?php echo $firstname; ?>"><br><br>
            Last Name:          <input type="text" name="lastname" value="<?php echo $lastname; ?>"><br><br>
            English Name (If you have one): <input type="text" name="engname" value="<?php echo $engname; ?>"><br><br>
            Gender:             <span class="error"> * <?php echo $genderErr; ?></span><br>
                                <input type="radio" name="gender" <?php if(isset($gender)&&$gender=="female") echo "checked"; ?> value="female"> Female
                                <input type="radio" name="gender" <?php if(isset($gender)&&$gender=="male") echo "checked"; ?> value="male"> Male
                                <input type="radio" name="gender" <?php if(isset($gender)&&$gender=="other") echo "checked"; ?> value="other"> Other
                                <br><br>
            Bring family/relatives or not: <span class="error"> * <?php echo $bringErr; ?></span><br>
                                <input type="radio" name="bring" <?php if(isset($bring)&&$bring=="yes") echo "checked"; ?> value="yes"> Yes
                                <input type="radio" name="bring" <?php if(isset($bring)&&$bring=="no") echo "checked"; ?> value="no"> No
                                <br><br>
            Are you a returning student or first-time student? <span class="error"> * <?php echo $statusErr; ?></span><br>
                                <input type="radio" name="status" <?php if(isset($status)&&$status=="return") echo "checked"; ?> value="return"> Returning
                                <input type="radio" name="status" <?php if(isset($status)&&$status=="firsttime") echo "checked"; ?> value="firsttime"> First Time
                                <br><br>
            <!-- Edit these so they pass a value to PHP & server -->
            <label for="goal">I'm coming to the US to be a: </label>
                                <select id="goal" name="goal">
                                    <option value="undergraduate">undergraduate student</option>
                                    <option value="graduate">graduate student</option>
                                    <option value="visiting">visiting scholar</option>
                                    <option value="other">other</option>
                                </select>
            <label for="faset">Are you attending FASSET? If you will attend FASET on 08/16, please choose FASET 6:</label>
                                <select id="faset" name="faset">
                                    <option value="notattending">not attending</option>
                                    <option value="attending">attending FASET 6</option>
                                </select>
                                <br><br>
            School you graduate from: <input type="text" name="school" value="<?php echo $school; ?>"><br>
            Major:              <input type="text" name="major" value="<?php echo $major; ?>"><br><br>
            Email:              <input type="text" name="email" value="<?php echo $email; ?>"><br><br>
            Phone:              <input type="text" name="phone" value="<?php echo $phone; ?>"><br><br>
            WeChat ID:          <input type="text" name="wechat" value="<?php echo $wechat; ?>"><br><br>
            Did you get vaccinated for COVID? <span class="error"> * <?php echo $vaxxErr; ?></span><br>
                                <input type="radio" name="vaxx" <?php if(isset($vaxx)&&$vaxx=="yes") echo "checked"; ?> value="yes"> Yes
                                <input type="radio" name="vaxx" <?php if(isset($vaxx)&&$vaxx=="no") echo "checked"; ?> value="no"> No
                                <br><br>
            Choose a User Name: <input type="text" name="username" value="<?php echo $username; ?>"><br><br>

            Password:           <input type="text" name="pass" value="<?php echo $pass; ?>"><br><br>
            Confirm Password:   <input type="text" name="pass2" value="<?php echo $pass; ?>"><br><br>

            Special Attention? <span class="error"> * <?php echo $specialErr; ?></span><br>
                                <input type="radio" name="special" <?php if(isset($special)&&$special=="yes") echo "checked"; ?> value="yes"> Yes
                                <input type="radio" name="special" <?php if(isset($special)&&$special=="no") echo "checked"; ?> value="no"> No
                                <br><br><br><br>
            Any Comment         <input type="text" name="comment" value="<?php echo $comment; ?>"><br>
            Admin Comment       <input type="text" name="admincomment" value="<?php echo $admincomment; ?>"><br>
            <input type="submit" name="update" value="Update Profile">
        </form>
    </div>
    </body>
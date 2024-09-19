<html>
    <head>
        <title>Lab 4 - HTML & CSS Quiz</title>
        <style>
            .error {color:#FF0000;}
        </style>
    </head>
    <body>
        <h1>Lab 4 - HTML & CSS Quiz</h1>
        <p>Submitted by Mathews Binny</p>
        <?php
        //variables for identification
        $firstname = $lastname = $email = "";
        //variables for identification error handling
        $firstnameErr = $lastnameErr = $emailErr = "";
        //variables for questions
        $Q1 = $Q2 = $Q3 = $Q4 = $Q5 = $Q6 = $Q7 = $Q8 = $Q9 = $Q10 = "";
        $QErr = "";
        //no red flag; used for unanswered questions & required form elements
        $flag=0;

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $email = $_POST["email"];
            $Q1 = $_POST["Q1"];
            $Q2 = $_POST["Q2"];
            $Q3 = $_POST["Q3"];
            $Q4 = $_POST["Q4"];
            $Q5 = $_POST["Q5"];
            $Q6 = $_POST["Q6"];
            $Q7 = $_POST["Q7"];
            $Q8 = $_POST["Q8"];
            $Q9 = $_POST["Q9"];
            $Q10 = $_POST["Q10"];
            $score = $_POST["score"];

            //check identification elements
            if($firstname == "") {
                $firstnameErr = "First name is required!";
                $flag = 1;
                //echo $firstnameErr;
            }
            if($lastname == "") {
                $lastnameErr = "Last name is required!";
                $flag = 1;
                //echo $lastnameErr;
            } else {
                echo "Welcome ".$firstname." ".$lastname."<br>";
            }
            if($email == "") {
                $emailErr = "Email is required!";
                $flag = 1;
            } else {
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr="Invalid e-mail format";
                    $flag=1;
                }
            }
            //check if questions answered
            if($Q1 == "" || $Q2 == "" || $Q3 == "" || $Q4 == "" || $Q5 == "" || $Q6 == "" || $Q7 == "" || $Q8 == "" || $Q9 == "" || $Q10 == "") {
                $QErr = "Please answer all the questions.";
                $flag = 1;
            } else {
                for($i = 1; $i <= 10; $i++) {
                    echo "Your answer for Question ".$i.": ".$Q1."<br>";
                }
            }
            //!!!! Scoring the quiz!
            $score = 0;
            if ($Q1 == "A") {
                $score += 10;
            }
            if ($Q2 == "C") {
                $score += 10;
            }
            if ($Q3 == "B") {
                $score += 10;
            }
            if ($Q4 == "A") {
                $score += 10;
            }
            if ($Q5 == "B") {
                $score += 10;
            }
            if ($Q6 == "A") {
                $score += 10;
            }
            if ($Q7 == "A") {
                $score += 10;
            }
            if ($Q8 == "B") {
                $score += 10;
            }
            if ($Q9 == "B") {
                $score += 10;
            }
            if ($Q10 == "A") {
                $score += 10;
            }
            echo "Your score for the HTML & CSS Quiz is ".$score."<br><br>";

            //database validity check
            if($flag==0){
                include "connection.php";
                //check name to make sure it is NOT in the table
                $sqs = "SELECT * from lab4_htmlcss_results WHERE email = '$email'";
                $queryresult = mysqli_query($dbc, $sqs);
                $num = mysqli_num_rows($queryresult);
                //$num should be 0 indicating email is NOT in the database
                if($num!=0) {
                    echo "You have already taken the quiz!";
                } else {
                    $sqs="INSERT INTO lab4_htmlcss_results(firstname, lastname, email, Q1, Q2, Q3, Q4, Q5, Q6, Q7, Q8, Q9, Q10, score) VALUES('$firstname', '$lastname', '$email','$Q1','$Q2','$Q3', '$Q4', '$Q5', '$Q6', '$Q7','$Q8','$Q9','$Q10','$score')";
                    mysqli_query($dbc, $sqs);
                    $registered = mysqli_affected_rows($dbc);
                    echo $registered." row is affected.<br><br>";
                }

            }
        }
        ?>

        <!-- HTML & CSS QUIZ -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <!-- IDENTIFICATION -->
            First Name: <input type="text" name="firstname" value="<?php echo $firstname; ?>"><span class="error"> * <?php echo $firstnameErr; ?></span> <br><br>
            Last Name:  <input type="text" name="lastname" value="<?php echo $lastname; ?>"><span class="error"> * <?php echo $lastnameErr; ?></span> <br><br>
            Email:      <input type="text" name="email" value="<?php echo $email; ?>"><span class="error"> * <?php echo $emailErr; ?></span> <br><br>
            <!-- QUESTIONS -->
            1. What does HTML stand for? <span class="error"> * <?php echo $QErr; ?></span><br>
                <input type="radio" name="Q1" <?php if(isset($Q1)&&$Q1=="A") echo "checked"; ?> value="A"> A. Hyper Text Markup Language
                <input type="radio" name="Q1" <?php if(isset($Q1)&&$Q1=="B") echo "checked"; ?> value="B"> B. High Text Markup Language
                <input type="radio" name="Q1" <?php if(isset($Q1)&&$Q1=="C") echo "checked"; ?> value="C"> C. Hyperlink and Text Markup Language
                <input type="radio" name="Q1" <?php if(isset($Q1)&&$Q1=="D") echo "checked"; ?> value="D"> D. Hypertext Transfer Markup Language
                <br><br>
            2. Which HTML tag is used to define an unordered list? <span class="error"> * <?php echo $QErr; ?></span><br>
                <input type="radio" name="Q2" <?php if(isset($Q2)&&$Q2=="A") echo "checked"; ?> value="A"> A. <&nbsp;list&nbsp;>
                <input type="radio" name="Q2" <?php if(isset($Q2)&&$Q2=="B") echo "checked"; ?> value="B"> B. <&nbsp;ol&nbsp;>
                <input type="radio" name="Q2" <?php if(isset($Q2)&&$Q2=="C") echo "checked"; ?> value="C"> C. <&nbsp;ul&nbsp;>
                <input type="radio" name="Q2" <?php if(isset($Q2)&&$Q2=="D") echo "checked"; ?> value="D"> D. <&nbsp;dl&nbsp;>
                <br><br>
            3. Which HTML tag is used to create a hyperlink? <span class="error"> * <?php echo $QErr; ?></span><br>
                <input type="radio" name="Q3" <?php if(isset($Q3)&&$Q3=="A") echo "checked"; ?> value="A"> A. <&nbsp;link&nbsp;>
                <input type="radio" name="Q3" <?php if(isset($Q3)&&$Q3=="B") echo "checked"; ?> value="B"> B. <&nbsp;a&nbsp;>
                <input type="radio" name="Q3" <?php if(isset($Q3)&&$Q3=="C") echo "checked"; ?> value="C"> C. <&nbsp;href&nbsp;>
                <input type="radio" name="Q3" <?php if(isset($Q3)&&$Q3=="D") echo "checked"; ?> value="D"> D. <&nbsp;hyperlink&nbsp;>
                <br><br>
            4. What HTML tag is used to define the metadata of an HTML document? <span class="error"> * <?php echo $QErr; ?></span><br>
                <input type="radio" name="Q4" <?php if(isset($Q4)&&$Q4=="A") echo "checked"; ?> value="A"> A. <&nbsp;meta&nbsp;>
                <input type="radio" name="Q4" <?php if(isset($Q4)&&$Q4=="B") echo "checked"; ?> value="B"> B. <&nbsp;head&nbsp;>
                <input type="radio" name="Q4" <?php if(isset($Q4)&&$Q4=="C") echo "checked"; ?> value="C"> C. <&nbsp;title&nbsp;>
                <input type="radio" name="Q4" <?php if(isset($Q4)&&$Q4=="D") echo "checked"; ?> value="D"> D. <&nbsp;body&nbsp;>
                <br><br>
            5. Which HTML tag is used to create a line break? <span class="error"> * <?php echo $QErr; ?></span><br>
                <input type="radio" name="Q5" <?php if(isset($Q5)&&$Q5=="A") echo "checked"; ?> value="A"> A. <&nbsp;break&nbsp;>
                <input type="radio" name="Q5" <?php if(isset($Q5)&&$Q5=="B") echo "checked"; ?> value="B"> B. <&nbsp;br&nbsp;>
                <input type="radio" name="Q5" <?php if(isset($Q5)&&$Q5=="C") echo "checked"; ?> value="C"> C. <&nbsp;lb&nbsp;>
                <input type="radio" name="Q5" <?php if(isset($Q5)&&$Q5=="D") echo "checked"; ?> value="D"> D. <&nbsp;line&nbsp;>
                <br><br>
            6. What CSS property is used to add a border around an element? <span class="error"> * <?php echo $QErr; ?></span><br>
                <input type="radio" name="Q6" <?php if(isset($Q6)&&$Q6=="A") echo "checked"; ?> value="A"> A. border
                <input type="radio" name="Q6" <?php if(isset($Q6)&&$Q6=="B") echo "checked"; ?> value="B"> B. border-style
                <input type="radio" name="Q6" <?php if(isset($Q6)&&$Q6=="C") echo "checked"; ?> value="C"> C. add-border
                <input type="radio" name="Q6" <?php if(isset($Q6)&&$Q6=="D") echo "checked"; ?> value="D"> D. border-color
                <br><br>
            7. Which CSS property is used to align text to the center horizontally? <span class="error"> * <?php echo $QErr; ?></span><br>
                <input type="radio" name="Q7" <?php if(isset($Q7)&&$Q7=="A") echo "checked"; ?> value="A"> A. text-align
                <input type="radio" name="Q7" <?php if(isset($Q7)&&$Q7=="B") echo "checked"; ?> value="B"> B. align-text
                <input type="radio" name="Q7" <?php if(isset($Q7)&&$Q7=="C") echo "checked"; ?> value="C"> C. center-text
                <input type="radio" name="Q7" <?php if(isset($Q7)&&$Q7=="D") echo "checked"; ?> value="D"> D. text-center
                <br><br>
            8. Which CSS property is used to align text to the center horizontally? <span class="error"> * <?php echo $QErr; ?></span><br>
                <input type="radio" name="Q8" <?php if(isset($Q8)&&$Q8=="A") echo "checked"; ?> value="A"> A. margin
                <input type="radio" name="Q8" <?php if(isset($Q8)&&$Q8=="B") echo "checked"; ?> value="B"> B. padding
                <input type="radio" name="Q8" <?php if(isset($Q8)&&$Q8=="C") echo "checked"; ?> value="C"> C. spacing
                <input type="radio" name="Q8" <?php if(isset($Q8)&&$Q8=="D") echo "checked"; ?> value="D"> D. border-spacing
                <br><br>
            9. Which CSS property is used to control the size of text? <span class="error"> * <?php echo $QErr; ?></span><br>
                <input type="radio" name="Q9" <?php if(isset($Q9)&&$Q9=="A") echo "checked"; ?> value="A"> A. text-size
                <input type="radio" name="Q9" <?php if(isset($Q9)&&$Q9=="B") echo "checked"; ?> value="B"> B. font-size
                <input type="radio" name="Q9" <?php if(isset($Q9)&&$Q9=="C") echo "checked"; ?> value="C"> C. size
                <input type="radio" name="Q9" <?php if(isset($Q9)&&$Q9=="D") echo "checked"; ?> value="D"> D. text-style
                <br><br>
            10. What CSS property is used to remove the underline from links? <span class="error"> * <?php echo $QErr; ?></span><br>
                <input type="radio" name="Q10" <?php if(isset($Q10)&&$Q10=="A") echo "checked"; ?> value="A"> A. text-decoration
                <input type="radio" name="Q10" <?php if(isset($Q10)&&$Q10=="B") echo "checked"; ?> value="B"> B. underline
                <input type="radio" name="Q10" <?php if(isset($Q10)&&$Q10=="C") echo "checked"; ?> value="C"> C. decoration
                <input type="radio" name="Q10" <?php if(isset($Q10)&&$Q10=="D") echo "checked"; ?> value="D"> D. link-decoration
                <br><br>
            <input type="submit">
        </form>
        <hr>
            <h3>Testing Area Developers Only</h3>
            <?php
                echo "For Developers Only <br>";
                echo "Data collected from the form: <br>";
                echo $firstname." ".$lastname."<br><br>";
                echo $email."<br><br>";
                echo $Q1."<br>".$Q2."<br>".$Q3."<br>".$Q4."<br>".$Q5."<br>".$Q6."<br>".$Q7."<br>".$Q8."<br>".$Q9."<br>".$Q10."<br>";
                echo $flag."<br>";
                echo $sqs."<br>";
            ?>
    </body>
</html>
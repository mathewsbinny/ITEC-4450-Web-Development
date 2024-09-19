<html>
    <head>
        <title>Lab 3 - PHP Quiz</title>
        <style>
            .error {color:#FF0000;}
        </style>
    </head>
    <body>
        <h1>Lab 3 - PHP Quiz</h1>
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
            if ($Q1 == "C") {
                $score += 10;
            }
            if ($Q2 == "A") {
                $score += 10;
            }
            if ($Q3 == "B") {
                $score += 10;
            }
            if ($Q4 == "A") {
                $score += 10;
            }
            if ($Q5 == "C") {
                $score += 10;
            }
            if ($Q6 == "B") {
                $score += 10;
            }
            if ($Q7 == "A") {
                $score += 10;
            }
            if ($Q8 == "C") {
                $score += 10;
            }
            if ($Q9 == "C") {
                $score += 10;
            }
            if ($Q10 == "A") {
                $score += 10;
            }
            echo "Your score for the PHP Quiz is ".$score."<br><br>";

            //database validity check
            if($flag==0){
                include "connection.php";
                //check name to make sure it is NOT in the table
                $sqs = "SELECT * from lab3_php_results WHERE email = '$email'";
                $queryresult = mysqli_query($dbc, $sqs);
                $num = mysqli_num_rows($queryresult);
                //$num should be 0 indicating email is NOT in the database
                if($num!=0) {
                    echo "You have already taken the quiz!";
                } else {
                    $sqs="INSERT INTO lab3_php_results(firstname, lastname, email, Q1, Q2, Q3, Q4, Q5, Q6, Q7, Q8, Q9, Q10, score) VALUES('$firstname', '$lastname', '$email','$Q1','$Q2','$Q3', '$Q4', '$Q5', '$Q6', '$Q7','$Q8','$Q9','$Q10','$score')";
                    mysqli_query($dbc, $sqs);
                    $registered = mysqli_affected_rows($dbc);
                    echo $registered." row is affected.<br><br>";
                }

            }
        }
        ?>

        <!-- PHP QUIZ -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <!-- IDENTIFICATION -->
            First Name: <input type="text" name="firstname" value="<?php echo $firstname; ?>"><span class="error"> * <?php echo $firstnameErr; ?></span> <br><br>
            Last Name:  <input type="text" name="lastname" value="<?php echo $lastname; ?>"><span class="error"> * <?php echo $lastnameErr; ?></span> <br><br>
            Email:      <input type="text" name="email" value="<?php echo $email; ?>"><span class="error"> * <?php echo $emailErr; ?></span> <br><br>
            <!-- QUESTIONS -->
            1. What does PHP stand for? <span class="error"> * <?php echo $QErr; ?></span><br>
                <input type="radio" name="Q1" <?php if(isset($Q1)&&$Q1=="A") echo "checked"; ?> value="A"> A. Personal Home Page
                <input type="radio" name="Q1" <?php if(isset($Q1)&&$Q1=="B") echo "checked"; ?> value="B"> B. Preprocessed Hypertext Processor
                <input type="radio" name="Q1" <?php if(isset($Q1)&&$Q1=="C") echo "checked"; ?> value="C"> C. PHP: Hypertext Preprocessor
                <input type="radio" name="Q1" <?php if(isset($Q1)&&$Q1=="D") echo "checked"; ?> value="D"> D. Programmatic Hyperlink Parser
                <br><br>
            2. Which of the following is the valid way to open a PHP script? <span class="error"> * <?php echo $QErr; ?></span><br>
                <input type="radio" name="Q2" <?php if(isset($Q2)&&$Q2=="A") echo "checked"; ?> value="A"> A. <&nbsp;?php
                <input type="radio" name="Q2" <?php if(isset($Q2)&&$Q2=="B") echo "checked"; ?> value="B"> B. <&nbsp;php_start
                <input type="radio" name="Q2" <?php if(isset($Q2)&&$Q2=="C") echo "checked"; ?> value="C"> C. <&nbsp;=?php
                <input type="radio" name="Q2" <?php if(isset($Q2)&&$Q2=="D") echo "checked"; ?> value="D"> D. <
                <br><br>
            3. What function is used to output text in PHP? <span class="error"> * <?php echo $QErr; ?></span><br>
                <input type="radio" name="Q3" <?php if(isset($Q3)&&$Q3=="A") echo "checked"; ?> value="A"> A. print()
                <input type="radio" name="Q3" <?php if(isset($Q3)&&$Q3=="B") echo "checked"; ?> value="B"> B. echo()
                <input type="radio" name="Q3" <?php if(isset($Q3)&&$Q3=="C") echo "checked"; ?> value="C"> C. write()
                <input type="radio" name="Q3" <?php if(isset($Q3)&&$Q3=="D") echo "checked"; ?> value="D"> D. printf()
                <br><br>
            4. Which of the following is a correct way to comment out a single line of PHP code? <span class="error"> * <?php echo $QErr; ?></span><br>
                <input type="radio" name="Q4" <?php if(isset($Q4)&&$Q4=="A") echo "checked"; ?> value="A"> A. // This is a comment
                <input type="radio" name="Q4" <?php if(isset($Q4)&&$Q4=="B") echo "checked"; ?> value="B"> B. /* This is a comment */
                <input type="radio" name="Q4" <?php if(isset($Q4)&&$Q4=="C") echo "checked"; ?> value="C"> C. <- This is a comment ->
                <input type="radio" name="Q4" <?php if(isset($Q4)&&$Q4=="D") echo "checked"; ?> value="D"> D. # This is a comment
                <br><br>
            5. What symbol is used to concatenate strings in PHP? <span class="error"> * <?php echo $QErr; ?></span><br>
                <input type="radio" name="Q5" <?php if(isset($Q5)&&$Q5=="A") echo "checked"; ?> value="A"> A. +
                <input type="radio" name="Q5" <?php if(isset($Q5)&&$Q5=="B") echo "checked"; ?> value="B"> B. &&
                <input type="radio" name="Q5" <?php if(isset($Q5)&&$Q5=="C") echo "checked"; ?> value="C"> C. .
                <input type="radio" name="Q5" <?php if(isset($Q5)&&$Q5=="D") echo "checked"; ?> value="D"> D. ||
                <br><br>
            6. What function is used to check the length of a string in PHP? <span class="error"> * <?php echo $QErr; ?></span><br>
                <input type="radio" name="Q6" <?php if(isset($Q6)&&$Q6=="A") echo "checked"; ?> value="A"> A. len()
                <input type="radio" name="Q6" <?php if(isset($Q6)&&$Q6=="B") echo "checked"; ?> value="B"> B. strlen()
                <input type="radio" name="Q6" <?php if(isset($Q6)&&$Q6=="C") echo "checked"; ?> value="C"> C. length()
                <input type="radio" name="Q6" <?php if(isset($Q6)&&$Q6=="D") echo "checked"; ?> value="D"> D. strlength()
                <br><br>
            7. Which of the following is used to start a session in PHP? <span class="error"> * <?php echo $QErr; ?></span><br>
                <input type="radio" name="Q7" <?php if(isset($Q7)&&$Q7=="A") echo "checked"; ?> value="A"> A. session_start()
                <input type="radio" name="Q7" <?php if(isset($Q7)&&$Q7=="B") echo "checked"; ?> value="B"> B. start_session()
                <input type="radio" name="Q7" <?php if(isset($Q7)&&$Q7=="C") echo "checked"; ?> value="C"> C. session()
                <input type="radio" name="Q7" <?php if(isset($Q7)&&$Q7=="D") echo "checked"; ?> value="D"> D. begin_session()
                <br><br>
            8. What function is used to include a PHP file into another PHP file? <span class="error"> * <?php echo $QErr; ?></span><br>
                <input type="radio" name="Q8" <?php if(isset($Q8)&&$Q8=="A") echo "checked"; ?> value="A"> A. import()
                <input type="radio" name="Q8" <?php if(isset($Q8)&&$Q8=="B") echo "checked"; ?> value="B"> B. require()
                <input type="radio" name="Q8" <?php if(isset($Q8)&&$Q8=="C") echo "checked"; ?> value="C"> C. include()
                <input type="radio" name="Q8" <?php if(isset($Q8)&&$Q8=="D") echo "checked"; ?> value="D"> D. load()
                <br><br>
            9. Which of the following is used to declare a variable in PHP? <span class="error"> * <?php echo $QErr; ?></span><br>
                <input type="radio" name="Q9" <?php if(isset($Q9)&&$Q9=="A") echo "checked"; ?> value="A"> A. var
                <input type="radio" name="Q9" <?php if(isset($Q9)&&$Q9=="B") echo "checked"; ?> value="B"> B. let
                <input type="radio" name="Q9" <?php if(isset($Q9)&&$Q9=="C") echo "checked"; ?> value="C"> C. $var
                <input type="radio" name="Q9" <?php if(isset($Q9)&&$Q9=="D") echo "checked"; ?> value="D"> D. declare
                <br><br>
            10. What is the default method for submitting HTML forms in PHP? <span class="error"> * <?php echo $QErr; ?></span><br>
                <input type="radio" name="Q10" <?php if(isset($Q10)&&$Q10=="A") echo "checked"; ?> value="A"> A. GET[]
                <input type="radio" name="Q10" <?php if(isset($Q10)&&$Q10=="B") echo "checked"; ?> value="B"> B. POST[]
                <input type="radio" name="Q10" <?php if(isset($Q10)&&$Q10=="C") echo "checked"; ?> value="C"> C. PUT[]
                <input type="radio" name="Q10" <?php if(isset($Q10)&&$Q10=="D") echo "checked"; ?> value="D"> D. DELETE[]
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
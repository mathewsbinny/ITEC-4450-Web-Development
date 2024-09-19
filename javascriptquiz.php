<html>
    <head>
        <title>Lab 4 - JavaScript Quiz</title>
        <style>
            .error {color:#FF0000;}
        </style>
    </head>
    <body>
        <h1>Lab 4 - JavaScript Quiz</h1>
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
            if ($Q3 == "A") {
                $score += 10;
            }
            if ($Q4 == "A") {
                $score += 10;
            }
            if ($Q5 == "B") {
                $score += 10;
            }
            if ($Q6 == "B") {
                $score += 10;
            }
            if ($Q7 == "B") {
                $score += 10;
            }
            if ($Q8 == "B") {
                $score += 10;
            }
            if ($Q9 == "D") {
                $score += 10;
            }
            if ($Q10 == "A") {
                $score += 10;
            }
            echo "Your score for the JavaScript Quiz is ".$score."<br><br>";

            //database validity check
            if($flag==0){
                include "connection.php";
                //check name to make sure it is NOT in the table
                $sqs = "SELECT * from lab4_javascript_results WHERE email = '$email'";
                $queryresult = mysqli_query($dbc, $sqs);
                $num = mysqli_num_rows($queryresult);
                //$num should be 0 indicating email is NOT in the database
                if($num!=0) {
                    echo "You have already taken the quiz!";
                } else {
                    $sqs="INSERT INTO lab4_javascript_results(firstname, lastname, email, Q1, Q2, Q3, Q4, Q5, Q6, Q7, Q8, Q9, Q10, score) VALUES('$firstname', '$lastname', '$email','$Q1','$Q2','$Q3', '$Q4', '$Q5', '$Q6', '$Q7','$Q8','$Q9','$Q10','$score')";
                    mysqli_query($dbc, $sqs);
                    $registered = mysqli_affected_rows($dbc);
                    echo $registered." row is affected.<br><br>";
                }

            }
        }
        ?>

        <!-- JavaScript QUIZ -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <!-- IDENTIFICATION -->
            First Name: <input type="text" name="firstname" value="<?php echo $firstname; ?>"><span class="error"> * <?php echo $firstnameErr; ?></span> <br><br>
            Last Name:  <input type="text" name="lastname" value="<?php echo $lastname; ?>"><span class="error"> * <?php echo $lastnameErr; ?></span> <br><br>
            Email:      <input type="text" name="email" value="<?php echo $email; ?>"><span class="error"> * <?php echo $emailErr; ?></span> <br><br>
            <!-- QUESTIONS -->
            1. What does DOM stand for in JavaScript? <span class="error"> * <?php echo $QErr; ?></span><br>
                <input type="radio" name="Q1" <?php if(isset($Q1)&&$Q1=="A") echo "checked"; ?> value="A"> A. Document Object Model
                <input type="radio" name="Q1" <?php if(isset($Q1)&&$Q1=="B") echo "checked"; ?> value="B"> B. Data Object Model
                <input type="radio" name="Q1" <?php if(isset($Q1)&&$Q1=="C") echo "checked"; ?> value="C"> C. Document Oriented Model
                <input type="radio" name="Q1" <?php if(isset($Q1)&&$Q1=="D") echo "checked"; ?> value="D"> D. Digital Object Model
                <br><br>
            2. Which of the following is NOT a valid JavaScript data type? <span class="error"> * <?php echo $QErr; ?></span><br>
                <input type="radio" name="Q2" <?php if(isset($Q2)&&$Q2=="A") echo "checked"; ?> value="A"> A. String
                <input type="radio" name="Q2" <?php if(isset($Q2)&&$Q2=="B") echo "checked"; ?> value="B"> B. Boolean
                <input type="radio" name="Q2" <?php if(isset($Q2)&&$Q2=="C") echo "checked"; ?> value="C"> C. Character
                <input type="radio" name="Q2" <?php if(isset($Q2)&&$Q2=="D") echo "checked"; ?> value="D"> D. Number
                <br><br>
            3. Which function is used to print something in the console in JavaScript? <span class="error"> * <?php echo $QErr; ?></span><br>
                <input type="radio" name="Q3" <?php if(isset($Q3)&&$Q3=="A") echo "checked"; ?> value="A"> A. console.log()
                <input type="radio" name="Q3" <?php if(isset($Q3)&&$Q3=="B") echo "checked"; ?> value="B"> B. print()
                <input type="radio" name="Q3" <?php if(isset($Q3)&&$Q3=="C") echo "checked"; ?> value="C"> C. log()
                <input type="radio" name="Q3" <?php if(isset($Q3)&&$Q3=="D") echo "checked"; ?> value="D"> D. display()
                <br><br>
            4. Which symbol is used for single-line comments in JavaScript? <span class="error"> * <?php echo $QErr; ?></span><br>
                <input type="radio" name="Q4" <?php if(isset($Q4)&&$Q4=="A") echo "checked"; ?> value="A"> A. //
                <input type="radio" name="Q4" <?php if(isset($Q4)&&$Q4=="B") echo "checked"; ?> value="B"> B. /*
                <input type="radio" name="Q4" <?php if(isset($Q4)&&$Q4=="C") echo "checked"; ?> value="C"> C. #
                <input type="radio" name="Q4" <?php if(isset($Q4)&&$Q4=="D") echo "checked"; ?> value="D"> D. < !--
                <br><br>
            5. Which of the following is a correct way to declare a JavaScript variable? <span class="error"> * <?php echo $QErr; ?></span><br>
                <input type="radio" name="Q5" <?php if(isset($Q5)&&$Q5=="A") echo "checked"; ?> value="A"> A. variable x = 5;
                <input type="radio" name="Q5" <?php if(isset($Q5)&&$Q5=="B") echo "checked"; ?> value="B"> B. var x = 5;
                <input type="radio" name="Q5" <?php if(isset($Q5)&&$Q5=="C") echo "checked"; ?> value="C"> C. x = 5;
                <input type="radio" name="Q5" <?php if(isset($Q5)&&$Q5=="D") echo "checked"; ?> value="D"> D. int x = 5;
                <br><br>
            6. What does the typeof operator return for an array in JavaScript? <span class="error"> * <?php echo $QErr; ?></span><br>
                <input type="radio" name="Q6" <?php if(isset($Q6)&&$Q6=="A") echo "checked"; ?> value="A"> A. "array"
                <input type="radio" name="Q6" <?php if(isset($Q6)&&$Q6=="B") echo "checked"; ?> value="B"> B. "object"
                <input type="radio" name="Q6" <?php if(isset($Q6)&&$Q6=="C") echo "checked"; ?> value="C"> C. "string"
                <input type="radio" name="Q6" <?php if(isset($Q6)&&$Q6=="D") echo "checked"; ?> value="D"> D. "undefined"
                <br><br>
            7. Which keyword is used to declare a function in JavaScript? <span class="error"> * <?php echo $QErr; ?></span><br>
                <input type="radio" name="Q7" <?php if(isset($Q7)&&$Q7=="A") echo "checked"; ?> value="A"> A. func
                <input type="radio" name="Q7" <?php if(isset($Q7)&&$Q7=="B") echo "checked"; ?> value="B"> B. function
                <input type="radio" name="Q7" <?php if(isset($Q7)&&$Q7=="C") echo "checked"; ?> value="C"> C. declare
                <input type="radio" name="Q7" <?php if(isset($Q7)&&$Q7=="D") echo "checked"; ?> value="D"> D. def
                <br><br>
            8. Which method is used to add a new element at the end of an array in JavaScript? <span class="error"> * <?php echo $QErr; ?></span><br>
                <input type="radio" name="Q8" <?php if(isset($Q8)&&$Q8=="A") echo "checked"; ?> value="A"> A. append()
                <input type="radio" name="Q8" <?php if(isset($Q8)&&$Q8=="B") echo "checked"; ?> value="B"> B. push()
                <input type="radio" name="Q8" <?php if(isset($Q8)&&$Q8=="C") echo "checked"; ?> value="C"> C. add()
                <input type="radio" name="Q8" <?php if(isset($Q8)&&$Q8=="D") echo "checked"; ?> value="D"> D. insert()
                <br><br>
            9. What is the result of the expression 5 + "5" in JavaScript? <span class="error"> * <?php echo $QErr; ?></span><br>
                <input type="radio" name="Q9" <?php if(isset($Q9)&&$Q9=="A") echo "checked"; ?> value="A"> A. 10
                <input type="radio" name="Q9" <?php if(isset($Q9)&&$Q9=="B") echo "checked"; ?> value="B"> B. "10"
                <input type="radio" name="Q9" <?php if(isset($Q9)&&$Q9=="C") echo "checked"; ?> value="C"> C. 55
                <input type="radio" name="Q9" <?php if(isset($Q9)&&$Q9=="D") echo "checked"; ?> value="D"> D. "55"
                <br><br>
            10. Which built-in method is used to sort elements in an array in JavaScript? <span class="error"> * <?php echo $QErr; ?></span><br>
                <input type="radio" name="Q10" <?php if(isset($Q10)&&$Q10=="A") echo "checked"; ?> value="A"> A. sort()
                <input type="radio" name="Q10" <?php if(isset($Q10)&&$Q10=="B") echo "checked"; ?> value="B"> B. order()
                <input type="radio" name="Q10" <?php if(isset($Q10)&&$Q10=="C") echo "checked"; ?> value="C"> C. arrange()
                <input type="radio" name="Q10" <?php if(isset($Q10)&&$Q10=="D") echo "checked"; ?> value="D"> D. organize()
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
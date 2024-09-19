<html>
    <head>
        <title>Lab 3 - SQL Quiz</title>
        <style>
            .error {color:#FF0000;}
        </style>
    </head>
    <body>
        <h1>Lab 3 - SQL Quiz</h1>
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
            if ($Q2 == "B") {
                $score += 10;
            }
            if ($Q3 == "A") {
                $score += 10;
            }
            if ($Q4 == "C") {
                $score += 10;
            }
            if ($Q5 == "A") {
                $score += 10;
            }
            if ($Q6 == "A") {
                $score += 10;
            }
            if ($Q7 == "B") {
                $score += 10;
            }
            if ($Q8 == "A") {
                $score += 10;
            }
            if ($Q9 == "D") {
                $score += 10;
            }
            if ($Q10 == "A") {
                $score += 10;
            }
            echo "Your score for the SQL Quiz is ".$score."<br><br>";

            //database validity check
            if($flag==0){
                include "connection.php";
                //check name to make sure it is NOT in the table
                $sqs = "SELECT * from lab3_sql_results WHERE email = '$email'";
                $queryresult = mysqli_query($dbc, $sqs);
                $num = mysqli_num_rows($queryresult);
                //$num should be 0 indicating email is NOT in the database
                if($num!=0) {
                    echo "You have already taken the quiz!";
                } else {
                    $sqs="INSERT INTO lab3_sql_results(firstname, lastname, email, Q1, Q2, Q3, Q4, Q5, Q6, Q7, Q8, Q9, Q10, score) VALUES('$firstname', '$lastname', '$email','$Q1','$Q2','$Q3', '$Q4', '$Q5', '$Q6', '$Q7','$Q8','$Q9','$Q10','$score')";
                    mysqli_query($dbc, $sqs);
                    $registered = mysqli_affected_rows($dbc);
                    echo $registered." row is affected.<br><br>";
                }

            }
        }
        ?>

        <!-- SQL QUIZ -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <!-- IDENTIFICATION -->
            First Name: <input type="text" name="firstname" value="<?php echo $firstname; ?>"><span class="error"> * <?php echo $firstnameErr; ?></span> <br><br>
            Last Name:  <input type="text" name="lastname" value="<?php echo $lastname; ?>"><span class="error"> * <?php echo $lastnameErr; ?></span> <br><br>
            Email:      <input type="text" name="email" value="<?php echo $email; ?>"><span class="error"> * <?php echo $emailErr; ?></span> <br><br>
            <!-- QUESTIONS -->
            1. What does SQL stand for? <span class="error"> * <?php echo $QErr; ?></span><br>
                <input type="radio" name="Q1" <?php if(isset($Q1)&&$Q1=="A") echo "checked"; ?> value="A"> A. Structured Language
                <input type="radio" name="Q1" <?php if(isset($Q1)&&$Q1=="B") echo "checked"; ?> value="B"> B. Simple Query Language
                <input type="radio" name="Q1" <?php if(isset($Q1)&&$Q1=="C") echo "checked"; ?> value="C"> C. Structured Query Language
                <input type="radio" name="Q1" <?php if(isset($Q1)&&$Q1=="D") echo "checked"; ?> value="D"> D. Systematic Query Language
                <br><br>
            2. Which SQL keyword is used to retrieve data from a database? <span class="error"> * <?php echo $QErr; ?></span><br>
                <input type="radio" name="Q2" <?php if(isset($Q2)&&$Q2=="A") echo "checked"; ?> value="A"> A. GET
                <input type="radio" name="Q2" <?php if(isset($Q2)&&$Q2=="B") echo "checked"; ?> value="B"> B. SELECT
                <input type="radio" name="Q2" <?php if(isset($Q2)&&$Q2=="C") echo "checked"; ?> value="C"> C. RETRIEVE
                <input type="radio" name="Q2" <?php if(isset($Q2)&&$Q2=="D") echo "checked"; ?> value="D"> D. FETCH
                <br><br>
            3. Which SQL clause is used to filter the results of a query? <span class="error"> * <?php echo $QErr; ?></span><br>
                <input type="radio" name="Q3" <?php if(isset($Q3)&&$Q3=="A") echo "checked"; ?> value="A"> A. WHERE
                <input type="radio" name="Q3" <?php if(isset($Q3)&&$Q3=="B") echo "checked"; ?> value="B"> B. HAVING
                <input type="radio" name="Q3" <?php if(isset($Q3)&&$Q3=="C") echo "checked"; ?> value="C"> C. FILTER
                <input type="radio" name="Q3" <?php if(isset($Q3)&&$Q3=="D") echo "checked"; ?> value="D"> D. SELECT
                <br><br>
            4. What SQL statement is used to insert new data into a database? <span class="error"> * <?php echo $QErr; ?></span><br>
                <input type="radio" name="Q4" <?php if(isset($Q4)&&$Q4=="A") echo "checked"; ?> value="A"> A. ADD
                <input type="radio" name="Q4" <?php if(isset($Q4)&&$Q4=="B") echo "checked"; ?> value="B"> B. CREATE
                <input type="radio" name="Q4" <?php if(isset($Q4)&&$Q4=="C") echo "checked"; ?> value="C"> C. INSERT INTO
                <input type="radio" name="Q4" <?php if(isset($Q4)&&$Q4=="D") echo "checked"; ?> value="D"> D. ADD DATA
                <br><br>
            5. Which SQL function is used to find the maximum value in a column? <span class="error"> * <?php echo $QErr; ?></span><br>
                <input type="radio" name="Q5" <?php if(isset($Q5)&&$Q5=="A") echo "checked"; ?> value="A"> A. MAX()
                <input type="radio" name="Q5" <?php if(isset($Q5)&&$Q5=="B") echo "checked"; ?> value="B"> B. MIN()
                <input type="radio" name="Q5" <?php if(isset($Q5)&&$Q5=="C") echo "checked"; ?> value="C"> C. AVG()
                <input type="radio" name="Q5" <?php if(isset($Q5)&&$Q5=="D") echo "checked"; ?> value="D"> D. SUM()
                <br><br>
            6. What SQL keyword is used to sort the results of a query in ascending order? <span class="error"> * <?php echo $QErr; ?></span><br>
                <input type="radio" name="Q6" <?php if(isset($Q6)&&$Q6=="A") echo "checked"; ?> value="A"> A. ASC
                <input type="radio" name="Q6" <?php if(isset($Q6)&&$Q6=="B") echo "checked"; ?> value="B"> B. ORDER
                <input type="radio" name="Q6" <?php if(isset($Q6)&&$Q6=="C") echo "checked"; ?> value="C"> C. SORT
                <input type="radio" name="Q6" <?php if(isset($Q6)&&$Q6=="D") echo "checked"; ?> value="D"> D. ASCENDING
                <br><br>
            7. Which SQL command is used to delete data from a database? <span class="error"> * <?php echo $QErr; ?></span><br>
                <input type="radio" name="Q7" <?php if(isset($Q7)&&$Q7=="A") echo "checked"; ?> value="A"> A. REMOVE
                <input type="radio" name="Q7" <?php if(isset($Q7)&&$Q7=="B") echo "checked"; ?> value="B"> B. DELETE FROM
                <input type="radio" name="Q7" <?php if(isset($Q7)&&$Q7=="C") echo "checked"; ?> value="C"> C. ERASE
                <input type="radio" name="Q7" <?php if(isset($Q7)&&$Q7=="D") echo "checked"; ?> value="D"> D. DROP
                <br><br>
            8. What SQL clause is used to group rows that have the same values into summary rows? <span class="error"> * <?php echo $QErr; ?></span><br>
                <input type="radio" name="Q8" <?php if(isset($Q8)&&$Q8=="A") echo "checked"; ?> value="A"> A. GROUP BY
                <input type="radio" name="Q8" <?php if(isset($Q8)&&$Q8=="B") echo "checked"; ?> value="B"> B. ORDER BY
                <input type="radio" name="Q8" <?php if(isset($Q8)&&$Q8=="C") echo "checked"; ?> value="C"> C. HAVING
                <input type="radio" name="Q8" <?php if(isset($Q8)&&$Q8=="D") echo "checked"; ?> value="D"> D. GROUP
                <br><br>
            9. Which SQL statement is used to modify existing data in a database? <span class="error"> * <?php echo $QErr; ?></span><br>
                <input type="radio" name="Q9" <?php if(isset($Q9)&&$Q9=="A") echo "checked"; ?> value="A"> A. CHANGE
                <input type="radio" name="Q9" <?php if(isset($Q9)&&$Q9=="B") echo "checked"; ?> value="B"> B. MODIFY
                <input type="radio" name="Q9" <?php if(isset($Q9)&&$Q9=="C") echo "checked"; ?> value="C"> C. ALTER
                <input type="radio" name="Q9" <?php if(isset($Q9)&&$Q9=="D") echo "checked"; ?> value="D"> D. UPDATE
                <br><br>
            10. What SQL function is used to count the number of rows in a result set? <span class="error"> * <?php echo $QErr; ?></span><br>
                <input type="radio" name="Q10" <?php if(isset($Q10)&&$Q10=="A") echo "checked"; ?> value="A"> A. COUNT()
                <input type="radio" name="Q10" <?php if(isset($Q10)&&$Q10=="B") echo "checked"; ?> value="B"> B. TOTAL()
                <input type="radio" name="Q10" <?php if(isset($Q10)&&$Q10=="C") echo "checked"; ?> value="C"> C. NUM_ROWS()
                <input type="radio" name="Q10" <?php if(isset($Q10)&&$Q10=="D") echo "checked"; ?> value="D"> D. ROW_COUNT()
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
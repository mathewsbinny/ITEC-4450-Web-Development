<html>
    <head>
        <title>Lab 3</title>
        <style>
            .error {color:#FF0000;}
        </style>
    </head>
    <body>
        <h1>Lab 3</h1>
        <p>Submitted by Mathews Binny</p>
        <?php
            //$Q1=$Q1Err=$Q2=$Q2Err=$Q3=$Q3Err=$Q4=$Q4Err=$Q5=$Q5Err=$Q6=$Q6Err=$Q7=$Q7Err=$Q8=$Q8Err=$Q9=$Q9Err=$Q10=$Q10Err="";
            $Q1Err = $Q2Err = $Q3Err = $Q4Err = $Q5Err = $Q6Err = $Q7Err = $Q8Err = $Q9Err = $Q10Err = "";
            $Q1 = $Q2 = $Q3 = $Q4 = $Q5 = $Q6 = $Q7 = $Q8 = $Q9 = $Q10 = "";

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
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                if($Q1=="2") {
                    echo "Your answer for Question 1: ".$Q1."<br>";
                } else {
                    $Q1Err="Please try Question 1 again.";
                }
                if($Q2=="8") {
                    echo "Your answer for Question 2: ".$Q2."<br>";
                } else {
                    $Q2Err="Please try Question 2 again.";
                }
                if($Q3=="10") {
                    echo "Your answer for Question 3: ".$Q3."<br>";
                } else {
                    $Q3Err="Please try Question 3 again.";
                }
                if($Q4=="1") {
                    echo "Your answer for Question 4: ".$Q4."<br>";
                } else {
                    $Q4Err="Please try Question 4 again.";
                }
                if($Q5=="5") {
                    echo "Your answer for Question 5: ".$Q5."<br>";
                } else {
                    $Q5Err="Please try Question 5 again.";
                }
                if($Q6=="3") {
                    echo "Your answer for Question 6: ".$Q6."<br>";
                } else {
                    $Q6Err="Please try Question 6 again.";
                }
                if($Q7=="28") {
                    echo "Your answer for Question 7: ".$Q7."<br>";
                } else {
                    $Q7Err="Please try Question 7 again.";
                }
                if($Q8=="4") {
                    echo "Your answer for Question 8: ".$Q8."<br>";
                } else {
                    $Q8Err="Please try Question 8 again.";
                }
                if($Q9=="9") {
                    echo "Your answer for Question 9: ".$Q9."<br>";
                } else {
                    $Q9Err="Please try Question 9 again.";
                }
                if($Q10=="3") {
                    echo "Your answer for Question 10: ".$Q10."<br>";
                } else {
                    $Q10Err="Please try Question 10 again.";
                }

            }
            
        ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            1. What is 1+1 ? <span class="error"> * <?php echo $Q1Err; ?></span><br>
                <input type="radio" name="Q1" <?php if(isset($Q1)&&$Q1=="10") echo "checked"; ?> value="10"> 10
                <input type="radio" name="Q1" <?php if(isset($Q1)&&$Q1=="2") echo "checked"; ?> value="2"> 2
                <input type="radio" name="Q1" <?php if(isset($Q1)&&$Q1=="3") echo "checked"; ?> value="3"> 3
                <br>
            2. What is 3+5 ? <span class="error"> * <?php echo $Q2Err; ?></span><br>
                <input type="radio" name="Q2" <?php if(isset($Q2)&&$Q2=="7") echo "checked"; ?> value="7"> 7
                <input type="radio" name="Q2" <?php if(isset($Q2)&&$Q2=="8") echo "checked"; ?> value="8"> 8
                <input type="radio" name="Q2" <?php if(isset($Q2)&&$Q2=="3") echo "checked"; ?> value="3"> 3
                <br>
            3. What is 5+5 ? <span class="error"> * <?php echo $Q3Err; ?></span><br>
                <input type="radio" name="Q3" <?php if(isset($Q3)&&$Q3=="10") echo "checked"; ?> value="10"> 10
                <input type="radio" name="Q3" <?php if(isset($Q3)&&$Q3=="25") echo "checked"; ?> value="25"> 25
                <input type="radio" name="Q3" <?php if(isset($Q3)&&$Q3=="5") echo "checked"; ?> value="5"> 5
                <br>
            4. What is 8-7 ? <span class="error"> * <?php echo $Q4Err; ?></span><br>
                <input type="radio" name="Q4" <?php if(isset($Q4)&&$Q4=="100") echo "checked"; ?> value="100"> 100
                <input type="radio" name="Q4" <?php if(isset($Q4)&&$Q4=="2") echo "checked"; ?> value="2"> 2
                <input type="radio" name="Q4" <?php if(isset($Q4)&&$Q4=="1") echo "checked"; ?> value="1"> 1
                <br>
            5. What is 10-5 ? <span class="error"> * <?php echo $Q5Err; ?></span><br>
                <input type="radio" name="Q5" <?php if(isset($Q5)&&$Q5=="5") echo "checked"; ?> value="5"> 5
                <input type="radio" name="Q5" <?php if(isset($Q5)&&$Q5=="25") echo "checked"; ?> value="25"> 25
                <input type="radio" name="Q5" <?php if(isset($Q5)&&$Q5=="15") echo "checked"; ?> value="15"> 15
                <br>
            6. What is 15-12 ? <span class="error"> * <?php echo $Q6Err; ?></span><br>
                <input type="radio" name="Q6" <?php if(isset($Q6)&&$Q6=="27") echo "checked"; ?> value="27"> 27
                <input type="radio" name="Q6" <?php if(isset($Q6)&&$Q6=="2") echo "checked"; ?> value="2"> 2
                <input type="radio" name="Q6" <?php if(isset($Q6)&&$Q6=="3") echo "checked"; ?> value="3"> 3
                <br>
            7. What is 7*4 ? <span class="error"> * <?php echo $Q7Err; ?></span><br>
                <input type="radio" name="Q7" <?php if(isset($Q7)&&$Q7=="28") echo "checked"; ?> value="28"> 28
                <input type="radio" name="Q7" <?php if(isset($Q7)&&$Q7=="21") echo "checked"; ?> value="21"> 21
                <input type="radio" name="Q7" <?php if(isset($Q7)&&$Q7=="35") echo "checked"; ?> value="35"> 35
                <br>
            8. What is 8/2 ? <span class="error"> * <?php echo $Q8Err; ?></span><br>
                <input type="radio" name="Q8" <?php if(isset($Q8)&&$Q8=="4") echo "checked"; ?> value="4"> 4
                <input type="radio" name="Q8" <?php if(isset($Q8)&&$Q8=="16") echo "checked"; ?> value="16"> 16
                <input type="radio" name="Q8" <?php if(isset($Q8)&&$Q8=="0") echo "checked"; ?> value="0"> 0
                <br>
            9. What is 3*3 ? <span class="error"> * <?php echo $Q9Err; ?></span><br>
                <input type="radio" name="Q9" <?php if(isset($Q9)&&$Q9=="3") echo "checked"; ?> value="3"> 3
                <input type="radio" name="Q9" <?php if(isset($Q9)&&$Q9=="6") echo "checked"; ?> value="6"> 6
                <input type="radio" name="Q9" <?php if(isset($Q9)&&$Q9=="9") echo "checked"; ?> value="9"> 9
                <br>
            10. What is 9/3 ? <span class="error"> * <?php echo $Q10Err; ?></span><br>
                <input type="radio" name="Q10" <?php if(isset($Q10)&&$Q10=="0") echo "checked"; ?> value="0"> 0
                <input type="radio" name="Q10" <?php if(isset($Q10)&&$Q10=="4") echo "checked"; ?> value="4"> 4
                <input type="radio" name="Q10" <?php if(isset($Q10)&&$Q10=="3") echo "checked"; ?> value="3"> 3
            <br><br>
            <input type="submit">
        </form>
    </body>
</html>
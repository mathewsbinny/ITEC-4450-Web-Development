<?php
    session_start();
    $id="";
    $id = $_SESSION["id"];
    echo "Session ID is ".$id."<br>"; // for developer
?>

<html>
    <head>
        <title>Online Test - HTML/CSS</title>
        <style>
            .error {color:#FF0000;}
        </style>
    </head>
    <body>
        <h2>Welcome to the FREE online test</h2>
        <?php
            include "user_nav.php";
            include "input_test.php";
            $Q1Msg=$Q2Msg=$Q3Msg=$Q4Msg=$Q5Msg=$Q6Msg=$Q7Msg=$Q8Msg=$Q9Msg=$Q10Msg="";
            $Q1=$Q2=$Q3=$Q4=$Q5=$Q6=$Q7=$Q8=$Q9=$Q10="";
            $flag=0; // no red flag
            $quizScore=0;

            //When the user clicks submit button
            if($_SERVER["REQUEST_METHOD"]=="POST") {
                //Q1
                if(empty($_POST["Q1"])) {
                    $Q1Msg = "You forgot to answer this question";
                    $flag=1;
                } else {
                    $Q1=test_input($_POST["Q1"]);
                    if($Q1=="A") {
                        $Q1Msg = "Correct Answer";
                        $quizScore ++;
                    } else {
                        $Q1Msg = "Incorrect!";
                    }
                }
                //Q2
                if(empty($_POST["Q2"])) {
                    $Q2Msg = "You forgot to answer this question";
                    $flag=1;
                } else {
                    $Q2=test_input($_POST["Q2"]);
                    if($Q2=="C") {
                        $Q2Msg = "Correct Answer";
                        $quizScore ++;
                    } else {
                        $Q2Msg = "Incorrect!";
                    }
                }
                //Q3
                if(empty($_POST["Q3"])) {
                    $Q3Msg = "You forgot to answer this question";
                    $flag=1;
                } else {
                    $Q3=test_input($_POST["Q3"]);
                    if($Q3=="B") {
                        $Q3Msg = "Correct Answer";
                        $quizScore ++;
                    } else {
                        $Q3Msg = "Incorrect!";
                    }
                }
                //Q4
                if(empty($_POST["Q4"])) {
                    $Q4Msg = "You forgot to answer this question";
                    $flag=1;
                } else {
                    $Q4=test_input($_POST["Q4"]);
                    if($Q4=="A") {
                        $Q4Msg = "Correct Answer";
                        $quizScore ++;
                    } else {
                        $Q4Msg = "Incorrect!";
                    }
                }
                //Q5
                if(empty($_POST["Q5"])) {
                    $Q5Msg = "You forgot to answer this question";
                    $flag=1;
                } else {
                    $Q5=test_input($_POST["Q5"]);
                    if($Q5=="B") {
                        $Q5Msg = "Correct Answer";
                        $quizScore ++;
                    } else {
                        $Q5Msg = "Incorrect!";
                    }
                }
                //Q6
                if(empty($_POST["Q6"])) {
                    $Q6Msg = "You forgot to answer this question";
                    $flag=1;
                } else {
                    $Q6=test_input($_POST["Q6"]);
                    if($Q6=="A") {
                        $Q6Msg = "Correct Answer";
                        $quizScore ++;
                    } else {
                        $Q6Msg = "Incorrect!";
                    }
                }
                //Q7
                if(empty($_POST["Q7"])) {
                    $Q7Msg = "You forgot to answer this question";
                    $flag=1;
                } else {
                    $Q7=test_input($_POST["Q7"]);
                    if($Q7=="A") {
                        $Q7Msg = "Correct Answer";
                        $quizScore ++;
                    } else {
                        $Q7Msg = "Incorrect!";
                    }
                }
                //Q8
                if(empty($_POST["Q8"])) {
                    $Q8Msg = "You forgot to answer this question";
                    $flag=1;
                } else {
                    $Q8=test_input($_POST["Q8"]);
                    if($Q8=="B") {
                        $Q8Msg = "Correct Answer";
                        $quizScore ++;
                    } else {
                        $Q8Msg = "Incorrect!";
                    }
                }
                //Q9
                if(empty($_POST["Q9"])) {
                    $Q9Msg = "You forgot to answer this question";
                    $flag=1;
                } else {
                    $Q9=test_input($_POST["Q9"]);
                    if($Q9=="B") {
                        $Q9Msg = "Correct Answer";
                        $quizScore ++;
                    } else {
                        $Q9Msg = "Incorrect!";
                    }
                }
                //Q10
                if(empty($_POST["Q10"])) {
                    $Q10Msg = "You forgot to answer this question";
                    $flag=1;
                } else {
                    $Q10=test_input($_POST["Q10"]);
                    if($Q10=="A") {
                        $Q10Msg = "Correct Answer";
                        $quizScore ++;
                    } else {
                        $Q10Msg = "Incorrect!";
                    }
                }


                $quizResult = $quizScore/5 * 100;
                //no red flag
                if($flag==0) {
                    //connect with database
                    //BUGFIX: if statement to check if there is already result in database
                    include "connection.php";
                    $qs="UPDATE users SET quiz3=$quizResult WHERE id=$id";
                    echo "query is ".$qs; //for developers only
                    $returnValue=mysqli_query($dbc, $qs);
                    echo "<br>The return value is ".$returnValue; //for developers

                    if($returnValue) {
                        $msg = "<br> Thank you for completing the HTML/CSS Assessment!";
                    } else {
                        $msg = "<br> Cannot save your assessment result. Try again later.";
                    }
                    echo $msg;
                }
            }
        ?>
        <p>Feel free to access your HTML/CSS skills!</p>
        <h1>HTML/CSS Questions</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
            1. What does HTML stand for? <span class="error"> * <?php echo $Q1Msg; ?> </span><br>
            <input type="radio" name="Q1" <?php if(isset($Q1)&&$Q1=="A") echo "checked"; ?> value="A"> A. Hyper Text Markup Language
            <input type="radio" name="Q1" <?php if(isset($Q1)&&$Q1=="B") echo "checked"; ?> value="B"> B. High Text Markup Language
            <input type="radio" name="Q1" <?php if(isset($Q1)&&$Q1=="C") echo "checked"; ?> value="C"> C. Hyperlink and Text Markup Language
            <input type="radio" name="Q1" <?php if(isset($Q1)&&$Q1=="D") echo "checked"; ?> value="D"> D. Hypertext Transfer Markup Language
            <br><br>

            2. Which HTML tag is used to define an unordered list? <span class="error"> * <?php echo $Q2Msg; ?> </span><br>
            <input type="radio" name="Q2" <?php if(isset($Q2)&&$Q2=="A") echo "checked"; ?> value="A"> A. <&nbsp;list&nbsp;>
            <input type="radio" name="Q2" <?php if(isset($Q2)&&$Q2=="B") echo "checked"; ?> value="B"> B. <&nbsp;ol&nbsp;>
            <input type="radio" name="Q2" <?php if(isset($Q2)&&$Q2=="C") echo "checked"; ?> value="C"> C. <&nbsp;ul&nbsp;>
            <input type="radio" name="Q2" <?php if(isset($Q2)&&$Q2=="D") echo "checked"; ?> value="D"> D. <&nbsp;dl&nbsp;>
            <br><br>

            3. Which HTML tag is used to create a hyperlink? <span class="error"> * <?php echo $Q3Msg; ?> </span><br>
            <input type="radio" name="Q3" <?php if(isset($Q3)&&$Q3=="A") echo "checked"; ?> value="A"> A. <&nbsp;link&nbsp;>
            <input type="radio" name="Q3" <?php if(isset($Q3)&&$Q3=="B") echo "checked"; ?> value="B"> B. <&nbsp;a&nbsp;>
            <input type="radio" name="Q3" <?php if(isset($Q3)&&$Q3=="C") echo "checked"; ?> value="C"> C. <&nbsp;href&nbsp;>
            <input type="radio" name="Q3" <?php if(isset($Q3)&&$Q3=="D") echo "checked"; ?> value="D"> D. <&nbsp;hyperlink&nbsp;>
            <br><br>

            4. What HTML tag is used to define the metadata of an HTML document? <span class="error"> * <?php echo $Q4Msg; ?> </span><br>
            <input type="radio" name="Q4" <?php if(isset($Q4)&&$Q4=="A") echo "checked"; ?> value="A"> A. <&nbsp;meta&nbsp;>
            <input type="radio" name="Q4" <?php if(isset($Q4)&&$Q4=="B") echo "checked"; ?> value="B"> B. <&nbsp;head&nbsp;>
            <input type="radio" name="Q4" <?php if(isset($Q4)&&$Q4=="C") echo "checked"; ?> value="C"> C. <&nbsp;title&nbsp;>
            <input type="radio" name="Q4" <?php if(isset($Q4)&&$Q4=="D") echo "checked"; ?> value="D"> D. <&nbsp;body&nbsp;>
            <br><br>
            
            5. Which HTML tag is used to create a line break? <span class="error"> * <?php echo $Q5Msg; ?> </span><br>
            <input type="radio" name="Q5" <?php if(isset($Q5)&&$Q5=="A") echo "checked"; ?> value="A"> A. <&nbsp;break&nbsp;>
            <input type="radio" name="Q5" <?php if(isset($Q5)&&$Q5=="B") echo "checked"; ?> value="B"> B. <&nbsp;br&nbsp;>
            <input type="radio" name="Q5" <?php if(isset($Q5)&&$Q5=="C") echo "checked"; ?> value="C"> C. <&nbsp;lb&nbsp;>
            <input type="radio" name="Q5" <?php if(isset($Q5)&&$Q5=="D") echo "checked"; ?> value="D"> D. <&nbsp;line&nbsp;>
            <br><br>

            6. What CSS property is used to add a border around an element? <span class="error"> * <?php echo $Q6Msg; ?> </span><br>
            <input type="radio" name="Q6" <?php if(isset($Q6)&&$Q6=="A") echo "checked"; ?> value="A"> A. border
            <input type="radio" name="Q6" <?php if(isset($Q6)&&$Q6=="B") echo "checked"; ?> value="B"> B. border-style
            <input type="radio" name="Q6" <?php if(isset($Q6)&&$Q6=="C") echo "checked"; ?> value="C"> C. add-border
            <input type="radio" name="Q6" <?php if(isset($Q6)&&$Q6=="D") echo "checked"; ?> value="D"> D. border-color
            <br><br>

            7. Which CSS property is used to align text to the center horizontally? <span class="error"> * <?php echo $Q7Msg; ?> </span><br>
            <input type="radio" name="Q7" <?php if(isset($Q7)&&$Q7=="A") echo "checked"; ?> value="A"> A. text-align
            <input type="radio" name="Q7" <?php if(isset($Q7)&&$Q7=="B") echo "checked"; ?> value="B"> B. align-text
            <input type="radio" name="Q7" <?php if(isset($Q7)&&$Q7=="C") echo "checked"; ?> value="C"> C. center-text
            <input type="radio" name="Q7" <?php if(isset($Q7)&&$Q7=="D") echo "checked"; ?> value="D"> D. text-center
            <br><br>

            8. Which CSS property is used if we want to create a space between an element and the edge of the container or the border? <span class="error"> * <?php echo $Q8Msg; ?> </span><br>
            <input type="radio" name="Q8" <?php if(isset($Q8)&&$Q8=="A") echo "checked"; ?> value="A"> A. margin
            <input type="radio" name="Q8" <?php if(isset($Q8)&&$Q8=="B") echo "checked"; ?> value="B"> B. padding
            <input type="radio" name="Q8" <?php if(isset($Q8)&&$Q8=="C") echo "checked"; ?> value="C"> C. spacing
            <input type="radio" name="Q8" <?php if(isset($Q8)&&$Q8=="D") echo "checked"; ?> value="D"> D. border-spacing
            <br><br>

            9. Which CSS property is used to control the size of text? <span class="error"> * <?php echo $Q9Msg; ?> </span><br>
            <input type="radio" name="Q9" <?php if(isset($Q9)&&$Q9=="A") echo "checked"; ?> value="A"> A. text-size
            <input type="radio" name="Q9" <?php if(isset($Q9)&&$Q9=="B") echo "checked"; ?> value="B"> B. font-size
            <input type="radio" name="Q9" <?php if(isset($Q9)&&$Q9=="C") echo "checked"; ?> value="C"> C. size
            <input type="radio" name="Q9" <?php if(isset($Q9)&&$Q9=="D") echo "checked"; ?> value="D"> D. text-style
            <br><br>

            10. What CSS property is used to remove the underline from links? <span class="error"> * <?php echo $Q10Msg; ?> </span><br>
            <input type="radio" name="Q10" <?php if(isset($Q10)&&$Q10=="A") echo "checked"; ?> value="A"> A. text-decoration
            <input type="radio" name="Q10" <?php if(isset($Q10)&&$Q10=="B") echo "checked"; ?> value="B"> B. underline
            <input type="radio" name="Q10" <?php if(isset($Q10)&&$Q10=="C") echo "checked"; ?> value="C"> C. decoration
            <input type="radio" name="Q10" <?php if(isset($Q10)&&$Q10=="D") echo "checked"; ?> value="D"> D. link-decoration
            <br><br>
            <input type="Submit">
        </form>
    </body>
</html>
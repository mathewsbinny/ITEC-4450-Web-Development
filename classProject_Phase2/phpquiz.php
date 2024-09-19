<?php
    session_start();
    $id="";
    $id = $_SESSION["id"];
    echo "Session ID is ".$id."<br>"; // for developer
?>

<html>
    <head>
        <title>Online Test - PHP</title>
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
                    if($Q1=="C") {
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
                    if($Q2=="A") {
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
                    if($Q3=="C") {
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
                    if($Q4=="F") {
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
                    if($Q5=="A") {
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
                    if($Q6=="B") {
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
                    if($Q8=="C") {
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
                    if($Q9=="C") {
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
                    $qs="UPDATE users SET quiz1=$quizResult WHERE id=$id";
                    echo "query is ".$qs; //for developers only
                    $returnValue=mysqli_query($dbc, $qs);
                    echo "<br>The return value is ".$returnValue; //for developers

                    if($returnValue) {
                        $msg = "<br> Thank you for completing the PHP Assessment!";
                    } else {
                        $msg = "<br> Cannot save your assessment result. Try again later.";
                    }
                    echo $msg;
                }
            }
        ?>
        <p>Feel free to access your PHP skills!</p>
        <h1>PHP Questions</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
            1. What does PHP stand for? <span class="error"> * <?php echo $Q1Msg; ?> </span><br>
            <input type="radio" name="Q1" <?php if(isset($Q1)&&$Q1=="A") echo "checked"; ?> value="A"> A. Private Home Page
            <input type="radio" name="Q1" <?php if(isset($Q1)&&$Q1=="B") echo "checked"; ?> value="B"> B. Personal Hypertext Processor
            <input type="radio" name="Q1" <?php if(isset($Q1)&&$Q1=="C") echo "checked"; ?> value="C"> C. PHP: Hypertext Preprocessor
            <br><br>

            2. How would you write "Hello World" in PHP? <span class="error"> * <?php echo $Q2Msg; ?> </span><br>
            <input type="radio" name="Q2" <?php if(isset($Q2)&&$Q2=="A") echo "checked"; ?> value="A"> A. echo "Hello World!";
            <input type="radio" name="Q2" <?php if(isset($Q2)&&$Q2=="B") echo "checked"; ?> value="B"> B. System.out.println("Hello World!");
            <input type="radio" name="Q2" <?php if(isset($Q2)&&$Q2=="C") echo "checked"; ?> value="C"> C. print "Hello World!";
            <br><br>

            3. PHP Syntax is most similar to: <span class="error"> * <?php echo $Q3Msg; ?> </span><br>
            <input type="radio" name="Q3" <?php if(isset($Q3)&&$Q3=="A") echo "checked"; ?> value="A"> A. C#
            <input type="radio" name="Q3" <?php if(isset($Q3)&&$Q3=="B") echo "checked"; ?> value="B"> B. Java
            <input type="radio" name="Q3" <?php if(isset($Q3)&&$Q3=="C") echo "checked"; ?> value="C"> C. JavaScript
            <br><br>

            4. When using POST method in PHP, are variables displayed in the URL?: <span class="error"> * <?php echo $Q4Msg; ?> </span><br>
            <input type="radio" name="Q4" <?php if(isset($Q4)&&$Q4=="T") echo "checked"; ?> value="T"> True
            <input type="radio" name="Q4" <?php if(isset($Q4)&&$Q4=="F") echo "checked"; ?> value="F"> False
            <br><br>
            
            5. What is the correct way to end a PHP statement? <span class="error"> * <?php echo $Q5Msg; ?> </span><br>
            <input type="radio" name="Q5" <?php if(isset($Q5)&&$Q5=="A") echo "checked"; ?> value="A"> A. ;
            <input type="radio" name="Q5" <?php if(isset($Q5)&&$Q5=="B") echo "checked"; ?> value="B"> B. .
            <input type="radio" name="Q5" <?php if(isset($Q5)&&$Q5=="C") echo "checked"; ?> value="C"> C. ,
            <input type="radio" name="Q5" <?php if(isset($Q5)&&$Q5=="D") echo "checked"; ?> value="D"> D. php
            <br><br>

            6. What function is used to check the length of a string in PHP? <span class="error"> * <?php echo $Q6Msg; ?> </span><br>
            <input type="radio" name="Q6" <?php if(isset($Q6)&&$Q6=="A") echo "checked"; ?> value="A"> A. len()
            <input type="radio" name="Q6" <?php if(isset($Q6)&&$Q6=="B") echo "checked"; ?> value="B"> B. strlen()
            <input type="radio" name="Q6" <?php if(isset($Q6)&&$Q6=="C") echo "checked"; ?> value="C"> C. length()
            <input type="radio" name="Q6" <?php if(isset($Q6)&&$Q6=="D") echo "checked"; ?> value="D"> D. strlength()
            <br><br>

            7. Which of the following is used to start a session in PHP? <span class="error"> * <?php echo $Q7Msg; ?> </span><br>
            <input type="radio" name="Q7" <?php if(isset($Q7)&&$Q7=="A") echo "checked"; ?> value="A"> A. session_start()
            <input type="radio" name="Q7" <?php if(isset($Q7)&&$Q7=="B") echo "checked"; ?> value="B"> B. open_session()
            <input type="radio" name="Q7" <?php if(isset($Q7)&&$Q7=="C") echo "checked"; ?> value="C"> C. session()
            <input type="radio" name="Q7" <?php if(isset($Q7)&&$Q7=="D") echo "checked"; ?> value="D"> D. begin_session()
            <br><br>

            8. What function is used to include a PHP file into another PHP file? <span class="error"> * <?php echo $Q8Msg; ?> </span><br>
            <input type="radio" name="Q8" <?php if(isset($Q8)&&$Q8=="A") echo "checked"; ?> value="A"> A. import()
            <input type="radio" name="Q8" <?php if(isset($Q8)&&$Q8=="B") echo "checked"; ?> value="B"> B. require()
            <input type="radio" name="Q8" <?php if(isset($Q8)&&$Q8=="C") echo "checked"; ?> value="C"> C. include()
            <input type="radio" name="Q8" <?php if(isset($Q8)&&$Q8=="D") echo "checked"; ?> value="D"> D. load()
            <br><br>

            9. Which of the following is used to declare a variable in PHP? <span class="error"> * <?php echo $Q9Msg; ?> </span><br>
            <input type="radio" name="Q9" <?php if(isset($Q9)&&$Q9=="A") echo "checked"; ?> value="A"> A. var
            <input type="radio" name="Q9" <?php if(isset($Q9)&&$Q9=="B") echo "checked"; ?> value="B"> B. let
            <input type="radio" name="Q9" <?php if(isset($Q9)&&$Q9=="C") echo "checked"; ?> value="C"> C. $var
            <input type="radio" name="Q9" <?php if(isset($Q9)&&$Q9=="D") echo "checked"; ?> value="D"> D. declare
            <br><br>

            10. What is the default method for submitting HTML forms in PHP? <span class="error"> * <?php echo $Q10Msg; ?> </span><br>
            <input type="radio" name="Q10" <?php if(isset($Q10)&&$Q10=="A") echo "checked"; ?> value="A"> A. GET[]
            <input type="radio" name="Q10" <?php if(isset($Q10)&&$Q10=="B") echo "checked"; ?> value="B"> B. POST[]
            <input type="radio" name="Q10" <?php if(isset($Q10)&&$Q10=="C") echo "checked"; ?> value="C"> C. PUT[]
            <input type="radio" name="Q10" <?php if(isset($Q10)&&$Q10=="D") echo "checked"; ?> value="D"> D. DELETE[]
            <br><br>
            <input type="Submit">
        </form>
    </body>
</html>
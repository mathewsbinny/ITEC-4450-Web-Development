<?php
    $nameCookie = $pwCookie = $bgcolorCookie = $textcolorCookie = "";
    if(isset($_POST["submit"])) {
        echo "Set my cookies: "; //for developer
        $nameCookie = $_POST["username"];
        $pwCookie = $_POST["pw"];
        $bgcolorCookie = $_POST["bgcolor"];
        $textcolorCookie = $_POST["textcolor"];

        echo "<br> Username Cookie is ".$nameCookie;
        echo "<br> Password Cookie is ".$pwCookie;
        echo "<br> Background Color Cookie is ".$bgcolorCookie;
        echo "<br> Text Color Cookie is ".$textcolorCookie;

        $expire=time()+ 30*24*60*60 ; // set the expiration to 30 days from now
        setcookie("username", $nameCookie, $expire, "/");
        setcookie("pw", $pwCookie, $expire, "/");
        setcookie("bgcolor", $bgcolorCookie, $expire, "/");
        setcookie("textcolor", $textcolorCookie, $expire, "/");
    }
    if(isset($_POST["clear"])) {
        echo "Clear all the cookies: <br>";
        $expire=time()-24*60*60; //set the expiration to before today
        setcookie("username", $nameCookie, $expire, "/");
        setcookie("pw", $pwCookie, $expire, "/");
        setcookie("bgcolor", $bgcolorCookie, $expire, "/");
        setcookie("textcolor", $textcolorCookie, $expire, "/");
    }
?>
<html>
    <head>
        <title>Activity 12 - March 26</title>
    </head>
    <style>
        .error{color:#FF0000;}
    </style>
    <body style="background-color:<?php
        if (isset($_COOKIE['bgcolor'])) {
            echo $_COOKIE['bgcolor'];
        } else {
            echo 'white';
        } ?> ; color:<?php
        if (isset($_COOKIE['textcolor'])) {
            echo $_COOKIE['textcolor'];
        } else {
            echo 'black';
        } ?> ;">
        <h2>Cookies</h2>
        <p>Submitted by Mathews Binny</p>
        <hr>
        <p>This activity will show you how to </p>
        <ol>
            <li>Set cookies</li>
            <li>Clear cookies</li>
            <li>Respond to multiple buttons</li>
        </ol>
        <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Please enter your username: <input type="text" name="username" value="<?php
                if(isset($_COOKIE['username'])) {
                    echo $_COOKIE['username'];
                } ?>">
            <br><br>
            Please enter your password: <input type="text" name="pw" value="<?php
                if(isset($_COOKIE['pw'])) {
                    echo $_COOKIE['pw'];
                } ?>">
            <br><br>
            Choose background color: <input type="color" name="bgcolor" value="<?php
                if(isset($_COOKIE['bgcolor'])) {
                    echo $_COOKIE['bgcolor'];
                } else {
                    echo 'white';
                }?>">
            <br><br>
            Choose text color: <input type="color" name="textcolor" value="<?php
                if(isset($_COOKIE['textcolor'])) {
                    echo $_COOKIE['textcolor'];
                } else {
                    echo 'black';
                } ?>">
            <br><br>

            <input type="submit" name="submit" value="SUBMIT">
            <input type="submit" name="clear" value="CLEAR ALL COOKIES">
        </form>
    </body>
</html>
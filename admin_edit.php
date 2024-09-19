<html>
    <head>
        <title>Online Test - Admin Editor</title>
    </head>
    <body>
        <h2>Welcome to the Admin Editor</h2>
        <?php
            include "admin_nav.php";
            $id = $_GET['id'];
            echo "ID of this user is ".$id."<br>";

            //retrieve information based on ID
            include "connection.php";
            $qs = "SELECT * FROM users WHERE id=$id";
            echo "sql statement is ".$qs."<br>";

            $result = mysqli_query($dbc,$qs);
            $numrows= mysqli_num_rows($result);
            if($numrows == 1){
                $row = mysqli_fetch_array($result);
                $firstname = $row["firstname"];
                $lastname = $row["lastname"];
                $email = $row["email"];
                $phone = $row["phone"];
                $major = $row["major"];
                $pass = $row["pw"];
            } else {
                echo "Something is wrong!";
            }

            //echo $firstname;
        ?>

        <?php
            if($_SERVER["REQUEST_METHOD"]=="POST"){
                echo "My ID inside POST method is ".$id."<br>";
                $newfirstname = mysqli_real_escape_string($dbc, trim($_POST["firstname"]));
                $newlastname = mysqli_real_escape_string($dbc, trim($_POST["lastname"]));
                $newemail = mysqli_real_escape_string($dbc, trim($_POST["email"]));
                $newphone = mysqli_real_escape_string($dbc, trim($_POST["phone"]));
                $newmajor = mysqli_real_escape_string($dbc, trim($_POST["major"]));
                $newpass = mysqli_real_escape_string($dbc, trim($_POST["pass"]));

                //build query statement 
                $qs="UPDATE users SET firstname='$newfirstname', lastname='$newlastname', email='$newemail', phone='$newphone', major='$newmajor', pw='$newpass' WHERE id='$id'";
                echo "Update statement is ".$qs."<br>";
                //run the query
                mysqli_query($dbc,$qs);
                //1 row should be affected
                if(mysqli_affected_rows($dbc)==1) {
                    echo "You have updated the user successfully!";
                } else {
                    echo "Something is wrong";
                }
            }
        ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            First Name:         <input type="text" name="firstname" value="<?php echo $firstname; ?>"><br><br>
            Last Name:          <input type="text" name="lastname" value="<?php echo $lastname; ?>"><br><br>
            Email:              <input type="text" name="email" value="<?php echo $email; ?>"><br><br>
            Phone:              <input type="text" name="phone" value="<?php echo $phone; ?>"><br><br>
            Major:              <input type="text" name="major" value="<?php echo $major; ?>"><br><br>
            Password:           <input type="text" name="pass" value="<?php echo $pass; ?>"><br><br>

            <input type="submit" name="update" value="Update Profile">
        </form>
    </body>
</html>
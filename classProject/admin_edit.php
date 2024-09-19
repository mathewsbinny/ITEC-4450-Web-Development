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
                $dbid=$row["id"];
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
        
        <form method="post" action="edit.php">
            ID: <input type="text" name="id" value="<?php echo $dbid; ?>"><br><br>
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
<html>
    <head>
        <title>Online Test - Admin Editor</title>
    </head>
    <body>
        <?php
            $id = $firstname = $lastname = $email = $dbid = "";
            include "admin_nav.php";
            $id = $_GET["id"];
            echo "User ID is ".$id."<br>";

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
            } else {
                echo "Something is wrong!";
            }
        ?>
        <h2>Welcome to the Admin Editor</h2>
        <p>Submitted by Mathews Binny</p>
        <hr>

        <h4>Are you sure you want to delete this user?</h4>
        <form method="post" action="delete.php">
            ID: <input type="text" name="id" value="<?php echo $dbid; ?>"><br><br>
            First Name:         <input type="text" name="firstname" value="<?php echo $firstname; ?>"><br><br>
            Last Name:          <input type="text" name="lastname" value="<?php echo $lastname; ?>"><br><br>
            Email:              <input type="text" name="email" value="<?php echo $email; ?>"><br><br>

            <input type="submit" name="delete" value="Delete">
        </form>
    </body>
</html>
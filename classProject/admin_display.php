<html>
    <head>
        <title>Online Test - Admin Display</title>
    </head>
    <body>
        <h2>Welcome to the Admin Display</h2>
        <?php
            include "admin_nav.php";
            //connect to the database and retrieve all the information from the users table
            include "connection.php";
            $qs="SELECT * FROM users ORDER BY firstname ASC";
            $result = mysqli_query($dbc, $qs);

            echo "<table border='1' width='75%'>";
                echo    "<tr>
                            <td>Edit</td>
                            <td>Delete</td>
                            <td>First Name</td>
                            <td>Last Name</td>
                            <td>Email</td>
                            <td>Phone</td>
                            <td>Major</td>
                            <td>Gender</td>
                            <td>Password</td>
                            <td>PHP Quiz</td>
                            <td>SQL Quiz</td>
                            <td>HTML/CSS Quiz</td>
                            <td>JavaScript Quiz</td>
                        </tr>";
                while($row=mysqli_fetch_array($result)){
                    echo    "<tr>";
                    echo       "<td><a href='admin_edit.php?id=".$row['id']."'> Edit </a></td>
                                <td><a href='admin_delete.php?id=".$row['id']."'> Delete </a></td>
                                <td>".$row['firstname']."</td>
                                <td>".$row['lastname']."</td>
                                <td>".$row['email']."</td>
                                <td>".$row['phone']."</td>
                                <td>".$row['major']."</td>
                                <td>".$row['gender']."</td>
                                <td>".$row['pw']."</td>
                                <td>".$row['quiz1']."</td>
                                <td>".$row['quiz2']."</td>
                                <td>".$row['quiz3']."</td>
                                <td>".$row['quiz4']."</td>";
                    echo    "</tr>";
                }
            echo "</table>";
        ?>


    </body>
</html>
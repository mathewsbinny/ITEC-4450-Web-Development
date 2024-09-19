<?php
    session_start();
    $id=$firstname="";
    $id = $_SESSION["id"];
    $firstname = $_SESSION["firstname"];
    echo "Session ID is ".$id."<br>"; // for developer
?>
<html>
    <head>
        <title>Online Test - User Home</title>
    </head>
    <body>
        <h2>Hello <?php echo $firstname; ?>! Welcome to the Free Online Testing Site</h2>
        <p>You will be able to assess your web development skills using our test bank.</p>
        <?php
            include "user_nav.php";
            //check database, if use already has a profile picture, display it here, allow them to update it
            //if not, upload/update one
            include "connection.php";
            $qs = "SELECT * FROM users WHERE id = $id";
            $qresult = mysqli_query($dbc, $qs);
            $numrows = mysqli_num_rows($qresult);
            if($numrows == 1) {
                $row = mysqli_fetch_array($qresult);
                $dbpic = $row["pic"];
                // display the picture
                echo "<img src='".$dbpic."' width='300' alt='Profile Picture'>";
            }

            if(isset($_POST["submit"])) {
                $tagName = "myImage";
                $fileAllowed = "PNG:JPEG:JPG:GIF:BMP";
                $sizeAllowed = 10000000; //about 10 MB
                $overwriteAllowed = 1;

                $file = uploadFile($tagName, $fileAllowed, $sizeAllowed, $overwriteAllowed);
                if($file != false) {
                    echo "<br> This is your new profile picture! <br><img src='".$file."' width='300'>";  //<img src='fileName.jpg'>";
                    //update the database
                    $qs = "UPDATE users SET pic='".$file."' WHERE id=$id";
                    mysqli_query($dbc, $qs);
                } else {
                    echo "Uploading of the file failed.<br>";
                }
            }

            function uploadFile($tagName, $fileAllowed, $sizeAllowed, $overwriteAllowed) {
                $uploadOK = 1; // yes, ok to upload
                $dir = "upload/";
                $file = $dir.basename($_FILES[$tagName]["name"]); //to specify the path of the file to be stored
                $fileType = pathinfo($file, PATHINFO_EXTENSION); //return the file extension
                $fileSize = $_FILES[$tagName]["size"]; //get the file size

                if($fileSize > $sizeAllowed) {
                    echo "File size is too big! Maximum 9 MB;";
                    $uploadOK = 0; //not ok to upload this
                }
                if(!stristr($fileAllowed, $fileType)) { //search substring in the first string to find a match
                    echo "This file type is not allowed.";
                    $uploadOK = 0; //not ok to upload this
                }
                if(file_exists($file) && !$overwriteAllowed) {
                    echo "This file already exists. Please upload a different file.";
                    $uploadOK = 0; //not ok to upload this
                }
                if($uploadOK == 1) { //no red flag!
                    if(!move_uploaded_file($_FILES[$tagName]["tmp_name"], $file)) {
                        echo "Sorry, the upload failed.";
                        $uploadOK = 0; //not ok to upload
                    }
                }
                if($uploadOK ==1) {
                    return $file;
                } else {
                    return false; 
                }
            }
        ?>

        <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Upload or Update your profile picture: <input type="file" name="myImage"><br><br>
            <input type="submit" name="submit" value="UPDATE">
        </form>
    </body>
</html>
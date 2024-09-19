<html>
    <head>
        <title>Activity 11 - March 19</title>
    </head>
    <style>
        .error{color:#FF0000;}
    </style>
    <body>
        <h1>Uploading Files to Server</h1>
        <p>Submitted by Mathews Binny</p>
        <p> This exercise will show you how to upload files to the server.<br>
            The example code uploaded two files at once <br>
            You can modify the code so user could upload one file at a time.
        </p><hr>

        <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Select an image to upload: <input type="file" name="myImage"><br><br>
            Select a PDF file to upload: <input type="file" name="myPDF"><br><br>
            <input type="submit" name="submit" value="SUBMIT">
        </form>

        <?php
            if(isset($_POST["submit"])) {
                $tagName = "myImage";
                $fileAllowed = "PNG:JPEG:JPG:GIF:BMP";
                $sizeAllowed = 10000000; //about 10 MB
                $overwriteAllowed = 1;

                $file = uploadFile($tagName, $fileAllowed, $sizeAllowed, $overwriteAllowed);
                if($file != false) {
                    echo "<img src='".$file."' width='300'>";  //<img src='fileName.jpg'>";
                } else {
                    echo "Uploading of the file failed.<br>";
                }

                
                $tagName = "myPDF";
                $fileAllowed = "PDF";
                $sizeAllowed = 10000000; //about 10 MB
                $overwriteAllowed = 1;
                $file = uploadFile($tagName, $fileAllowed, $sizeAllowed, $overwriteAllowed);
                if($file != false) {
                    echo "<br>Three different ways to show the PDF file.<br>";  //<img src='fileName.pdf'>";
                    echo "<br>1. Using hyperlinks: <a href='".$file."' target='_blank'>Click Here</a> to open your PDF";
                    echo "<br>2. Using iframe <br><br>"; //must check if browser supports iframe
                        echo "<iframe height='500' width='500' src='".$file."'>  </iframe><br>";
                    echo "<br>3. Using the embed tag <br><br>";
                        echo "<embed type='application/pdf' src='".$file."' width='500' height='500'><br>";
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
    </body>
</html>
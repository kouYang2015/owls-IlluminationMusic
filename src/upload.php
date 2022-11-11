<!DOCTYPE html>
<html>

<head>
    <title>Uploading...</title>
</head>

<body>
    <h1>Uploading File...</h1>
    <?php
    if (isset($_POST["submit"])) {
        $target_dir = "uploads/"; //save direcotry
        $imageName = $_FILES["fileToUpload"]["name"];
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

        $uploadOk = 1;
        if (!is_dir($target_dir)) {        //directory check exist or not
            mkdir($target_dir);
        }
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));    //get file extension
        $check = getimagesize($target_file);
        if (file_exists($target_file)) {            //check file already exist
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        } elseif ($_FILES["fileToUpload"]["size"] > 500000) {        //check file size
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        } elseif (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" && $imageFileType != "pdf" && $imageFileType != "zip" && $imageFileType != "rar"
        ) {    //check file extension
            echo "Sorry, only JPG, JPEG, PNG , GIF, pdf, zip, rar files are allowed.";
            $uploadOk = 0;
        } else {
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is  an document.";
                $uploadOk = 1;
            }
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "<br>Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) { //save uploaded file
                echo "<br>The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                echo '<img src="uploads/' . $_FILES["fileToUpload"]["name"] . '" width=180 height=180/>';
            } else {
                echo "<br>Sorry, there was an error uploading your file.";
            }
        }
    }
    ?>
</body>

</html>
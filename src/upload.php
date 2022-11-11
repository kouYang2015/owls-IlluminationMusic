
    <?php
    $target_dir = "uploads/"; //save direcotry
    if (!is_dir($target_dir)) {
        mkdir($target_dir);
    }
    $fileName = $_FILES["fileToUpload"]["name"];
    $target_file_path = $target_dir . $fileName;
    $uploadErrors = array();
    function checkForUploadErrors()
    {
        checkSize();
        checkFileType();
    }
    function checkSize()
    {
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            global $uploadErrors;
            $uploadErrors[] = 'File exceeds maximum size.';
        }
    }
    function checkFileType()
    {
        echo 'Checking file type';
        global $uploadErrors;
        if (getimagesize($_FILES['fileToUpload']['tmp_name']) === false) {
            $uploadErrors[] = 'Not an image file.';
        }
        $mime_type = mime_content_type($_FILES['fileToUpload']['tmp_name']);
        $allowed_file_types = ['image/png', 'image/jpeg', 'image/jpg'];
        if (!in_array($mime_type, $allowed_file_types)) {
            array_push($uploadErrors, 'Only JPG, JPEG, PNG files allowed.');
        }
    }
    function handleUpload($target_file_path)
    {
        global $uploadErrors;
        if (empty($uploadErrors) == 1) {
            if (file_exists($target_file_path)) {
                //TODO: update database file path string.
                echo "<img src=" . $target_file_path . " height=180 width=180 />";
                //TODO: show new database file path string for user profile image
            } elseif (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file_path)) {
                //TODO: update database file path string.
                echo "<img src=" . $target_file_path . " height=180 width=180 />";
                //TODO: show new database file path string for user profile image
            }
        } else {
            echo '<img src="https://brandeps.com/icon-download/M/Music-icon-vector-03.svg" width=180 height=180">';
            //TODO: load current profile image path from database
            echo '<br>';
            echo '<a class="errorText">' . $uploadErrors[0] . '</a>';
        }
    }

    checkForUploadErrors();
    handleUpload($target_file_path);

    ?>
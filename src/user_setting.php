<!DOCTYPE html>
<html>

<head>
  <title>Illumination Music - User settings</title>
  <link rel="stylesheet" type="text/css" href="css/theme.css" />
  <link rel="stylesheet" type="text/css" href="css/user_setting.css" />
</head>

<body>
  <?php include_once 'header.php'; 
  include_once 'database.php'?>
  <h1>Account Overview</h1>
  <div class="profile_icon">
    <?php
    if (isset($_POST['submit']) && is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) {
      include 'upload.php'; // Will upload a new file if it doesn't exist and show
    }
    $userimgfilepath = retrieveProfileImg($_SESSION['username']);
    if ($userimgfilepath != null){
      echo '<img class="profile-img" src=" '. $userimgfilepath . '"/>';
    } else {
      echo '<img class="profile-img" src="images/illumination_logo.png"/>';
    }
    ?>
  </div>
  <div class="upload-container">
    <form action="user_setting.php" method="post" enctype="multipart/form-data">
      <input type="file" name="fileToUpload">
    </br>
      <input type="submit" value="Upload Image" name="submit">
    </form>
    <i><p>User Name: <?php echo $_SESSION['username']?></p></i>
    <i><p>Email: <?php echo retrieveEmail($_SESSION['username'])?></p></i>
    <a href="edit-profile.php"><button type="submit" class="buttonContainer" id="edit" value="Edit Profile">Edit Profile</button></a>
  </div>

</body>

</html>
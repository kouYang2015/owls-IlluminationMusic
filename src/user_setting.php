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
      echo '<img src=" '. $userimgfilepath . '" height=180 width=180 />';
    } else {
      echo '<img src="images/illumination_logo.png" height=180 width=180 />';
    }
    ?>
  </div>
  <div class="upload">
    <form action="user_setting.php" method="post" enctype="multipart/form-data">
      <input type="file" name="fileToUpload">
      <input type="submit" value="Upload Image" name="submit">
    </form>
  </div>
  <i><p style="font-family:arial; font-size:20px; text-align:center">User Name: <?php echo $_SESSION['username']?></p></i>
  <i><p style="font-family:arial; font-size:20px; text-align:center">Email: <?php echo retrieveEmail($_SESSION['username'])?></p></i>
  <br>
  <div style="text-align: center">
    <a href="edit-profile.php"><button type="submit" class="edit" id="edit" value="Edit Profile">Edit Profile</button></a>
    <br><br>
    <button type="submit" class="deletebtn" id="delete" value="delete Account">Delete Account</button>
  </div>

</body>

</html>
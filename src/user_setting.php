<!DOCTYPE html>
<html>

<head>
  <title>Illumination Music - User settings</title>
  <link rel="stylesheet" type="text/css" href="css/theme.css" />
  <link rel="stylesheet" type="text/css" href="css/user_setting.css" />
</head>
<header>
  <div class="navbar">
    <a href="homePage.html"><img src="https://brandeps.com/icon-download/M/Music-icon-vector-03.svg" style="width: 50px; height: 50px" /></a>
    <a href="homePage.html">Home</a>
    <a href="userpage.php">Playlist</a>
    <div class="dropdown">
      <img class="dropbtn" src="https://pic.onlinewebfonts.com/svg/img_24787.png" style="width: 40px; height: 40px" />
      <div class="dropdown-content">
        <a href="user_setting.php">Account</a>
        <a href="EditProfile_Email.html">Security</a>
        <a href="logout.php">Log out</a>
      </div>
    </div>
  </div>
</header>

<body>

  <h1>Account Overview</h1>
  <div class="profile_icon">
    <?php
    if (isset($_POST['submit']) && is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) {
      include 'upload.php';
    } else {
      if (false) { // TODO: update if statement to check database if there is a filpath for user.
        //TODO: load current profile image path from database
      } else {
        echo '<img src="https://brandeps.com/icon-download/M/Music-icon-vector-03.svg" width=180 height=180">';
      }
    }
    ?>
  </div>
  <div class="upload">
    <form action="user_setting.php" method="post" enctype="multipart/form-data">
      Select a profile image to upload: </p>
      <input type="file" name="fileToUpload" id="fileToUpload">
      <input type="submit" value="Upload Image" name="submit">
    </form>
  </div>
  <br>

  <?php
  $userInfo = array(array(
    'username' => 'name',
    'Email' => '1234abcde@gmail.com'
  ));
  // TODO: after database integration, actually use the username and email from database.

  foreach ($userInfo as $info) {
    echo '<i><p style="font-family:arial; font-size:20px; text-align:center">' . "Username: " . $info['username'] . "</p>";
    echo '<i><p style="font-family:arial; font-size:20px; text-align:center">' . "Email: " . $info['Email'] . "</p>";
  }
  ?>

  <br>
  <div class="editbtn" style="text-align: center">
    <a href="EditProfile_Email.html"><button type="submit" class="edit" id="edit" value="Edit Profile">Edit Profile</button></a>
  </div>

  <br><br>
  <div class="delete" style="text-align: center">
    <button type="submit" class="deletebtn" id="delete" value="delete Account">Delete Account</button>
  </div>

</body>

</html>
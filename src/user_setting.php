<!DOCTYPE html>
<html>

<head>
  <title>Illumination Music - User settings</title>
  <link rel="stylesheet" type="text/css" href="css/theme.css" />
  <link rel="stylesheet" type="text/css" href="css/user_setting.css" />
  <style>
    .example {
      width: 180px;
      height: 180px
    }
  </style>
</head>

<body>

  <div class="navbar">
    <a href="homePage.html"><img src="https://brandeps.com/icon-download/M/Music-icon-vector-03.svg" style="width: 50px; height: 50px" /></a>
    <a href="homePage.html">Home</a>
    <a href="userpage.php">Playlist</a>
    <div class="logout">
      <a href="#logout"><button type="submit" id="logoutbtn" value="Log out" style="background-color:red;">Log out</button></a>
    </div>
  </div>

  <h1>Account Overview</h1>
  <div class="profile_icon">
    <img src='olaf.jpg' alt="https://brandeps.com/icon-download/M/Music-icon-vector-03.svg" style="width:180px; height:180px">
  </div>

  <div class="upload">
    <form action="upload.php" method="post" enctype="multipart/form-data">
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

  foreach ($userInfo as $info) {
    echo '<i><p style="font-family:arial; font-size:20px; text-align:center">' . "Username: " . $info['username'] . "</p>";
    echo '<i><p style="font-family:arial; font-size:20px; text-align:center">' . "Email: " . $info['Email'] . "</p>";
  }
  ?>

  <br>
  <div class="editbtn" style="text-align: center">
    <a href="process_edit_profile.php"><button type="submit" class="edit" id="edit" value="Edit Profile">Edit Profile</button></a>
  </div>

  <br><br>
  <div class="delete" style="text-align: center">
    <button type="submit" class="deletebtn" id="delete" value="delete Account">Delete Account</button>
  </div>

</body>

</html>
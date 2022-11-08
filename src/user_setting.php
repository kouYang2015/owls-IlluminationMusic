<!DOCTYPE html>
<html>

<head>
  <title>Illumination Music - User settings</title>
  <link rel="stylesheet" type="text/css" href="css/theme.css" />
  <style>
    body {
      font-family: 'Times New Roman', Times, serif;
      font-size: 20px;
    }

    .logout {
      position: absolute;
      top: 0;
      right: 0;
    }

    #logoutbtn {
      border-radius: 30px;
      font-size: 20px;
      font-family: 'Times New Roman';
      padding-right: 13px;
      padding-left: 13px;
    }

    h1 {
      text-align: center;
    }

    .profile_icon {
      text-align: center;
    }

    .upload {
      text-align: center;
    }

    .edit {
      border-radius: 30px;
      font-size: 18px;
      padding: 8px 1%;
    }

    .deletebtn {
      background-color: red;
      border-radius: 30px;
      font-size: 18px;
      padding: 8px 1%;
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
    <img src='https://www.lightsong.net/wp-content/uploads/2020/12/blank-profile-circle-300x300.png' alt='Profile' style="width:180px; height:180px">
  </div>

  <div class="upload">
    <form action="upload.php" method="post" enctype="multipart/form-data">
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
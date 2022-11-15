<!DOCTYPE html>
<html>

<head>
  <title>Illumination Music - User settings</title>
  <link rel="stylesheet" type="text/css" href="css/theme.css" />
  <link rel="stylesheet" type="text/css" href="css/user_setting.css" />
</head>

<body>
  <header>
    <div class="navbar">
      <a href="homePage.html"><img src="https://brandeps.com/icon-download/M/Music-icon-vector-03.svg" style="width:50px;height:50px;"></a>
      <a href="homePage.html">Home</a>
      <a href="userpage.php">Playlist</a>

      <div class="dropdown">
        <img class="dropbtn" src="https://pic.onlinewebfonts.com/svg/img_24787.png" style="width:40px;height:40px;">
        <div class="dropdown-content">
          <a href="user_setting.php">Account</a>
          <a href="EditProfile.php">Security</a>
          <a href="logout.php">Log out</a>
        </div>
      </div>
    </div>
  </header>
  <h1>Account Overview</h1>
  <div class="profile_icon">
    <?php
    if (isset($_POST['submit']) && is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) {
      include 'upload.php'; // Will upload a new file if it doesn't exist and show
    } else { // Connect to db and check if user has a profile image filepath name set
      $usernameToSearchFor = 'johndoe123'; // TODO: FOR DEMONSTRATION PURPOSES ONLY
      $db = new mysqli("localhost", "root", "", "illumination_local");
      if (mysqli_connect_errno()) {
        echo '<img src="https://brandeps.com/icon-download/M/Music-icon-vector-03.svg" width=180 height=180">';
      } else {
        $query = "SELECT profile_image_filename FROM user_profile_images 
        right join users on user_profile_images.user_id = users.user_id WHERE (username = ?) ";
        $stmt = $db->prepare($query);
        $stmt->bind_param('s', $usernameToSearchFor);
        $stmt->execute();
        $result = $stmt->get_result();
        $userimagename = $result->fetch_row();
        if (is_array($userimagename) && $userimagename[0] != null) {
          echo "<img src=" . $userimagename[0] . " height=180 width=180 />";
        } else {
          echo '<img src="https://brandeps.com/icon-download/M/Music-icon-vector-03.svg" width=180 height=180">';
        }

        $stmt->free_result();
        $db->close();
      }
    }
    ?>
  </div>
  <div class="upload">
    <form action="user_setting.php" method="post" enctype="multipart/form-data">
      <input type="file" name="fileToUpload" id="fileToUpload">
      <input type="submit" value="Upload Image" name="submit">
    </form>
  </div>

  <?php
  $usernameToSearchFor = 'johndoe123';
  $db = new mysqli("localhost", "root", "", "illumination_local");
  if (mysqli_connect_errno()) {
    echo '<p>Error: Could not connect to database.<br/>
       Please try again later.</p>';
    exit;
  }

  $query = "SELECT username, user_email FROM users WHERE (username = ?)";
  $stmt = $db->prepare($query);
  $stmt->bind_param('s', $usernameToSearchFor);
  $stmt->execute();
  $stmt->store_result();

  $stmt->bind_result($username, $user_email);

  while ($stmt->fetch()) {
    echo '<i><p style="font-family:arial; font-size:20px; text-align:center">User Name: ' . $username . '</p></i>';
    echo '<i><p style="font-family:arial; font-size:20px; text-align:center">User Email: ' . $user_email . '</p></i>';
    "</p>";
  }

  $stmt->free_result();
  $db->close();
  ?>

  <br>
  <div style="text-align: center">
    <a href="EditProfile.php"><button type="submit" class="edit" id="edit" value="Edit Profile">Edit Profile</button></a>
    <br><br>
    <button type="submit" class="deletebtn" id="delete" value="delete Account">Delete Account</button>
  </div>

</body>

</html>
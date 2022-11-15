<!DOCTYPE html>
<?php
if (isset($_POST['updateEmail'])) {
  $newEmail = htmlspecialchars($_POST['new_address']);
  $email_confirm = htmlspecialchars($_POST['confirm_address']);
}
if (isset($_POST['updatePw'])) {
  $currentPassword = htmlspecialchars($_POST['current_password']);
  $newPassword = htmlspecialchars($_POST['new_password']);
  $newPassword_confirm = htmlspecialchars($_POST['confirm_password']);
}
include 'database.php';
?>
<html>

<head>
  <title>Illumination Music - Edit Profile Results</title>
  <link rel="stylesheet" type="text/css" href="css/theme.css" />
  <link rel="stylesheet" type="text/css" href="css/process_edit_profile.css" />
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
  <h1 align="center">Edit Profile</h1>
  <div align="center">
    <?php
    $usernameToSearchFor = 'johndoe123';
    if (isset($_POST['updateEmail'])) {
      if ($newEmail == $email_confirm) {
        updateEmail($usernameToSearchFor, $newEmail);
      } else {
        echo 'Email & email confirmation does not match! <br>';
        echo '<a href="signup.html"><button type="submit" class="buttonContainer">Try Again</button></a>';
      }
    }
    if (isset($_POST['updatePw'])) {
      $usernameToSearchFor = 'johndoe123';
      if (validatePassword($usernameToSearchFor, $currentPassword)) {
        if ($newPassword == $newPassword_confirm) {
          updatePassword($usernameToSearchFor, $newPassword);
        } else {
          echo 'New password & password confirmation does not match!';
          echo '<a href="signup.html"><button type="submit" class="buttonContainer">Try Again</button></a>';
        }
      } else {
        echo 'Password does not match current password!';
        echo '<a href="signup.html"><button type="submit" class="buttonContainer">Try Again</button></a>';
      }
    }
    ?>
  </div>
</body>

</html>
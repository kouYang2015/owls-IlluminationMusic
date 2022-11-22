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
  <link rel="stylesheet" type="text/css" href="css/header.css" />
</head>

<body>
  <?php include 'header.php'; ?>
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
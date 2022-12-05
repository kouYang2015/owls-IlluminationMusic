<!DOCTYPE html>
<html>

<head>
  <title>Illumination Music - Edit Profile Results</title>
  <link rel="stylesheet" type="text/css" href="css/theme.css" />
  <link rel="stylesheet" type="text/css" href="css/process_edit_profile.css" />
</head>

<body>
  <?php include 'header.php'; ?>
  <h1 align="center">Edit Profile</h1>
  <div align="center">
    <?php
    include 'database.php';
    $usernameToSearchFor = $_SESSION['username'];
    if (isset($_POST['updateEmail']) && array_key_exists('updateEmail', $_POST)){
      if (emailFieldsExists() ) {
        $newEmail = htmlspecialchars($_POST['new_address']);
        $email_confirm = htmlspecialchars($_POST['confirm_address']);
        if (filter_var($newEmail, FILTER_VALIDATE_EMAIL) && filter_var($email_confirm, FILTER_VALIDATE_EMAIL)) {
          if ($newEmail == $email_confirm) {
            if (updateEmail($usernameToSearchFor, $newEmail)) {
              echo '<h2>Email updated!</h2>';
            } else {
              //Something went wrong with db
              header('Location: edit-profile.php?errcode=0');
              exit;
            }
          } else {
            //Email & email confirmation does not match.
            header('Location: edit-profile.php?errcode=1');
            exit;
          }
        } else {
          //Not valid email input
          header('Location: edit-profile.php?errcode=2');
          exit;
        }
      } else {
        //Empty input fields
        header('Location: edit-profile.php?errcode=3');
        exit;
      }
    } elseif (isset($_POST['updatePw']) && array_key_exists('updatePw', $_POST)) {
      if (pwFieldsExists()) {
        $currentPassword = $_POST['current_password'];
        $newPassword = $_POST['new_password'];
        $newPassword_confirm = $_POST['confirm_password'];

        if (validateUsernamePassword($usernameToSearchFor, $currentPassword)) {
          if (pwPassRegex($newPassword) && pwPassRegex($newPassword_confirm)) {
            if ($newPassword == $newPassword_confirm) {
              if (updatePassword($usernameToSearchFor, $newPassword)) {
                echo '<h2>Password updated!</h2>';
              } else {
                //Something went wrong with db
                header('Location: edit-profile.php?errcode=8');
                exit;
              }
            } else {
              //New password & password confirmation does not match
              header('Location: edit-profile.php?errcode=4');
              exit;
            }
          } else {
            //New password does not match regex pattern
            header('Location: edit-profile.php?errcode=5');
            exit;
          } 
        } else {
        //Password does not match current password
        header('Location: edit-profile.php?errcode=6');
        exit;
        }
      } else {
        //Empty input fields
        header('Location: edit-profile.php?errcode=7');
        exit;
      }
    }



    function emailFieldsExists() {
      if (isset($_POST['new_address']) && array_key_exists('new_address', $_POST) &&  $_POST['new_address'] != null &&
      isset($_POST['confirm_address']) && array_key_exists('confirm_address', $_POST) && $_POST['confirm_address'] != null) {
        return true;
      }
      return false;
    }

    function pwFieldsExists() {
      if (isset($_POST['current_password']) && array_key_exists('current_password', $_POST) && $_POST['current_password'] != null &&
      isset($_POST['new_password']) && array_key_exists('new_password', $_POST) && $_POST['new_password'] != null &&
      isset($_POST['confirm_password']) && array_key_exists('confirm_password', $_POST) && $_POST['confirm_password'] != null) {
        return true;
      }
      return false;
    }

    function pwPassRegex($password){
      $regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{8,30}$/";
      if (preg_match($regex, $password)){
        return true;
      }
      return false;
    }
    ?>
  </div>
  <div class="container">
    <img src="images/green_checkmark.png" alt="check">
  </div>
</body>

</html>
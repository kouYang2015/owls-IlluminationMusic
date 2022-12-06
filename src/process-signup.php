<!DOCTYPE html>
<html>

<head>
  <title>Illumination Music - Signup Results</title>
  <link rel="stylesheet" type="text/css" href="css/theme.css">
  <link rel="stylesheet" type="text/css" href="css/process-login.css">
</head>

<body>
  <?php include 'header.php'; ?>
  <h1 align="center">Signup Results</h1>
  <div align="center">
    <?php
    include 'database.php';
    if (checkAllPostSet()) {
      if (checkEmailValid() && checkPWValid()) {
        $uname = htmlspecialchars($_POST['uname']);
        $fname = htmlspecialchars($_POST['fname']);
        $lname = htmlspecialchars($_POST['lname']);
        $email = $_POST['email'];
        $email_confirm = $_POST['email_confirm'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];
        if (insertNewUser($uname, $fname, $lname, $email, $password)) {
          // do nothing;
        } else {
          //Something went wrong with db
          header('Location: signup.php?errcode=0');
          exit;
        }
      }
    } else {
      // Missing some fields
      header('Location: signup.php?errcode=1');
      exit;
    }

    function checkAllPostSet()
    {
      if (
        isset($_POST['uname']) && array_key_exists('uname', $_POST) &&
        isset($_POST['fname']) && array_key_exists('fname', $_POST) &&
        isset($_POST['lname']) && array_key_exists('lname', $_POST) &&
        isset($_POST['email']) && array_key_exists('email', $_POST) &&
        isset($_POST['email_confirm']) && array_key_exists('email_confirm', $_POST) &&
        isset($_POST['password']) && array_key_exists('password', $_POST) &&
        isset($_POST['password_confirm']) && array_key_exists('password_confirm', $_POST)
      ) {
        return true;
      }
      return false;
    }

    function checkEmailValid()
    {
      if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && filter_var($_POST['email_confirm'], FILTER_VALIDATE_EMAIL)) {
        if ($_POST['email'] == $_POST['email_confirm']) {
          return true;
        } else {
          //Email & email confirmation does not match.
          header('Location: signup.php?errcode=2');
          exit;
        }
      } else {
        //Not valid email input
        header('Location: signup.php?errcode=3');
        exit;
      }
    }

    function checkPWValid()
    {
      if (pwPassRegex($_POST['password']) && pwPassRegex($_POST['password_confirm'])) {
        if ($_POST['password'] == $_POST['password_confirm']) {
          return true;
        } else {
          //New password & password confirmation does not match
          header('Location: signup.php?errcode=4');
          exit;
        }
      } else {
        //Passwords does not match regex
        header('Location: signup.php?errcode=5');
        exit;
      }
    }

    function pwPassRegex($password)
    {
      $regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{8,30}$/";
      if (preg_match($regex, $password)) {
        return true;
      }
      return false;
    }
    ?>
    <div class="container">
      <img src="images/green_checkmark.png" alt="check">
      <h2>Successfully Registered!</h2>
      <a href="login.php">Log in</a>
    </div>
  </div>
</body>

</html>
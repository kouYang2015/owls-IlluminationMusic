<?php
$uname = htmlspecialchars($_POST['uname']);
$fname = htmlspecialchars($_POST['fname']);
$lname = htmlspecialchars($_POST['lname']);
$email = htmlspecialchars($_POST['email']);
$email_confirm = htmlspecialchars($_POST['email_confirm']);
$password = htmlspecialchars($_POST['password']);
$password_confirm = htmlspecialchars($_POST['password_confirm']);
include 'database.php';
?>
<!DOCTYPE html>
<html>

<head>
  <title>Illumination Music - Signup Results</title>
  <link rel="stylesheet" type="text/css" href="css/theme.css">
  <link rel="stylesheet" type="text/css" href="css/header.css" />

</head>

<body>
  <?php include 'header.php'; ?>
  <h1 align="center">Signup Results</h1>
  <div align="center">
    <h3>Your Entries:</h3>
    <?php
    if ($email == $email_confirm && $password == $password_confirm) {
      insertNewUser($uname, $fname, $lname, $email, $password);
    } else {
      if ($email != $email_confirm) {
        echo 'Email & email confirmation does not match! <br>';
      } else if ($password != $password_confirm) {
        echo 'Password & password confirmation does not match!';
      }
      echo '<a href="signup.html"><button type="submit" class="buttonContainer">Try Again</button></a>';
    }

    ?>
    <br>
    <a href="login.html"><button type="submit" class="buttonContainer">Login</button></a>
  </div>
</body>

</html>
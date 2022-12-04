<!DOCTYPE html>
<html>

<head>
  <title>Illumination Music - Login Results</title>
  <link rel="stylesheet" type="text/css" href="css/theme.css" />
  <link rel="stylesheet" type="text/css" href="css/process-login.css" />
</head>

<body>
  <?php include_once 'session.php';
  include_once 'database.php';
  if (isset($_POST['login_user']) && isset($_POST['login_password'])) {
    $login_user = htmlspecialchars($_POST['login_user']);
    $login_password = htmlspecialchars($_POST['login_password']);
    if (validateUsernameEmail($login_user)) {
      if (filter_var($login_user, FILTER_VALIDATE_EMAIL) && validateEmailPassword($login_user, $login_password)) {
        setSession();
        loginUser($login_user);
      } 
      elseif (validateUsernamePassword($login_user, $login_password)) {
        setSession();
        loginUser($login_user);
      } 
      else {
        header('Location: login.php?errcode=1&login_user='.$login_user);
        exit;
      }
    }
    else {
      header('Location: login.php?errcode=2&login_user='.$login_user);
      exit;
    }
  } else {
    header('Location: login.php?errcode=3&login_user='.$login_user);
    exit;
  }
  include_once 'header.php';
  ?>
  <div class="container">
    <h1>Login</h1>
    <img src="images/green_checkmark.png" alt="check">
    <h2>You have been successfully logged in!</h2>
    <a href="home.php">Go back to homepage</a>
  </div>
</body>

</html>
<!DOCTYPE html>
<html>

<head>
  <title>Illumination Music - Login</title>
  <link rel="stylesheet" type="text/css" href="css/theme.css" />
  <link rel="stylesheet" type="text/css" href="css/login.css" />
  <link rel="stylesheet" type="text/css" href="css/header.css" />
</head>

<body>
  <?php include 'header.php'; ?>
  <div class="text">
    <h1>Illumination Music</h1>
  </div>

  <form action="process-login.php" method="post">
    <div class="email_table">
      <table class="list">
        <tr class="email">
          <th class="left_column">Email:<br /><br /></th>
          <th>
            <input type="text" id="login_address" name="login_address" size="50" placeholder="Enter your email address" required="true" /><br /><br />
          </th>
        </tr>
        <tr class="password">
          <th class="left_column">Password:<br /><br /></th>
          <th>
            <input type="text" id="confirm_address" name="login_password" size="50" placeholder="Enter your password" required="true" /><br /><br />
          </th>
        </tr>
      </table>
    </div>
    <div class="submitbtn">
      <a href="process-login.php">
        <input type="submit" id="loginbtn" value="Log in" />
      </a>
    </div>
  </form>

  <div class="forgot_password">
    <a href="forgot-password.php">Forgot Password?</a>
  </div>
  <br /><br />
</body>

</html>
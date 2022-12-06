<!DOCTYPE html>
<html>

<head>
  <title>Illumination Music - Login</title>
  <link rel="stylesheet" type="text/css" href="css/theme.css" />
  <link rel="stylesheet" type="text/css" href="css/login.css" />
</head>

<body>
  <?php include 'header.php'; ?>
  <div>
    <h2>Login</h2>
  </div>
  <?php
  if (isset($_GET['errcode'])) {
    switch ($_GET['errcode']) {
      case (1):
        echo '<strong>Failed to login! Username or password incorrect</strong>';
        break;
      case (2):
        echo '<strong>Username/email does not exist!</strong>';
        break;
      case (3):
        echo '<strong>Username/email or password missing!</strong>';
        break;
      default:
        echo '<strong>Something went wrong. Try again!</strong>';
        break;
    }
  }
  ?>
  <form action="process-login.php" method="post">
    <div class="email_table">
      <table>
        <tr>
          <th>Username/Email:</th>
          <td>
            <input type="text" 
            name="login_user" 
            size="50" 
            placeholder="Enter your username/email address" 
            required="true" 
            <?php
              if (isset($_GET['login_user'])) {
                echo 'value = "' . htmlspecialchars($_GET['login_user']) . '"';
            }
            ?>
            />
          </td>
        </tr>
        <tr>
          <th>Password:</th>
          <td>
            <input type="password" name="login_password" size="50" placeholder="Enter your password" required="true" />
          </td>
        </tr>
      </table>
    </div>
    <div class="submitbtn">
      <input type="submit" id="loginbtn" name="request_login" value="Login" />
    </div>
  </form>
  <br />
  <div class="forgot_password">
    <a href="forgot-password.php">Register</a>
    <a href="forgot-password.php">Reset Password</a>
  </div>
</body>

</html>
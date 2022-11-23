<!DOCTYPE html>
<html>

<head>
  <title>Illumination Music - Signup</title>
  <link rel="stylesheet" type="text/css" href="css/theme.css" />
  <link rel="stylesheet" type="text/css" href="css/header.css" />
</head>

<body>
  <?php include 'header.php'; ?>
  <h1 align="center">Signup</h1>
  <div align="center">
    <span>Already have an account?</span>
    <a href="login.php">Log in</a>
    <form action="process_signup.php" method="POST">
      <table class="rightAlignTD">
        <tr>
          <td><label for="username">Username:</label></td>
          <td>
            <input title="Enter desired username" id="username" type="text" name="uname" required="true" spellcheck="false" />
          </td>
        </tr>
        <tr>
          <td><label for="fname">First Name:</label></td>
          <td>
            <input title="Enter your first name" id="fname" type="text" name="fname" required="true" spellcheck="false" />
          </td>
        </tr>
        <tr>
          <td><label for="lname">Last Name:</label></td>
          <td>
            <input title="Enter your last name" id="lname" type="text" name="lname" required="true" spellcheck="false" />
          </td>
        </tr>
        <tr>
          <td><label for="email">Email:</label></td>
          <td>
            <input title="Enter valid email address" id="email" type="text" name="email" required="true" spellcheck="false" pattern="[a-zA-Z0-9._]+@[a-z].+[a-z]" />
          </td>
        </tr>
        <tr>
          <td><label for="email_confirm">Email Confirmation:</label></td>
          <td>
            <input title="Enter valid email address" id="email_confirm" type="text" name="email_confirm" required="true" spellcheck="false" pattern="[a-zA-Z0-9._]+@[a-z].+[a-z]" />
          </td>
        </tr>
        <tr>
          <td><label for="password">Password:</label></td>
          <td>
            <input title="Enter desired password" id="password" type="text" name="password" required="true" spellcheck="false" />
          </td>
        </tr>
        <tr>
          <td>
            <label for="password_confirm">Password Confirmation:</label>
          </td>
          <td>
            <input title="Reenter password" id="password_confirm" type="text" name="password_confirm" required="true" spellcheck="false" />
          </td>
        </tr>
      </table>
      <input class="savework" type="submit" name="requestPassword" value="Create Account" />
    </form>
  </div>
</body>

</html>
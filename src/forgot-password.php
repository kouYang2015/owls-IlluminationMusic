<!DOCTYPE html>
<html>

<head>
  <title>Illumination Music - Forgot Password</title>
  <link rel="stylesheet" type="text/css" href="css/theme.css" />
  <style>
    .smallfont {
      font-size: 18px;
    }

    .savework {
      font-size: 19px;
      border-radius: 30px;
      padding: 6px 2%;
      cursor: pointer;
      background-color: #90EE90;
      font-weight: bold;
    }

    .savework:active {
      background-color: #90EE90;
      transform: translateY(4px);
    }

    td {
      padding: 13px;
    }

    input[type=text] {
      font-size: 20px;
    }

    input[type=number] {
      font-size: 20px;
    }
  </style>
</head>

<body>
  <?php include 'header.php'; ?>
  <h1 align="center">Reset Password</h1>
  <div align="center">
    <h3>
      Answer 3 of the 4 following questions correctly to reset your password
    </h3>
    <form action="process-forgotPW.php" method="post">
      <table class="rightAlignTD">
        <tr>
          <td><label for="username">Username:</label></td>
          <td>
            <input title="Enter your username" id="username" type="text" name="uname" required="true" spellcheck="false" />
          </td>
        </tr>
        <tr>
          <td><label for="email">Email:</label></td>
          <td>
            <input title="Enter valid email address" id="email" type="text" name="email" required="true" spellcheck="false" pattern="[a-zA-Z0-9._]+@[a-z].+[a-z]" />
          </td>
        </tr>
        <tr>
          <td>
            <label for="playlistCount">Number of saved playlist:</label>
          </td>
          <td>
            <input title="Number of playlists saved." id="playlistCount" type="number" name="playlistCount" required="true" spellcheck="false" />
          </td>
        </tr>
        <tr>
          <td><label for="playlistName">Name of a playlist:</label></td>
          <td>
            <input title="Name of one saved playlist." id="playlistName" type="text" name="playlistName" required="true" spellcheck="false" />
          </td>
        </tr>
      </table>
      <br /><br />
      <input class="savework" type="submit" name="requestPassword" value="Request" />
    </form>
    <br />
    <a class="smallfont" href="login.php">Back to Login</a>
    <br /><br />
    <a class="smallfont" href="home.php">Go to Home</a>
  </div>
</body>

</html>
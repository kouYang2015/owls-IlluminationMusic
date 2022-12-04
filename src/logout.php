<!DOCTYPE html>
<html>

<head>
    <title>Illumination Music - Logout</title>
    <link rel="stylesheet" type="text/css" href="css/theme.css" />
    <link rel="stylesheet" type="text/css" href="css/logout.css" />
</head>

<body>
    <?php
    include 'session.php';
    logoutUser($_SESSION['username']);
    include 'header.php';
    ?>
  <div class="container">
    <h1>Logout</h1>
    <img src="images/green_checkmark.png" alt="check">
    <h2>You have been successfully logged out!</h2>
    <a href="home.php">Go back to homepage</a>
  </div>
</body>

</html>
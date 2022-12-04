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
    <div>
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3b/Eo_circle_green_checkmark.svg/512px-Eo_circle_green_checkmark.svg.png?20200417132424" alt="check" style="width: 150px; height: 150px">
    </div>
    <h1>You have been successfully logged out!</h1>
    <p>Thank you!</p>
    <div><a href="home.php">Go back to homepage</a></div>
</body>

</html>
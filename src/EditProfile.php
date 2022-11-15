<!DOCTYPE html>
<html>

<head>
    <title>Illumination Music - Edit Profile</title>
    <link rel="stylesheet" type="text/css" href="css/theme.css" />
    <link rel="stylesheet" type="text/css" href="css/editProfile.css" />
</head>

<body>
    <div class="navbar">
        <a href="homePage.html"><img src="https://brandeps.com/icon-download/M/Music-icon-vector-03.svg" style="width:50px;height:50px;"></a>
        <a href="homePage.html">Home</a>
        <a href="userpage.php">Playlist</a>
        <div class="dropdown">
            <img class="dropbtn" src="https://pic.onlinewebfonts.com/svg/img_24787.png" style="width:40px;height:40px;">
            <div class="dropdown-content">
                <a href="user_setting.php">Account</a>
                <a href="EditProfile.php">Security</a>
                <a href="#">Log out</a>
            </div>
        </div>
    </div>

    <h1><u>Change Email Address</u></h1><br>

    <div class="email_table">
        <table class="list">
            <tr class="current">
                <th class="left_column">Current Email:<br><br></th>
                <th class="current_address">currentUser@email.com<br><br></th>
            </tr>
            <tr class="new">
                <th class="left_column">New Email Address:<br><br></th>
                <th> <input type="text" id="new_address" name="new_address" size="50" placeholder="Enter New Email Address"><br><br></th>
            </tr>
            <tr class="confirm">
                <th class="left_column">Confirm New Email Address:<br><br></th>
                <th><input type="text" id="confirm_address" name="confirm_address" size="50" placeholder="Re-Enter New Email Address"><br><br></th>
            </tr>
        </table>
    </div>
    <br>

    <form>
        <h2><u>Change Password</u></h2><br>
        <div class="password_table">
            <table class="list">
                <tr class="current">
                    <th class="left_column">Current Password:<br><br></th>
                    <th> <input type="text" id="current_password" name="current_password" size="50" placeholder="Enter Current Password"><br><br></th>
                </tr>
                <tr class="new">
                    <th class="left_column">New Password:<br><br></th>
                    <th> <input type="text" id="new_password" name="new_password" size="50" placeholder="Enter New Password"><br><br></th>
                </tr>
                <tr class="confirm">
                    <th class="left_column">Confirm New Password:<br><br></th>
                    <th><input type="text" id="confirm_password" name="confirm_password" size="50" placeholder="Re-Enter New Password"><br><br></th>
                </tr>
            </table>
        </div>
        <div class="buttons" id="buttons">
            <input type="submit" id="updatePw" value="updatePw" style="background-color: rgb(45, 199, 45); color: black;">Update Password</input>
        </div>
    </form>

</body>

</html>
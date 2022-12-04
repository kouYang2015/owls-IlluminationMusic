<!DOCTYPE html>
<html>

<head>
    <title>Illumination Music - Edit Profile</title>
    <link rel="stylesheet" type="text/css" href="css/theme.css" />
    <link rel="stylesheet" type="text/css" href="css/editProfile.css" />
</head>

<body>
    <?php include 'header.php'; 
    include 'database.php'?>

    <h1><u>Change Email Address</u></h1>

    <form action="process-edit-profile.php" method="post">
            <table>
                <tr>
                    <th>Current Email:</th>
                    <?php
                        echo '<td class="current_address">' . retrieveEmail($_SESSION['username']) . '</td> ';
                    ?>
                </tr>
                <tr>
                    <th>New Email Address:</th>
                    <td> <input type="text" id="new_address" name="new_address" size="50" placeholder="Enter New Email Address" pattern="[a-zA-Z0-9._]+@[a-z].+[a-z]"></td>
                </tr>
                <tr>
                    <th>Confirm New Email Address:</th>
                    <td><input type="text" id="confirm_address" name="confirm_address" size="50" placeholder="Re-Enter New Email Address" pattern="[a-zA-Z0-9._]+@[a-z].+[a-z]"></td>
                </tr>
            </table>
        <div style="text-align:center">
            <button type="submit" name="updateEmail" value="Request email update" class="submitbtn">Update Email</button>
        </div>
    </form>

    <form action="process-edit-profile.php" method="post">
        <h2><u>Change Password</u></h2>
        <div>
            <table>
                <tr>
                    <th>Current Password:</th>
                    <td> <input type="password" id="current_password" name="current_password" size="50" placeholder="Enter Current Password"></td>
                </tr>
                <tr>
                    <th>New Password:</th>
                    <td> <input type="password" id="new_password" name="new_password" size="50" placeholder="Enter New Password"></td>
                </tr>
                <tr>
                    <th>Confirm New Password:</th>
                    <td><input type="password" id="confirm_password" name="confirm_password" size="50" placeholder="Re-Enter New Password"></td>
                </tr>
            </table>
        </div>
        <div style="text-align:center">
            <button type="submit" name="updatePw" value="Request password update" class="submitbtn">Update Password</button>
        </div>
    </form>

</body>

</html>
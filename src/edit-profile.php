<!DOCTYPE html>
<html>

<head>
    <title>Illumination Music - Edit Profile</title>
    <link rel="stylesheet" type="text/css" href="css/theme.css" />
    <link rel="stylesheet" type="text/css" href="css/editProfile.css" />
</head>

<body>
    <?php include 'header.php';
    include 'database.php' ?>
    <h1><u>Edit Profile</u></h1>
    <h2><u>Change Email Address</u></h2>
    <?php
    if (isset($_GET['errcode'])) {
        switch ($_GET['errcode']) {
            case (0):
                echo '<h3 class="errorText">Something went wrong! Try again.</h3>';
                break;
            case (1):
                echo '<h3 class="errorText">Email & email confirmation does not match!</h3>';
                break;
            case (2):
                echo '<h3 class="errorText">Not valid email input!</h3>';
                break;
            case (3):
                echo '<h3 class="errorText">One or more fields empty!</h3>';
                break;
            default:
                break;
        }
    }
    ?>
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
            <button type="submit" name="updateEmail" value="updateEmail" class="submitbtn">Update Email</button>
        </div>
    </form>

    <h2><u>Change Password</u></h2>
    <?php
    if (isset($_GET['errcode'])) {
        switch ($_GET['errcode']) {
            case (4):
                echo '<h3 class="errorText">New password & password confirmation does not match!</h3>';
                break;
            case (5):
                echo '<h3 class="errorText">New password must be minimum eight characters and include at least one uppercase letter, 
                one lowercase letter, one number and one special character (@$!%*?&)</h3>';
                break;
            case (6):
                echo '<h3 class="errorText">Password does not match current password!</h3>';
                break;
            case (7):
                echo '<h3 class="errorText">One or more fields empty!</h3>';
                break;
            case (8):
                echo '<h3 class="errorText">Something went wrong! Try again.</h3>';
                break;
            default:
                break;
        }
    }
    ?>
    <form action="process-edit-profile.php" method="post">
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
            <button type="submit" name="updatePw" value="updatePw" class="submitbtn">Update Password</button>
        </div>
    </form>

</body>

</html>
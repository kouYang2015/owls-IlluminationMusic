<!DOCTYPE html>
<html>

<head>
    <title>Illumination Music - Edit Profile</title>
    <link rel="stylesheet" type="text/css" href="css/theme.css" />
    <link rel="stylesheet" type="text/css" href="css/editProfile.css" />
    <link rel="stylesheet" type="text/css" href="css/header.css" />

</head>

<body>
    <?php include 'header.php'; ?>

    <h1><u>Change Email Address</u></h1><br>

    <form action="process-edit-profile.php" method="post">
        <div>
            <table>
                <tr>
                    <th class="left_column">Current Email:<br><br></th>
                    <?php
                    $usernameToSearchFor = 'johndoe123';
                    $db = new mysqli("localhost", "root", "", "illumination_local");
                    if (mysqli_connect_errno()) {
                        echo '<p>Error: Could not connect to database. Please try again later.</p>';
                        exit;
                    }

                    $query = "SELECT user_email FROM users WHERE (username = ?)";
                    $stmt = $db->prepare($query);
                    $stmt->bind_param('s', $usernameToSearchFor);
                    $stmt->execute();
                    $stmt->store_result();

                    $stmt->bind_result($user_email);

                    while ($stmt->fetch()) {
                        echo '<th class="current_address">' . $user_email . '<br><br></th> ';
                        "</p>";
                    }

                    $stmt->free_result();
                    $db->close();
                    ?>
                </tr>
                <tr>
                    <th class="left_column">New Email Address:<br><br></th>
                    <th> <input type="text" id="new_address" name="new_address" size="50" placeholder="Enter New Email Address" pattern="[a-zA-Z0-9._]+@[a-z].+[a-z]"><br><br></th>
                </tr>
                <tr>
                    <th class="left_column">Confirm New Email Address:<br><br></th>
                    <th><input type="text" id="confirm_address" name="confirm_address" size="50" placeholder="Re-Enter New Email Address" pattern="[a-zA-Z0-9._]+@[a-z].+[a-z]"><br><br></th>
                </tr>
            </table>
        </div>
        <div style="text-align:center">
            <button type="submit" name="updateEmail" value="Request email update" class="submitbtn">Update Email</button>
        </div>
    </form>

    <form action="process-edit-profile.php" method="post">
        <h2><u>Change Password</u></h2><br>
        <div>
            <table>
                <tr>
                    <th class="left_column">Current Password:<br><br></th>
                    <th> <input type="text" id="current_password" name="current_password" size="50" placeholder="Enter Current Password"><br><br></th>
                </tr>
                <tr>
                    <th class="left_column">New Password:<br><br></th>
                    <th> <input type="text" id="new_password" name="new_password" size="50" placeholder="Enter New Password"><br><br></th>
                </tr>
                <tr>
                    <th class="left_column">Confirm New Password:<br><br></th>
                    <th><input type="text" id="confirm_password" name="confirm_password" size="50" placeholder="Re-Enter New Password"><br><br></th>
                </tr>
            </table>
        </div>
        <div style="text-align:center">
            <button type="submit" name="updatePw" value="Request password update" class="submitbtn">Update Password</button>
        </div>
    </form>

</body>

</html>
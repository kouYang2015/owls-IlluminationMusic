<?php

function insertNewUser($username, $first_name, $last_name, $newEmail, $user_password)
{
    //@$db = mysqli_connect("localhost", "ics325fa2226", "9427", "ics325fa2226"); // Use when using metrostate server
    @$db = mysqli_connect("localhost", "root", "", "illumination_local"); //Use when working offline and locally
    if (mysqli_connect_errno()) {
        echo "<p>Error: Could not register user.<br/>
          Please try again later.</p>";
        exit;
    }
    $query = "INSERT INTO users(username, first_name, last_name, user_email, user_password)
    VALUES(?, ?, ?, ?, ?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param('sssss', $username, $first_name, $last_name, $newEmail, $user_password);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo 'Username: ' . $username . '<br>';
        echo 'First name: ' . $first_name . '<br>';
        echo 'Last name: ' . $last_name . '<br>';
        echo 'Email: ' . $newEmail . '<br>';
    } else {
        echo "<p>An error has occurred.<br/>
           Could not sign up.</p>";
    }

    $db->close();
}

function updatePassword($usernameToSearchFor, $newPassword)
{
    //@$db = mysqli_connect("localhost", "ics325fa2226", "9427", "ics325fa2226"); // Use when using metrostate server
    @$db = mysqli_connect("localhost", "root", "", "illumination_local"); //Use when working offline and locally
    if (mysqli_connect_errno()) {
        return false;
        exit;
    }
    $query = "UPDATE users SET user_password = ? WHERE username = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('ss', $newPassword, $usernameToSearchFor);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        $stmt->free_result();
        $db->close();
        return true;
    } else {
        $stmt->free_result();
        $db->close();
        return false;
    }
}

function updateEmail($usernameToSearchFor, $newEmail)
{
    //@$db = mysqli_connect("localhost", "ics325fa2226", "9427", "ics325fa2226"); // Use when using metrostate server
    @$db = mysqli_connect("localhost", "root", "", "illumination_local"); //Use when working offline and locally
    if (mysqli_connect_errno()) {
        return false;
        exit;
    }
    $query = "UPDATE users SET user_email = ? WHERE username = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('ss', $newEmail, $usernameToSearchFor);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $stmt->free_result();
        $db->close();
        return true;
    } else {
        $stmt->free_result();
        $db->close();
        return false;
    }
}

function updateProfileImg ($username, $imgfilepath) {
    //@$db = mysqli_connect("localhost", "ics325fa2226", "9427", "ics325fa2226"); // Use when using metrostate server
    $db = new mysqli("localhost", "root", "", "illumination_local");
}

function validateUsernameEmail($login_user)
{
    //@$db = mysqli_connect("localhost", "ics325fa2226", "9427", "ics325fa2226"); // Use when using metrostate server
    $db = new mysqli("localhost", "root", "", "illumination_local");
    if (mysqli_connect_errno()) {
        return false;
        exit;
    }
    $login_user2 = $login_user;
    $query = "SELECT username, user_email FROM users WHERE (username = ?) OR (user_email = ?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param('ss', $login_user, $login_user2);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($fetched_username, $fetched_useremail);

    while ($stmt->fetch()) {
        if ($fetched_username == $login_user || $fetched_useremail == $login_user) {
            $stmt->free_result();
            $db->close();
            return true;
        }
    }
    $stmt->free_result();
    $db->close();
    return false;
}

function validateUsernamePassword($username, $password)
{
    //@$db = mysqli_connect("localhost", "ics325fa2226", "9427", "ics325fa2226"); // Use when using metrostate server
    $db = new mysqli("localhost", "root", "", "illumination_local");
    if (mysqli_connect_errno()) {
        return false;
        exit;
    }

    $query = "SELECT user_password FROM users WHERE (username = ?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($user_password);
    while ($stmt->fetch()) {
        if ($user_password == $password) {
            $stmt->free_result();
            $db->close();
            return true;
        }
    }
    $stmt->free_result();
    $db->close();
    return false;
}

function validateEmailPassword($email, $password)
{
    //@$db = mysqli_connect("localhost", "ics325fa2226", "9427", "ics325fa2226"); // Use when using metrostate server
    $db = new mysqli("localhost", "root", "", "illumination_local");
    if (mysqli_connect_errno()) {
        return false;
        exit;
    }

    $query = "SELECT user_password FROM users WHERE (user_email = ?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($user_password);
    $validated = false;
    while ($stmt->fetch()) {
        if ($user_password == $password) {
            $stmt->free_result();
            $db->close();
            return true;
        }
    }
    $stmt->free_result();
    $db->close();
    return false;
}

function retrieveProfileImg($username) {
    //@$db = mysqli_connect("localhost", "ics325fa2226", "9427", "ics325fa2226"); // Use when using metrostate server
    $db = new mysqli("localhost", "root", "", "illumination_local");
    if (mysqli_connect_errno()) {
    return null;
    } else {
        $query = "SELECT profile_image_filename FROM user_profile_images 
        right join users on user_profile_images.user_id = users.user_id WHERE (username = ?) ";
        $stmt = $db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $userimagename = $result->fetch_row();
        $stmt->free_result();
        $db->close();
        if (is_array($userimagename) && $userimagename[0] != null) {
            return $userimagename[0];
        } else {
            return null;
        }
    }
}

function retrieveEmail($username){
    //@$db = mysqli_connect("localhost", "ics325fa2226", "9427", "ics325fa2226"); // Use when using metrostate server
    $db = new mysqli("localhost", "root", "", "illumination_local");
    if (mysqli_connect_errno()) {
        echo '<p>Error: Could not connect to database. Please try again later.</p>';
        exit;
    }
    $user_email = "";
    $query = "SELECT user_email FROM users WHERE (username = ?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();

    $stmt->bind_result($user_email);
    $stmt->fetch();
    $stmt->free_result();
    $db->close();
    return $user_email;
}
<?php

function insertNewUser($username, $first_name, $last_name, $newEmail, $user_password)
{
    //@$db = mysqli_connect("localhost", "ics325fa2226", "9427", "ics325fa2226"); // Use when using metrostate server
    @$db = mysqli_connect("localhost", "root", "", "illumination_local"); //Use when working offline and locally
    if (mysqli_connect_errno()) {
        echo "<p>Error: Could not connect to database.<br/>
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
        echo "<p>Error: Could not connect to database.<br/>
          Please try again later.</p>";
        exit;
    }
    $query = "UPDATE users SET user_password = ? WHERE username = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('ss', $newPassword, $usernameToSearchFor);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        echo '<p>Succefully updated password!</p>';
    } else {
        echo '<p>An error has occurred.</p><br/>';
        echo '<p>Could update password.</p>';
    }

    $db->close();
}

function updateEmail($usernameToSearchFor, $newEmail)
{
    //@$db = mysqli_connect("localhost", "ics325fa2226", "9427", "ics325fa2226"); // Use when using metrostate server
    @$db = mysqli_connect("localhost", "root", "", "illumination_local"); //Use when working offline and locally
    if (mysqli_connect_errno()) {
        echo "<p>Error: Could not connect to database.<br/>
              Please try again later.</p>";
        exit;
    }
    $query = "UPDATE users SET user_email = ? WHERE username = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('ss', $newEmail, $usernameToSearchFor);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo '<p>Succefully updated email!</p>';
        echo '<p>New email:' . $newEmail . ' set for ' . $usernameToSearchFor . '</p><br>';
    } else {
        echo '<p>An error has occurred.</p><br/>';
        echo '<p>Could update email.</p>';
    }
}

function validatePassword($username, $password)
{
    //@$db = mysqli_connect("localhost", "ics325fa2226", "9427", "ics325fa2226"); // Use when using metrostate server
    $db = new mysqli("localhost", "root", "", "illumination_local");
    if (mysqli_connect_errno()) {
        echo '<p>Error: Could not connect to database. Please try again later.</p>';
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
            return true;
        }
    }
    return false;
}

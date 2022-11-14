<?php
//Connect to database
//@$db = mysqli_connect("localhost", "ics325fa2226", "9427", "ics325fa2226"); // Use when using metrostate server
@$db = mysqli_connect("localhost", "root", "", "illumination_local"); //Use when working offline and locally
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {
    echo "Connection success!";
}

//create all our read, insert, update, and delete query statements

function updateUserEmail($username, $newEmail)
{
    echo '';
}

function updateUserPassword($username, $newPassword)
{
    echo '';
}

<?php
session_start();

function setSession()
{
    $_SESSION['username'] = null;
}

function loginUser($username)
{
    if (!isset($_SESSION['username']) && array_key_exists('username', $_SESSION) && $_SESSION['username'] == null) {
        $_SESSION['username'] = $username;
        return true;
    }
    return false;
}

function logoutUser($username)
{
    if (isset($_SESSION['username']) && array_key_exists('username', $_SESSION) &&  $_SESSION['username'] == $username) {
        session_unset();
        session_destroy();
        return true;
    }
    return false;
}

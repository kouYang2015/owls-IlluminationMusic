<?php
include_once 'session.php'; // check if username exists in $_Session

function showLoggedInHeader()
{
    echo '
    <header>
        <div class="navbar">
            <div class="navbar-container-left">
                <a href="homePage.html">
                <img
                    class="navbar-homeIcon"
                    src="https://brandeps.com/icon-download/M/Music-icon-vector-03.svg"
                /></a>
                <a href="homePage.html">Home</a>
                <a href="userpage.php">Playlist</a>
            </div>

            <div class="dropdown">
                <img class="dropbtn" src="https://pic.onlinewebfonts.com/svg/img_24787.png" style="width:40px;height:40px;">
                <div class="dropdown-content">
                    <a href="user_setting.php">Account</a>
                    <a href="EditProfile.php">Security</a>
                    <a href="logout.php">Log out</a>
                </div>
            </div>
        </div>
    </header>
    ';
}

function showNotLoggedInHeader()
{
    echo '
    <header>
    <div class="navbar">
      <div class="navbar-container-left">
        <a href="homePage.html"
          ><img
            class="navbar-homeIcon"
            src="https://brandeps.com/icon-download/M/Music-icon-vector-03.svg"
        /></a>
        <a href="homePage.html">Home</a>
        <a href="userpage.php">Playlist</a>
      </div>

      <div class="navbar-container-right">
        <form action="Login.html">
          <input
            class="buttonContainer loginButton"
            type="submit"
            value="Login"
          />
        </form>
        <form action="signup.html">
          <input
            class="buttonContainer signupButton"
            type="submit"
            value="Signup"
          />
        </form>
      </div>
    </div>
    </header>
    ';
}

function showHomeOnlyHeader()
{
    echo '
    <header>
        <div class="navbar">
            <a href="homePage.html"><img src="https://brandeps.com/icon-download/M/Music-icon-vector-03.svg" style="width: 50px; height: 50px" /></a>
            <a href="homePage.html">Home</a>
        </div>
    </header>
    ';
}

function findHeader()
{
    $homeOnly_list = array(
        'signup.php', 'process_signup.php', 'process_login.php', 'login.php', 'ForgotPassword.php',
        'process_forgotPW.php', 'logout.php'
    );
    foreach ($homeOnly_list as $pageName) {
        if (basename($_SERVER['PHP_SELF']) == $pageName) {
            return 'homeOnly';
        }
    }
    if (isset($_SESSION['username']) && array_key_exists('username', $_SESSION)) {
        return 'showLoggedInHeader';
    } else {
        return 'showNotLoggedInHeader';
    }
}

function showHeader()
{
    switch (findHeader()) {
        case 'homeOnly':
            showHomeOnlyHeader();
            break;
        case 'showLoggedInHeader':
            showLoggedInHeader();
            break;
        case 'showNotLoggedInHeader':
            showNotLoggedInHeader();
            break;
        default:
            echo 'Could not find header';
            break;
    }
}
showHeader();

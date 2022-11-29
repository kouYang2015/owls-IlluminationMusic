<?php
include_once 'session.php'; // check if username exists in $_Session

function showLoggedInHeader()
{
    echo '
    <header>
        <div class="navbar">
            <div class="navbar-container-left">
                <a href="home.php">
                <img
                    class="navbar-homeIcon"
                    src="images/illumination_logo.png"
                /></a>
                <a href="home.php">Home</a>
                <a href="userpage.php">Playlist</a>
            </div>

            <div class="dropdown">
                <img class="dropbtn" src="https://pic.onlinewebfonts.com/svg/img_24787.png" style="width:40px;height:40px;">
                <div class="dropdown-content">
                    <a href="user_setting.php">Account</a>
                    <a href="edit-profile.php">Security</a>
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
        <a href="home.php"
          ><img
            class="navbar-homeIcon"
            src="images/illumination_logo.png"
        /></a>
        <a href="home.php">Home</a>
      </div>

      <div class="navbar-container-right">
        <form action="login.php">
          <input
            class="buttonContainer loginButton"
            type="submit"
            value="Login"
          />
        </form>
        <form action="signup.php">
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
            <div class="navbar-container-left">
                <a href="home.php"
                ><img
                    class="navbar-homeIcon"
                    src="images/illumination_logo.png"
                /></a>
                <a href="home.php">Home</a>
            </div>
        </div>
    </header>
    ';
}

function findHeader()
{
    $homeOnly_list = array(
        'signup.php', 'process-signup.php', 'process-login.php', 'login.php', 'forgot-password.php',
        'process-forgotPW.php', 'logout.php'
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

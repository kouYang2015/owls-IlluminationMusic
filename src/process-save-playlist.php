<!DOCTYPE html>
<html>

<head>
  <title>Illumination Music - Save Playlist</title>
  <link rel="stylesheet" type="text/css" href="css/theme.css" />
  <link rel="stylesheet" type="text/css" href="css/process-login.css" />
</head>
<body>
  <?php include 'header.php'; ?>

<?php
include 'database.php';
if (isset($_SESSION['username'])){
    if (isset ($_POST['saveNewPlaylist']) && isset($_SESSION['temp_playlist'])){
        $playlist_to_save = unserialize($_SESSION['temp_playlist']);
        if (insertNewPlaylist($_SESSION['username'], $playlist_to_save)){
            echo '  <div class="container">
            <h1>Playlist Saved!</h1>
            <img src="images/green_checkmark.png" alt="check">
            <h2>You have been successfully logged in!</h2>
            <a href="home.php">Go back to homepage</a>
          </div>';
            unset($_SESSION['temp_playlist']);
        } else {
            echo 'Something went wrong. Could not save new playlist.';
        }
    } 
    if (isset ($_POST['updatePlaylist']) && isset($_SESSION['playlistId']) && isset($_SESSION['temp_playlist'])){
        $playlist_to_save = unserialize($_SESSION['temp_playlist']);
        $playist_id = $_SESSION['playlistId'];
        if (updatePlaylist($playist_id, $playlist_to_save)){
            echo 'Playlist updated!';
            unset($_SESSION['temp_playlist']);
            unset($_SESSION['playlistId']);
        } else {
            echo 'Something went wrong. Could not save new playlist.';
        }
    } 
}

?>

</body>

</html>
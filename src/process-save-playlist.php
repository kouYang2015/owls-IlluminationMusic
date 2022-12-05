<!DOCTYPE html>
<html>

<head>
  <title>Illumination Music - Save Playlist</title>
</head>
<body>
  <?php include 'header.php'; ?>
  <h1 align="center">Save Playlist</h1>

<?php
include 'database.php';
if (isset($_SESSION['username'])){
    if (isset ($_POST['saveNewPlaylist']) && isset($_SESSION['temp_playlist'])){
        $playlist_to_save = unserialize($_SESSION['temp_playlist']);
        if (insertNewPlaylist($_SESSION['username'], $playlist_to_save)){
            echo 'New Playlist saved!';
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
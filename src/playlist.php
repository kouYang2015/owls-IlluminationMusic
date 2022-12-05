<!DOCTYPE html>
<html>

<head>
  <title>Illumination Music - Playlist</title>
  <link rel="stylesheet" type="text/css" href="css/theme.css" />
  <link rel="stylesheet" type="text/css" href="css/process-generate-playlist.css" />
</head>
  <body>
    <?php include "header.php"; ?>
    <div class="info-container">
      <h1 contenteditable="true">New Playlist</h1>
      <img src="images/illumination_logo.png" style="width: 250px; height: 250px" />
      <div>
        <a href="generate-playlist.php"><button type="button" value="gen">Generate New Playlist</button></a>
      </div>
    </div>

    <table id="playlistTable">
      <tr>
        <th>Title</th>
        <th>Artist</th>
        <th>Album</th>
      </tr>
      <?php
      include 'database.php';
      if (isset($_SESSION['username'])){
        if (isset($_SESSION['temp_playlist'])){
          $new_song_list = unserialize($_SESSION['temp_playlist']);
          foreach($new_song_list as $song) {
            echo '<tr><td>' . $song->getTitle() . '</td><td>' . $song->getArtist() . '</td><td>' . $song->getAlbum() .'</td></tr>';
          }
        } elseif (isset($_SESSION['playlistId'])){
          $new_song_list = retreivePlaylist($_SESSION['playlistId']);
          foreach($new_song_list as $song) {
            echo '<tr><td>' . $song->getTitle() . '</td><td>' . $song->getArtist() . '</td><td>' . $song->getAlbum() .'</td></tr>';
          }
        }
      }
      ?>
    </table>
  </body>

  <script src="yt-link-script.js"></script>

</html>


<!DOCTYPE html>
<html>

<head>
  <title>Illumination Music - New Playlist</title>
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
      $new_song_list = array();
      if (isset($_POST['genre']) && array_key_exists('genre', $_POST)) {
        $genre_list = $_POST['genre'];
        foreach ($genre_list as $genre) {
          if ($genre != 'select' ){
            $new_song_list = array_merge($new_song_list , retrieveSongsGenre($genre));
          }
        }
      }
      if (isset($_POST['year-max']) && array_key_exists('year-max', $_POST) && isset($_POST['year-min']) && array_key_exists('year-min', $_POST)) {
        $year_max = $_POST['year-max'];
        $year_min = $_POST['year-min'];
        if ($year_min != "" && $year_max != ""){
          $new_song_list = array_merge($new_song_list , retrieveSongsYear($year_max,$year_min));
        }
      }
      if (isset($_POST['album']) && array_key_exists('album', $_POST)) {
        $album_list = $_POST['album'];
        foreach ($album_list as $album) {
          if ($album != 'select' ){
            $new_song_list = array_merge($new_song_list , retrieveSongsAlbum($album));
          }
        }
      }
      if (isset($_POST['artist']) && array_key_exists('artist', $_POST)) {
        $artist_list = $_POST['artist'];
        foreach ($artist_list as $artist) {
          if ($artist != 'select' ){
            $new_song_list = array_merge($new_song_list , retrieveSongsArtist($artist));
          }
        }
      }
      if (isset($_POST['lang']) && array_key_exists('lang', $_POST)) {
        $lang_list = $_POST['lang'];
        foreach ($lang_list as $lang) {
          if ($lang != 'select' ){
            $new_song_list = array_merge($new_song_list , retrieveSongsLang($lang));
          }
        }
      }
      while (sizeof($new_song_list) > 20) {
        array_splice($new_song_list, random_int(0, sizeof($new_song_list)), 1);
      }
      shuffle($new_song_list);
      foreach($new_song_list as $song) {
        echo '<tr><td>' . $song->getTitle() . '</td><td>' . $song->getArtist() . '</td><td>' . $song->getAlbum() .'</td></tr>';
      }
      ?>
    </table>
    <div class="info-container">
    <?php if (isset($_SESSION['username'])){
      $_SESSION['temp_playlist'] = serialize($new_song_list);
      echo 
      '<form action="process-save-playlist.php" method="post">
        <button id="saveButton" type="submit" name="saveNewPlaylist" value="requestSave">Save Playlist</button>
      </form>';
      }
      ?>
    </div>
  </body>

  <script src="yt-link-script.js"></script>

</html>


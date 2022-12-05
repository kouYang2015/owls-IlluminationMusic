<!DOCTYPE html>
<html>

<head>
  <title>Illumination Music - Edit Profile</title>
  <link rel="stylesheet" type="text/css" href="css/theme.css" />
  <link rel="stylesheet" type="text/css" href="css/userpage.css" />
</head>

<body>
  <?php include 'header.php'; ?>
  <?php include 'database.php'; ?>

  <h1>Your Playlists</h1>
  <form action="search-action-page" class="searchPlaylist">
    <input type="text" placeholder="Search.." id="search" name="search" style="width:200px;height:30px;">
    <button type="submit"><i class="fa fa-search"></i>search</button>
    <br><br>
  </form>

  <?php
  $playlistarray = retrievePlaylists($_SESSION['username']);

  foreach ($playlistarray as $playlist) {
    echo 
    '<form action="playlist.php" method="post">
      <button type="submit" name="playlist_id" value="' . $playlist->getPlaylistID() .'">
      <table>
        <tr><td style="font-size:23px; font-weight:bold; padding:10px">' . $playlist->getPlaylistName() . '</td></tr>
        <tr><td><img src="' . $playlist->getImgFileName() . '"></td></tr>
      </table>
      </button>
    </form>';
  }
  ?>

</body>

</html>
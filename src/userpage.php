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

  <div class="search-container">
    <h1>Your Playlists</h1>
    <form action="" class="searchPlaylist">
      <input type="text" placeholder="Search.." id="search" name="search">
      <button type="submit"><i class="fa fa-search"></i>search</button>
    </form>
  </div>
  <div class="grid-container">
  <?php
  $playlistarray = retrievePlaylists($_SESSION['username']);
  foreach ($playlistarray as $playlist) {
    echo
    '<div class="grid-item">
    <form action="playlist.php" method="post">
      <button type="submit" name="playlist_id" value="' . $playlist->getPlaylistID() . '">
      <p>' . $playlist->getPlaylistName() . '<p>
      <img src="' . $playlist->getImgFileName() . '">
      </button>
    </form>
    </div>';
  }
  ?>
  </div>
</body>

</html>
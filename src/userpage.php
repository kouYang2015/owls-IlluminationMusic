<!DOCTYPE html>
<html>

<head>
  <title>Illumination Music - Edit Profile</title>
  <link rel="stylesheet" type="text/css" href="css/theme.css" />
  <link rel="stylesheet" type="text/css" href="css/userpage.css" />
  <style>
    td {
      display: inline-block;
    }

    .subtitle {
      text-align: center;
    }

    .grid-item {
      display: grid;
      grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
      padding-top: 5%;
    }
  </style>
</head>

<body>
  <?php include 'header.php'; ?>
  <?php include 'database.php'; ?>

  <div class="subtitle">
    <h1>Your Playlists</h1>
  </div>
  <form action="search-action-page" class="searchPlaylist">
    <input type="text" placeholder="Search.." id="search" name="search" style="width:200px;height:30px;">
    <button type="submit"><i class="fa fa-search"></i>search</button>
    <br><br>
  </form>

  <?php
  $playlistarray = retrievePlaylists($_SESSION['username']);
  echo '<div class="grid-item" id="image">';
  foreach ($playlistarray as $playlist) {
    echo
    '<form action="playlist.php" method="post">
      <button style = "padding10px;" type="submit" name="playlist_id" value="' . $playlist->getPlaylistID() . '">
      <table>
        <tr><td style="font-size:23px; font-weight:bold; float :">' . $playlist->getPlaylistName() . '</td></tr>
        <center><tr><td><img style="height:150px; width: 150px; padding: 10px; float: left" src="' . $playlist->getImgFileName() . '"></td></tr></center>
      </table>
      </button>
    </form>';
  }

  echo '</div>';
  ?>

</body>

</html>
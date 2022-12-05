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
  class playlist
  {
    private $playlist_ids;
    private $playlist_names;
    private $playlist_imgfilename;

    function __construct($playlistID, $playlistName, $imgName)
    {
      $this->playlistID = $playlistID;
      $this->playloistName = $playlistName;
      $this->imgName = $imgName;
    }

    public function playlistID()
    {
      return $this->playlistID;
    }
    public function playloistName()
    {
      return $this->playloistName;
    }
    public function imgName()
    {
      return $this->imgName;
    }
  }


  foreach ($playlistarray as $val) {
    echo '<form action="playlist.php"><input type="hidden" name ="playlist_id" value=" .$val[0] /><table><tr><td style="font-size:23px; font-weight:bold; padding:10px">' . $val[1] . '</td></tr>';
    echo '<tr><td><img src="' . $val[2] . '></td></tr></table></form>';


    echo '<form action="playlist.php"><input type="hidden" name ="playlist_id" value=" .$val[0] />;
  <button type="submit" name ="submitbtn"><img <?Php src=.$playlist[2] ?></button></form>';
  }
  ?>






</body>

</html>
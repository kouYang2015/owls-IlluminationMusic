<!DOCTYPE html>
<html>

<head>
  <title>Illumination Music - process_generateNewPlaylist</title>
  <link rel="stylesheet" type="text/css" href="css/theme.css" />
  <link rel="stylesheet" type="text/css" href="css/editPlaylist.css" />
  <link rel="stylesheet" type="text/css" href="css/header.css" />

</head>


<?php include "header.php"; ?>
<div class="playlistImage-container">
  <img src="https://d2rd7etdn93tqb.cloudfront.net/wp-content/uploads/2022/03/spotify-playlist-cover-orange-headphones-032322.jpg" style="width: 250px; height: 250px" />
</div>

<div class="playlistTitle-container">
  <h1 contenteditable="true">Playlist For You</h1>
</div>

<div class="submit_btn_container">
  <input type="submit" class="buttonContainer saveButton" id="save" value="Save Playlist" />
  <input type="submit" class="buttonContainer deleteButton" id="delete" value="Delete Playlist" />
  <input type="button" class="buttonContainer cancelButton" value="Cancel" onclick="history.back()" />
</div>


<?php
class Songs
{
  private $songID;
  private $genre;
  private $songTitle;
  private $artists;
  private $language;
  private $album;

  function __construct($songID, $genre, $songTitle, $artists, $language, $album)
  {
    $this->songID = $songID;
    $this->genre = $genre;
    $this->songTitle = $songTitle;
    $this->artists = $artists;
    $this->language = $language;
    $this->album = $album;
  }

  public function getID()
  {
    return $this->songID;
  }
  public function getGenre()
  {
    return $this->genre;
  }
  public function getTitle()
  {
    return $this->songTitle;
  }
  public function getArtists()
  {
    return $this->artists;
  }
  public function getLang()
  {
    return $this->language;
  }
  public function getAlbum()
  {
    return $this->album;
  }


  public function setID()
  {
    return $this->songID;
  }
  public function setGenre()
  {
    return $this->genre;
  }
  public function setTitle()
  {
    return $this->songTitle;
  }
  public function setArtists()
  {
    return $this->artists;
  }
  public function setLang()
  {
    return $this->language;
  }
  public function setAlbum()
  {
    return $this->album;
  }
}


$db = new mysqli("localhost", "root", "", "illumination_local");
if (mysqli_connect_errno()) {
  echo '<p>Error: Could not connect to database. Please try again later.</p>';
  exit;
}
$sql = "SELECT * FROM songs LEFT JOIN song_has_genre ON songs.song_id = song_has_genre.song_id LEFT JOIN genres ON song_has_genre.genre_id = genre.genre_id";
$stmt = $db->prepare($sql);
$stmt->bind_param('s', $usernameToSearchFor);
$stmt->execute();
$stmt->store_result();

$stmt->bind_result($user_email);

while ($stmt->fetch()) {
  echo $songTitle . '<br><br>';
  "</p>";
}




?>
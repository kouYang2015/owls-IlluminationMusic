<?php

class Song
{
  private $songID;
  private $songTitle;
  private $artist;
  private $album;

  function __construct($songID, $songTitle, $album, $artist)
  {
    $this->songID = $songID;
    $this->songTitle = $songTitle;
    $this->album = $album;
    $this->artist = $artist;
  }

  public function getID()
  {
    return $this->songID;
  }
  public function getTitle()
  {
    return $this->songTitle;
  }
  public function getArtist()
  {
    return $this->artist;
  }
  public function getAlbum()
  {
    return $this->album;
  }
}

?>
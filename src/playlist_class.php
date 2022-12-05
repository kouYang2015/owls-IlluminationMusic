<?php
  class Playlist
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
    public function playlistName()
    {
      return $this->playlistName;
    }
    public function imgName()
    {
      return $this->imgName;
    }
  }

  ?>
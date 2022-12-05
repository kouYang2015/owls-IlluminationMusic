<?php
  class Playlist
  {
    private $playlist_id;
    private $playlist_name;
    private $playlist_imgfilename;

    function __construct($playlistID, $playlistName, $imgName)
    {
      $this->playlist_id = $playlistID;
      $this->playlist_name = $playlistName;
      $this->playlist_imgfilename = $imgName;
    }

    public function getPlaylistID()
    {
      return $this->playlist_id;
    }
    public function getPlaylistName()
    {
      return $this->playlist_name;
    }
    public function getImgFileName()
    {
      return $this->playlist_imgfilename;
    }
  }

  ?>
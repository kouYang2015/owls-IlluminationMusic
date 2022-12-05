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
<table class="list" style="width: 80%" id="myTable">
    <tr class="top">
        <th class="title">Title</th>
        <th class="album">Album</th>
        <th class="artist">Artist</th>
        <th class="length">Length</th>
    </tr>
    <tr>
        <td class="song" id="song1">song1</td>
        <td>ABC</td>
        <td>Artist Name</td>
        <td>3 min 15 sec</td>
    </tr>
    <tr>
        <td class="song" id="song2">song2</td>
        <td>BCD</td>
        <td>Artist Name</td>
        <td>2 min 30 sec</td>
    </tr>
    <tr>
        <td class="song" id="song3">song3</td>
        <td>CDE</td>
        <td>Artist Name</td>
        <td>3 min 05 sec</td>
    </tr>
    <tr>
        <td class="song" id="song4">song4</td>
        <td>DEF</td>
        <td>Artist Name</td>
        <td>2 min 50 sec</td>
    </tr>
    <tr>
        <td class="song" id="song5">song5</td>
        <td>EFG</td>
        <td>Artist Name</td>
        <td>3 min 00 sec</td>
    </tr>
</table>
<br />

<div class="submit_btn_container">
    <a href="#addSongtToPlaylist">
        <input class="addButton buttonContainer" type="submit" id="add" value="Add a Song" />
    </a>
</div>
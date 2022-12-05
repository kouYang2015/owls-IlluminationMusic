<!DOCTYPE html>
<html>

<head>
  <title>Illumination Music - Add Song</title>
  <link rel="stylesheet" type="text/css" href="css/theme.css" />
  <style></style>
</head>

<body>
  <?php include 'header.php'; ?>
  <h1 align="center">Add Song</h1>

  <p>TItle of album comes here</p>

  <form action="" method="GET" id="getInput">
    <table>
      <tr>
        <td>SongTItle: </td>
        <td class="input-group1">
          <input type="text" name="search" value="<?php if (isset($_GET['searchTitle'])) {
                                                    echo $_GET['searchTitle'];
                                                  } ?>" class="form-control1" placeholder="search title">
        </td>
      </tr>
      <tr>
        <td>Album: </td>
        <td class="input-group2">
          <input type="text" name="search" value="<?php if (isset($_GET['searchAlbum'])) {
                                                    echo $_GET['searchAlbum'];
                                                  } ?>" class="form-control2" placeholder="search album">
        </td>
      </tr>
      <tr>
        <td>Artist: </td>
        <td class="input-group3">
          <input type="text" name="search" value="<?php if (isset($_GET['searchArtist'])) {
                                                    echo $_GET['searchArtist'];
                                                  } ?>" class="form-control3" placeholder="search artist">
        </td>
      </tr>
      <tr>
        <td><button type="submit" class="btn btn-primary">Search</button></td>
      </tr>
    </table>
  </form>
  <div class="col-md-12">
    <div class="card-body">
      <table class="table table-bordered">
        <thread>
          <tr>
            <th>Title</th>
            <th>Album</th>
            <th>Artist</th>
          </tr>
        </thread>
        <tbody>
          <?php
          $con = mysqli_connect("localhost", "root", "", "illumination_local");

          if (isset($_GET['searchTitle']) && isset($_GET['searchAlbum']) && isset($_GET['searchArtist'])) {
            $title = $_GET['searchTitle'];
            $album = $_GET['searchAlbum'];
            $artist = $_GET['searchArtist'];

            $query = "SELECT * FROM songs AS s INNER JOIN albums AS a ON s.album_id = a.album_id INNER JOIN song_has_artist AS sh ON s.song_id = sh.song_id INNER JOIN artists AS ar ON sh.artist_id = ar.artist_id";
            $query_run = mysqli_query($con, $query);

            if (mysqli_num_rows($query_run) > 0) {
              foreach ($query_run as $items) {
          ?>
                <tr>
                  <td><?= $items['title']; ?></td>
                  <td><?= $items['album']; ?></td>
                  <td><?= $items['artist']; ?></td>
                </tr>
              <?php
              }
            } else {
              ?>
              <tr>
                <td colspan="3">No Record Found</td>
              </tr>
          <?php
            }
          }
          ?>
        </tbody>
      </table>

</body>

</html>
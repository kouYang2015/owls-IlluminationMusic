<!DOCTYPE html>
<html>

<head>
  <title>Illumination Music - Generate New Playlist</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="css/theme.css" />
  <style>
    h1 {
      font-size: 50px;
    }

    h2,
    h3,
    hr,
    h5,
    h6 {
      font-size: 28px;
    }

    .generatebtn {
      font-size: 25px;
      border-radius: 30px;
      padding: 10px;
      background-color: rgb(221, 157, 39);
    }

    button.generatebtn:hover {
      font-weight: bold;
      background-color: rgb(221, 157, 39);
    }

    button {
      display: inline-block;
      font-size: 20px;
      border-radius: 30px;
      padding: 7px 2%;
    }

    button:hover {
      background-color: aquamarine;
    }

    #check_genre,
    #check_year,
    #check_album,
    #check_artist,
    #check_language {
      width: 100%;
      padding: 50px 0;
      text-align: center;
      background-color: lightblue;
      margin-top: 20px;
      position: absolute;
      display: none;
    }

    /* #check_year {
      width: 100%;
      padding: 50px 0;
      text-align: center;
      background-color: lightblue;
      margin-top: 20px;
      position: absolute;
      display: none;
    }

    #check_album {
      width: 100%;
      padding: 50px 0;
      text-align: center;
      background-color: lightblue;
      margin-top: 20px;
      position: absolute;
      display: none;
    }

    #check_artist {
      width: 100%;
      padding: 50px 0;
      text-align: center;
      background-color: lightblue;
      margin-top: 20px;
      position: absolute;
      display: none;
    }

    #check_language {
      width: 100%;
      padding: 50px 0;
      text-align: center;
      background-color: lightblue;
      margin-top: 20px;
      position: absolute;
      display: none;
    } */

    td {
      text-align: left;
    }
  </style>
</head>

<body>
  <header>
    <div class="navbar">
      <a href="homePage.html"><img src="https://brandeps.com/icon-download/M/Music-icon-vector-03.svg" style="width: 50px; height: 50px" /></a>
      <a href="homePage.html">Home</a>
      <a href="userpage.php">Playlist</a>

      <div class="dropdown">
        <img class="dropbtn" src="https://pic.onlinewebfonts.com/svg/img_24787.png" style="width: 40px; height: 40px" />
        <div class="dropdown-content">
          <a href="user_setting.php">Account</a>
          <a href="EditProfile.php">Security</a>
          <a href="logout.php">Log out</a>
        </div>
      </div>
    </div>
  </header>
  <h1 align="center">New Playlist</h1>

  <div class="genrate" style="text-align: center">
    <button type="submit" class="generatebtn">Generate Playlist</button>
  </div>
  <br /><br />

  <div class="filterbtn" style="text-align: center">
    <button onclick="visibility('check_genre',)" class="genre">Genre</button>
    <div id="check_genre">
      <h2>Genre</h2>
      <table>
        <tr>
          <td><input type="checkbox" name="genre_list[]" value="Blues">Blues</td>
        </tr>
        <tr>
          <td><input type="checkbox" name="genre_list[]" value="Classical">Classical</td>
        </tr>
        <tr>
          <td><input type="checkbox" name="genre_list[]" value="Country">Country</td>
        </tr>
        <tr>
          <td><input type="checkbox" name="genre_list[]" value="Dance/Electronics">Dance/Electronics</td>
        </tr>
        <tr>
          <td><input type="checkbox" name="genre_list[]" value="HipHop">HipHop</td>
        </tr>
        <tr>
          <td><input type="checkbox" name="genre_list[]" value="Jazz">Jazz</td>
        </tr>
        <tr>
          <td><input type="checkbox" name="genre_list[]" value="Latin">Latin</td>
        </tr>
        <tr>
          <td><input type="checkbox" name="genre_list[]" value="Metal">Metal</td>
        </tr>
        <tr>
          <td><input type="checkbox" name="genre_list[]" value="Pop">Pop</td>
        </tr>
        <tr>
          <td><input type="checkbox" name="genre_list[]" value="R&B">R&B</td>
        </tr>
        <tr>
          <td><input type="checkbox" name="genre_list[]" value="Rock">Rock</td>
        </tr>
        <tr>
          <td><input type="submit" name="submit" value="Submit"></td>
        </tr>

      </table>

    </div>
    <!-- <?php
          echo '<br/>';
          $genre = $_POST['genre_list'];
          foreach ($genre as $key => $value) {
            echo $value . '<br/>';
          }
          ?> -->

    <button onclick="visibility('check_year')" class="year">Year</button>
    <div id="check_year">
      <h3>Year</h3>
      <table>
        <tr>
          <td><input type="number" min="1900" max="2023" step="1" value="2000" /></td>
          <td><input type="number" min="1900" max="2023" step="1" value="2000" /></td>
        </tr>
        <tr>
          <td><input type="submit" name="submit" value="Submit"></td>
        </tr>
      </table>

    </div>

    <button onclick="visibility('check_album',)" class="album">Album</button>
    <div id="check_album">
      <h4>Album</h4>
      <table>
        <tr>
          <td><input type="checkbox" name="album_list[]" value="album1">alubm1</td>
        </tr>
        <tr>
          <td><input type="checkbox" name="album_list[]" value="album2">album2</td>
        </tr>
        <tr>
          <td><input type="checkbox" name="album_list[]" value="album3">album3</td>
        </tr>
        <tr>
          <td><input type="checkbox" name="album_list[]" value="album4">album4</td>
        </tr>
        <tr>
          <td><input type="checkbox" name="album_list[]" value="album5">album5</td>
        </tr>
        <tr>
          <td><input type="checkbox" name="album_list[]" value="album5">album5</td>
        </tr>
        <tr>
          <td><input type="submit" name="submit" value="Submit"></td>
        </tr>
      </table>
    </div>

    <button onclick="visibility('check_artist')" class="artist">
      Artist/Band
    </button>
    <div id="check_artist">
      <h5>Artist/Band</h5>
      <table>
        <tr>
          <td><input type="checkbox" name="artist_list[]" value="Taylor Swift">Taylor Swift</td>
        </tr>
        <tr>
          <td><input type="checkbox" name="artist_list[]" value="BTS">BTS</td>
        </tr>
        <tr>
          <td><input type="checkbox" name="artist_list[]" value="Eminem">Eminem</td>
        </tr>
        <tr>
          <td><input type="checkbox" name="artist_list[]" value="Beyonce">Beyonce</td>
        </tr>
        <tr>
          <td><input type="checkbox" name="artist_list[]" value="Drake">Drake</td>
        </tr>
        <tr>
          <td><input type="submit" name="submit" value="Submit"></td>
        </tr>
      </table>
    </div>

    <button onclick="visibility('check_language')" class="language">
      Language
    </button>
    <div id="check_language">
      <h6>Language</h6>
      <table>
        <tr>
          <td><input type="checkbox" name="artist_list[]" value="English">English</td>
        </tr>
        <tr>
          <td><input type="checkbox" name="artist_list[]" value="Spanish">Spanish</td>
        </tr>
        <tr>
          <td><input type="checkbox" name="artist_list[]" value="French">French</td>
        </tr>
        <tr>
          <td><input type="checkbox" name="artist_list[]" value="German">German</td>
        </tr>
        <tr>
          <td><input type="checkbox" name="artist_list[]" value="Mandarin">Mandarin</td>
        </tr>
        <tr>
          <td><input type="checkbox" name="artist_list[]" value="Korean">Korean</td>
        </tr>
        <tr>
          <td><input type="submit" name="submit" value="Submit"></td>
        </tr>
      </table>
    </div>
  </div>


  <script>
    function visibility(id) {
      var x = document.getElementById(id);
      if (x.style.display == "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }
  </script>

</body>

</html>
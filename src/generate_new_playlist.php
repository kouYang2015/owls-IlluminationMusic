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

    #check_genre {
      width: 100%;
      padding: 50px 0;
      text-align: center;
      background-color: lightblue;
      margin-top: 20px;
      position: absolute;
      display: none;
    }

    #check_year {
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
      <form action="#" method="post">
        <input type="checkbox" name="genre_list[]" value="Blues" /><label>Blues</label><br /><br />
        <input type="checkbox" name="genre_list[]" value="Classical" /><label>Classical</label><br /><br />
        <input type="checkbox" name="genre_list[]" value="Country" /><label>Country</label><br /><br />
        <input type="checkbox" name="genre_list[]" value="Dance/Electronics" /><label>Dance/Electronics</label><br /><br />
        <input type="checkbox" name="genre_list[]" value="HipHop" /><label>HipHop</label><br /><br />
        <input type="checkbox" name="genre_list[]" value="Jazz" /><label>Jazz</label><br /><br />
        <input type="checkbox" name="genre_list[]" value="Latin" /><label>Latin</label><br /><br />
        <input type="checkbox" name="genre_list[]" value="Metal" /><label>Metal</label><br /><br />
        <input type="checkbox" name="genre_list[]" value="Pop" /><label>Pop</label><br /><br />
        <input type="checkbox" name="genre_list[]" value="R&B" /><label>R&B</label><br /><br />
        <input type="checkbox" name="genre_list[]" value="Rock" /><label>Rock</label><br /><br />
        <input type="submit" name="submit" value="Submit" />
      </form>
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
      <p>Year</p>

    </div>

    <button onclick="visibility('check_album',)" class="album">Album</button>
    <div id="check_album">
      <p>Album</p>
      <input type="checkbox" name="album_list[]" value="album1" /><label>album1</label><br /><br />
      <input type="checkbox" name="album_list[]" value="album2" /><label>album2</label><br /><br />
      <input type="checkbox" name="album_list[]" value="album3" /><label>album3</label><br /><br />
      <input type="checkbox" name="album_list[]" value="album4" /><label>album4</label><br /><br />
      <input type="checkbox" name="album_list[]" value="album5" /><label>album5</label><br /><br />
    </div>

    <button onclick="visibility('check_artist')" class="artist">
      Artist/Band
    </button>
    <div id="check_artist">
      <p>Artist/Band</p>
      <input type="checkbox" name="artist_list[]" value="Taylor Swift" /><label>Taylor Swift</label><br /><br />
      <input type="checkbox" name="artist_list[]" value="BTS" /><label>BTS</label><br /><br />
      <input type="checkbox" name="artist_list[]" value="Eminem" /><label>Eminem</label><br /><br />
      <input type="checkbox" name="artist_list[]" value="Beyonce" /><label>Beyonce</label><br /><br />
      <input type="checkbox" name="artist_list[]" value="Drake" /><label>Drake</label><br /><br />
    </div>

    <button onclick="visibility('check_language')" class="language">
      Language
    </button>
    <div id="check_language">
      <p>Language</p>
      <input type="checkbox" name="artist_list[]" value="English" /><label>English</label><br /><br />
      <input type="checkbox" name="artist_list[]" value="Spanish" /><label>Spanish</label><br /><br />
      <input type="checkbox" name="artist_list[]" value="French" /><label>French</label><br /><br />
      <input type="checkbox" name="artist_list[]" value="German" /><label>German</label><br /><br />
      <input type="checkbox" name="artist_list[]" value="Mandarin" /><label>Mandarin</label><br /><br />
      <input type="checkbox" name="artist_list[]" value="Korean" /><label>Korean</label><br /><br />

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
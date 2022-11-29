<!DOCTYPE html>
<html>

<head>
  <title>Illumination Music - Generate New Playlist</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="css/theme.css" />
  <style>
    .generatebtn {
      font-size: 25px;
      border-radius: 30px;
      padding: 10px;
      background-color: rgb(221, 157, 39);
    }

    .generatebtn:hover {
      font-weight: bold;
      background-color: rgb(221, 157, 39);
    }

    h2,
    h3,
    h4,
    h5,
    h6 {
      font-size: 28px;
      text-align: center;
    }


    .filterbtn {
      display: grid;
      grid-template-columns: 1fr 1fr 1fr 1fr 1fr;

    }

    button {
      display: inline-block;
      font-size: 20px;
      border-radius: 30px;
      padding: 10px 15%;
    }

    button:hover {
      background-color: aquamarine;
    }

    table {
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
  <div class="filterbtn">
    <div class="grid-item" id="genre">
      <button onclick="visibility('check_genre')" class="genrebtn">Genre</button>
      <form action="#" method="POST" id="getSelectedbox">

        <table id=check_genre>
          <tr>
            <td>
              <h2>Genre</h2>
            </td>
          </tr>
          <tr>
            <td><input type="checkbox" id="genre_checkbox" name="genre_list[]" value="Blues">Blues</td>
          </tr>
          <tr>
            <td><input type="checkbox" id="genre_checkbox" name="genre_list[]" value="Classical">Classical</td>
          </tr>
          <tr>
            <td><input type="checkbox" id="genre_checkbox" name="genre_list[]" value="Country">Country</td>
          </tr>
          <tr>
            <td><input type="checkbox" id="genre_checkbox" name="genre_list[]" value="Dance/Electronics">Dance/Electronics</td>
          </tr>
          <tr>
            <td><input type="checkbox" id="genre_checkbox" name="genre_list[]" value="HipHop">HipHop</td>
          </tr>
          <tr>
            <td><input type="checkbox" id="genre_checkbox" name="genre_list[]" value="Jazz">Jazz</td>
          </tr>
          <tr>
            <td><input type="checkbox" id="genre_checkbox" name="genre_list[]" value="Latin">Latin</td>
          </tr>
          <tr>
            <td><input type="checkbox" id="genre_checkbox" name="genre_list[]" value="Metal">Metal</td>
          </tr>
          <tr>
            <td><input type="checkbox" id="genre_checkbox" name="genre_list[]" value="Pop">Pop</td>
          </tr>
          <tr>
            <td><input type="checkbox" id="genre_checkbox" name="genre_list[]" value="R&B">R&B</td>
          </tr>
          <tr>
            <td><input type="checkbox" id="genre_checkbox" name="genre_list[]" value="Rock">Rock</td>
          </tr>
          <tr>
            <td><input type="submit" id="submission1" name="submit" value="Submit"></td>
          </tr>
        </table>
        <div id="divresult"></div>
      </form>
    </div>
    <div class="grid-item" id="year">
      <button onclick="visibility('check_year')" class="year">Year</button>
      <form action="#" method="post" id="getSelectedbox">
        <table id="check_year">
          <tr>
            <td>
              <h3>Year</h3>
            </td>
          </tr>
          <tr>
            <td><input type=" number" id="year_checkbox" min="1900" max="2023" step="1" value="2000" size="4" />
            </td>
            <td><input type="number" id="year_checkbox" min="1900" max="2023" step="1" value="2000" size="4" /></td>
          </tr>
          <tr>
            <td><input type="submit" id="submission2" name="submit" value="Submit"></td>
          </tr>
        </table>
        <div id="divresult"></div>
      </form>
    </div>

    <div class="grid-item" id="album">
      <button onclick="visibility('check_album',)" class="album">Album</button>
      <form action="#" method="post" id="getSelectedbox">
        <table id="check_album">
          <tr>
            <td>
              <h4>Album</h4>
            </td>
          </tr>
          <tr>
            <td><input type="checkbox" id="album_checkbox" name="album_list[]" value="album1">alubm1</td>
          </tr>
          <tr>
            <td><input type="checkbox" id="album_checkbox" name="album_list[]" value="album2">album2</td>
          </tr>
          <tr>
            <td><input type="checkbox" id="album_checkbox" name="album_list[]" value="album3">album3</td>
          </tr>
          <tr>
            <td><input type="checkbox" id="album_checkbox" name="album_list[]" value="album4">album4</td>
          </tr>
          <tr>
            <td><input type="checkbox" id="album_checkbox" name="album_list[]" value="album5">album5</td>
          </tr>
          <tr>
            <td><input type="checkbox" id="album_checkbox" name="album_list[]" value="album5">album5</td>
          </tr>
          <tr>
            <td><input type="submit" id="submission3" name="submit" value="Submit"></td>
          </tr>
        </table>
        <div id="divresult"></div>
      </form>
    </div>


    <div class="grid-item" id="artist">
      <button onclick="visibility('check_artist')" class="artist">Artist/Band</button>
      <form action="#" method="post" id="getSelectedbox">
        <table id="check_artist">
          <tr>
            <td>
              <h5>Artist/Band</h5>
            </td>
          </tr>
          <tr>
            <td><input type="checkbox" id="artist_checkbox" name="artist_list[]" value="Taylor Swift">Taylor Swift</td>
          </tr>
          <tr>
            <td><input type="checkbox" id="artist_checkbox" name="artist_list[]" value="BTS">BTS</td>
          </tr>
          <tr>
            <td><input type="checkbox" id="artist_checkbox" name="artist_list[]" value="Eminem">Eminem</td>
          </tr>
          <tr>
            <td><input type="checkbox" id="artist_checkbox" name="artist_list[]" value="Beyonce">Beyonce</td>
          </tr>
          <tr>
            <td><input type="checkbox" id="artist_checkbox" name="artist_list[]" value="Drake">Drake</td>
          </tr>
          <tr>
            <td><input type="submit" id="submission4" name="submit" value="Submit"></td>
          </tr>
        </table>
        <div id="divresult"></div>
      </form>
    </div>
    <div class="grid-item" id="language">
      <button onclick="visibility('check_language')" class="language">Language</button>
      <form action="#" method="post" id="getSelectedbox">
        <table id="check_language">
          <tr>
            <td>
              <h6>Language</h6>
            </td>
          </tr>
          <tr>
            <td><input type="checkbox" id="language_checkbox" name="language_list[]" value="English">English</td>
          </tr>
          <tr>
            <td><input type="checkbox" id="language_checkbox" name="language_list[]" value="Spanish">Spanish</td>
          </tr>
          <tr>
            <td><input type="checkbox" id="language_checkbox" name="language_list[]" value="French">French</td>
          </tr>
          <tr>
            <td><input type="checkbox" id="language_checkbox" name="language_list[]" value="German">German</td>
          </tr>
          <tr>
            <td><input type="checkbox" id="language_checkbox" name="language_list[]" value="Mandarin">Mandarin</td>
          </tr>
          <tr>
            <td><input type="checkbox" id="language_checkbox" name="language_list[]" value="Korean">Korean</td>
          </tr>
          <tr>
            <td><input type="submit" id="submission5" name="submit" value="Submit"></td>
          </tr>
        </table>
        <div id="divresult"></div>
      </form>
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

  <script>
    var form = docunment.getElementById('getSelectedbox');
    form.addEventListner('submission', function(e) {
      e.preventDefault();
      var checkboxes = document.getElementsByName('genre_list');
      console.log(checkboxes);
    });
  </script>

</body>

</html>
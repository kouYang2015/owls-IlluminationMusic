<!DOCTYPE html>
<html>

<head>
  <title>Illumination Music - Generate New Playlist</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="css/theme.css" />
  <link rel="stylesheet" type="text/css" href="css/header.css" />
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

    h2,
    h3,
    h4,
    h5,
    h6 {
      font-size: 28px;
      text-align: center;
    }
  </style>
</head>

<body>
  <?php include 'header.php' ?>
  <h1 align="center">New Playlist</h1>
  <div class="genrate" style="text-align: center">
    <button type="submit" class="generatebtn">Generate Playlist</button>
  </div>
  <br /><br />

  <div class="filterbtn">
    <div class="grid-item" id="genre">
      <button onclick="visibility('check_genre')" class="genrebtn">Genre</button>
      <form action="process-generate-playlist.php" method=" POST" id="get-Selected-genre-box">
        <table id="check_genre">
          <tr>
            <td>
              <h2>Genre</h2>
            </td>
          </tr>
          <tr>
            <td><select name="chooseGenre1" id="chooseGenre1">
                <option value="select">Select</option>
                <option value="Blues">Blues</option>
                <option value="Classical">Classical</option>
                <option value="Country">Country</option>
                <option value="Dance/Electronics">Dance/Electronics</option>
                <option value="HipHop">HipHop</option>
                <option value="Jazz">Jazz</option>
                <option value="Latin">Latin</option>
                <option value="Metal">Metal</option>
                <option value="Pop">Pop</option>
                <option value="R&B">R&B</option>
                <option value="Rock">Rock</option>
              </select></td>
          </tr>
          <tr>
            <td><select name="chooseGenre2" id="chooseGenre2">
                <option value="select">Select</option>
                <option value="Blues">Blues</option>
                <option value="Classical">Classical</option>
                <option value="Country">Country</option>
                <option value="Dance/Electronics">Dance/Electronics</option>
                <option value="HipHop">HipHop</option>
                <option value="Jazz">Jazz</option>
                <option value="Latin">Latin</option>
                <option value="Metal">Metal</option>
                <option value="Pop">Pop</option>
                <option value="R&B">R&B</option>
                <option value="Rock">Rock</option>
              </select></td>
          </tr>
          <tr>
            <td><select name="chooseGenre3" id="chooseGenre3">
                <option value="select">Select</option>
                <option value="Blues">Blues</option>
                <option value="Classical">Classical</option>
                <option value="Country">Country</option>
                <option value="Dance/Electronics">Dance/Electronics</option>
                <option value="HipHop">HipHop</option>
                <option value="Jazz">Jazz</option>
                <option value="Latin">Latin</option>
                <option value="Metal">Metal</option>
                <option value="Pop">Pop</option>
                <option value="R&B">R&B</option>
                <option value="Rock">Rock</option>
              </select></td>
          </tr>
        </table>
      </form>
    </div>
    <div class="grid-item" id="year">
      <button onclick="visibility('check_year')" class="year">Year</button>
      <form action="process-generate-playlist.php" method=" post" id="getSelectedbox">
        <table id="check_year">
          <tr>
            <td>
              <h3>Year</h3>
            </td>
          </tr>
          <tr>
            <td><input type=" number" id="year_min_checkbox" min="1900" max="2023" step="1" value="2000" size="4" />
            </td>
            <td><input type="number" id="year_max_checkbox" min="1900" max="2023" step="1" value="2000" size="4" /></td>
          </tr>
        </table>

      </form>
    </div>
    <div class="grid-item" id="album">
      <button onclick="visibility('check_album',)" class="album">Album</button>
      <form action="process-generate-playlist.php" method=" post" id="getSelectedbox">
        <table id="check_album">
          <tr>
            <td>
              <h4>Album</h4>
            </td>
          </tr>
          <tr>
            <td><select name="choose_album1" id="choose_album1">
                <option value="select">Select</option>
                <option value="album1">album1</option>
                <option value="album2">album2</option>
                <option value="album3">album3</option>
                <option value="album4">album4</option>
                <option value="album5">album5</option>
              </select></td>
          </tr>
          <tr>
            <td><select name="choose_album2" id="choose_album2">
                <option value="select">Select</option>
                <option value="album1">album1</option>
                <option value="album2">album2</option>
                <option value="album3">album3</option>
                <option value="album4">album4</option>
                <option value="album5">album5</option>
              </select></td>
          </tr>
          <tr>
            <td><select name="choose_album3" id="choose_album3">
                <option value="select">Select</option>
                <option value="album1">album1</option>
                <option value="album2">album2</option>
                <option value="album3">album3</option>
                <option value="album4">album4</option>
                <option value="album5">album5</option>
              </select></td>
          </tr>
        </table>
      </form>
    </div>
    <div class="grid-item" id="artist">
      <button onclick="visibility('check_artist')" class="artist">Artist/Band</button>
      <form action="process-generate-playlist.php"" method=" post" id="getSelectedbox">
        <table id="check_artist">
          <tr>
            <td>
              <h5>Artist/Band</h5>
            </td>
          </tr>
          <tr>
            <td><select name="choose_artist1" id="choose_artist1">
                <option value="select">Select</option>
                <option value="Taylor Swift">Taylor Swift</option>
                <option value="BTS">BTS</option>
                <option value="Eminem">Eminem</option>
                <option value="Beyonce">Beyonce</option>
                <option value="Drake">Drake</option>
              </select></td>
          </tr>
          <tr>
            <td><select name="choose_artist2" id="choose_artist2">
                <option value="select">Select</option>
                <option value="Taylor Swift">Taylor Swift</option>
                <option value="BTS">BTS</option>
                <option value="Eminem">Eminem</option>
                <option value="Beyonce">Beyonce</option>
                <option value="Drake">Drake</option>
              </select></td>
          </tr>
          <tr>
            <td><select name="choose_artist3" id="choose_artist3">
                <option value="select">Select</option>
                <option value="Taylor Swift">Taylor Swift</option>
                <option value="BTS">BTS</option>
                <option value="Eminem">Eminem</option>
                <option value="Beyonce">Beyonce</option>
                <option value="Drake">Drake</option>
              </select></td>
          </tr>
        </table>
      </form>
    </div>
    <div class="grid-item" id="language">
      <button onclick="visibility('check_language')" class="language">Language</button>
      <form action="process-generate-playlist.php" method="post" id="getSelectedbox">
        <table id="check_language">
          <tr>
            <td>
              <h6>Language</h6>
            </td>
          </tr>
          <td><select name="availablecandy" id="availablecandy">
              <option value="select">Select</option>
              <option value="English">English</option>
              <option value="Spanish">Spanish</option>
              <option value="French">French</option>
              <option value="German">German</option>
              <option value="Mandarin">Mandarin</option>
              <option value="Korean">Korean</option>
            </select></td>
          </tr>
          <td><select name="availablecandy" id="availablecandy">
              <option value="select">Select</option>
              <option value="English">English</option>
              <option value="Spanish">Spanish</option>
              <option value="French">French</option>
              <option value="German">German</option>
              <option value="Mandarin">Mandarin</option>
              <option value="Korean">Korean</option>
            </select></td>
          </tr>
          <td><select name="availablecandy" id="availablecandy">
              <option value="select">Select</option>
              <option value="English">English</option>
              <option value="Spanish">Spanish</option>
              <option value="French">French</option>
              <option value="German">German</option>
              <option value="Mandarin">Mandarin</option>
              <option value="Korean">Korean</option>
            </select></td>
          </tr>
        </table>
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



</body>

</html>
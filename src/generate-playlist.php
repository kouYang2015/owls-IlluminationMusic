<!DOCTYPE html>
<html>

<head>
  <title>Illumination Music - Generate New Playlist</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="css/theme.css" />
  <link rel="stylesheet" type="text/css" href="css/header.css" />
  <link rel="stylesheet" type="text/css" href="css/generate-playlist.css" />
</head>

<body>
  <?php include 'header.php' ?>
  <h1 align="center">New Playlist</h1>
  <form action="process-generate-playlist.php" method="post" id="getSelectedbox">
    <div class="genPlaylist-container">
      <button type="submit" class="filterbtn" value="Generate Playlist">Generate Playlist</button>
      <h3>Select filters below to generate a new playlist!</h3>
    </div>
    <div class="filterbtn-grid">
      <div class="grid-item" id="genre">
        <button type="button" onclick="visibility('genre_collapse')" class="filterbtn">Genre</button>
        <div id="genre_collapse" class="collapsable">
          <select name="genre[]">
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
          </select>
          </br>
          <select name="genre[]">
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
          </select>
          </br>
          <select name="genre[]">
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
          </select>
        </div>
      </div>
      <div class="grid-item" id="year">
        <button type="button" onclick="visibility('year_collapse')" class="filterbtn">Year</button>
        <div id="year_collapse" class="collapsable">
          <div><label for="year-min">Min Release Year</label>
            <input type="number" name="year-min" id="year-min" min="1980" max="2023" step="1" size="4" />
          </div>
          <div><label for="year-max">Max Release Year</label>
            <input type="number" name="year-max" id="year-max" min="1980" max="2023" step="1" size="4" />
          </div>
        </div>
      </div>
      <div class="grid-item" id="album">
        <button type="button" onclick="visibility('album-collapse',)" class="filterbtn">Album</button>
        <div id="album-collapse" class="collapsable">
          <select name="album[]">
            <option value="select">Select</option>
            <option value="Midnights">Midnights</option>
            <option value="Revival">Revival</option>
            <option value="The Eminem Show">The Eminem Show</option>
            <option value="Certified Lover Boy">Certified Lover Boy</option>
            <option value="Lemonade">Lemonade</option>
            <option value="Beyoncé">Beyoncé</option>
            <option value="Proof">Proof</option>
            <option value="Face Yourself">Face Yourself</option>
            <option value="Red">Red</option>
            <option value="Take Care">Take Care</option>
          </select>
          <select name="album[]">
          <option value="select">Select</option>
            <option value="Midnights">Midnights</option>
            <option value="Revival">Revival</option>
            <option value="The Eminem Show">The Eminem Show</option>
            <option value="Certified Lover Boy">Certified Lover Boy</option>
            <option value="Lemonade">Lemonade</option>
            <option value="Beyoncé">Beyoncé</option>
            <option value="Proof">Proof</option>
            <option value="Face Yourself">Face Yourself</option>
            <option value="Red">Red</option>
            <option value="Take Care">Take Care</option>
          </select>
          <select name="album[]">
          <option value="select">Select</option>
            <option value="Midnights">Midnights</option>
            <option value="Revival">Revival</option>
            <option value="The Eminem Show">The Eminem Show</option>
            <option value="Certified Lover Boy">Certified Lover Boy</option>
            <option value="Lemonade">Lemonade</option>
            <option value="Beyoncé">Beyoncé</option>
            <option value="Proof">Proof</option>
            <option value="Face Yourself">Face Yourself</option>
            <option value="Red">Red</option>
            <option value="Take Care">Take Care</option>
          </select>
        </div>
      </div>
      <div class="grid-item" id="artist">
        <button type="button" onclick="visibility('artist-collapse')" class="filterbtn">Artist/Band</button>
        <div id="artist-collapse" class="collapsable">
          <select name="artist[]">
            <option value="select">Select</option>
            <option value="Taylor Swift">Taylor Swift</option>
            <option value="BTS">BTS</option>
            <option value="Eminem">Eminem</option>
            <option value="Beyonce">Beyonce</option>
            <option value="Drake">Drake</option>
          </select>
          <select name="artist[]">
            <option value="select">Select</option>
            <option value="Taylor Swift">Taylor Swift</option>
            <option value="BTS">BTS</option>
            <option value="Eminem">Eminem</option>
            <option value="Beyonce">Beyonce</option>
            <option value="Drake">Drake</option>
          </select>
          <select name="artist[]">
            <option value="select">Select</option>
            <option value="Taylor Swift">Taylor Swift</option>
            <option value="BTS">BTS</option>
            <option value="Eminem">Eminem</option>
            <option value="Beyonce">Beyonce</option>
            <option value="Drake">Drake</option>
          </select>
        </div>
      </div>
      <div class="grid-item" id="language">
        <button type="button" onclick="visibility('language-collapse')" class="filterbtn">Language</button>
        <div id="language-collapse" class="collapsable">
          <select name="lang[]">
            <option value="select">Select</option>
            <option value="English">English</option>
            <option value="Spanish">Spanish</option>
            <option value="French">French</option>
            <option value="German">German</option>
            <option value="Mandarin">Mandarin</option>
            <option value="Korean">Korean</option>
          </select>
          <select name="lang[]">
            <option value="select">Select</option>
            <option value="English">English</option>
            <option value="Spanish">Spanish</option>
            <option value="French">French</option>
            <option value="German">German</option>
            <option value="Mandarin">Mandarin</option>
            <option value="Korean">Korean</option>
          </select>
          <select name="lang[]">
            <option value="select">Select</option>
            <option value="English">English</option>
            <option value="Spanish">Spanish</option>
            <option value="French">French</option>
            <option value="German">German</option>
            <option value="Mandarin">Mandarin</option>
            <option value="Korean">Korean</option>
          </select>
        </div>
      </div>
    </div>
  </form>
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
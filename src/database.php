<?php
include 'song.php';
include 'playlist_class.php';
function insertNewUser($username, $first_name, $last_name, $newEmail, $user_password)
{
    //@$db = mysqli_connect("localhost", "ics325fa2226", "9427", "ics325fa2226"); // Use when using metrostate server
    @$db = mysqli_connect("localhost", "root", "", "illumination_local"); //Use when working offline and locally
    if (mysqli_connect_errno()) {
        echo "<p>Error: Could not register user.<br/>
          Please try again later.</p>";
        exit;
    }
    $query = "INSERT INTO users(username, first_name, last_name, user_email, user_password)
    VALUES(?, ?, ?, ?, ?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param('sssss', $username, $first_name, $last_name, $newEmail, $user_password);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo 'Username: ' . $username . '<br>';
        echo 'First name: ' . $first_name . '<br>';
        echo 'Last name: ' . $last_name . '<br>';
        echo 'Email: ' . $newEmail . '<br>';
    } else {
        echo "<p>An error has occurred.<br/>
           Could not sign up.</p>";
    }

    $db->close();
}

function updatePassword($usernameToSearchFor, $newPassword)
{
    //@$db = mysqli_connect("localhost", "ics325fa2226", "9427", "ics325fa2226"); // Use when using metrostate server
    @$db = mysqli_connect("localhost", "root", "", "illumination_local"); //Use when working offline and locally
    if (mysqli_connect_errno()) {
        return false;
        exit;
    }
    $query = "UPDATE users SET user_password = ? WHERE username = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('ss', $newPassword, $usernameToSearchFor);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        $stmt->free_result();
        $db->close();
        return true;
    } else {
        $stmt->free_result();
        $db->close();
        return false;
    }
}

function updateEmail($usernameToSearchFor, $newEmail)
{
    //@$db = mysqli_connect("localhost", "ics325fa2226", "9427", "ics325fa2226"); // Use when using metrostate server
    @$db = mysqli_connect("localhost", "root", "", "illumination_local"); //Use when working offline and locally
    if (mysqli_connect_errno()) {
        return false;
        exit;
    }
    $query = "UPDATE users SET user_email = ? WHERE username = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('ss', $newEmail, $usernameToSearchFor);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $stmt->free_result();
        $db->close();
        return true;
    } else {
        $stmt->free_result();
        $db->close();
        return false;
    }
}

function updateProfileImg($username, $imgfilepath)
{
    //@$db = mysqli_connect("localhost", "ics325fa2226", "9427", "ics325fa2226"); // Use when using metrostate server
    $db = new mysqli("localhost", "root", "", "illumination_local");
    if (mysqli_connect_errno()) {
        return false;
        exit;
    }
    $query = "UPDATE user_profile_images, users SET profile_image_filename = ? WHERE (username = ?) ";
    $stmt = $db->prepare($query);
    $stmt->bind_param('ss', $imgfilepath, $username);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $stmt->free_result();
        $db->close();
        return true;
    } else {
        $stmt->free_result();
        $db->close();
        return false;
    }
}

function validateUsernameEmail($login_user)
{
    //@$db = mysqli_connect("localhost", "ics325fa2226", "9427", "ics325fa2226"); // Use when using metrostate server
    $db = new mysqli("localhost", "root", "", "illumination_local");
    if (mysqli_connect_errno()) {
        return false;
        exit;
    }
    $login_user2 = $login_user;
    $query = "SELECT username, user_email FROM users WHERE (username = ?) OR (user_email = ?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param('ss', $login_user, $login_user2);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($fetched_username, $fetched_useremail);

    while ($stmt->fetch()) {
        if ($fetched_username == $login_user || $fetched_useremail == $login_user) {
            $stmt->free_result();
            $db->close();
            return true;
        }
    }
    $stmt->free_result();
    $db->close();
    return false;
}

function validateUsernamePassword($username, $password)
{
    //@$db = mysqli_connect("localhost", "ics325fa2226", "9427", "ics325fa2226"); // Use when using metrostate server
    $db = new mysqli("localhost", "root", "", "illumination_local");
    if (mysqli_connect_errno()) {
        return false;
        exit;
    }

    $query = "SELECT user_password FROM users WHERE (username = ?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($user_password);
    while ($stmt->fetch()) {
        if ($user_password == $password) {
            $stmt->free_result();
            $db->close();
            return true;
        }
    }
    $stmt->free_result();
    $db->close();
    return false;
}

function validateEmailPassword($email, $password)
{
    //@$db = mysqli_connect("localhost", "ics325fa2226", "9427", "ics325fa2226"); // Use when using metrostate server
    $db = new mysqli("localhost", "root", "", "illumination_local");
    if (mysqli_connect_errno()) {
        return false;
        exit;
    }

    $query = "SELECT user_password FROM users WHERE (user_email = ?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($user_password);
    while ($stmt->fetch()) {
        if ($user_password == $password) {
            $stmt->free_result();
            $db->close();
            return true;
        }
    }
    $stmt->free_result();
    $db->close();
    return false;
}

function retrieveProfileImg($username)
{
    //@$db = mysqli_connect("localhost", "ics325fa2226", "9427", "ics325fa2226"); // Use when using metrostate server
    $db = new mysqli("localhost", "root", "", "illumination_local");
    if (mysqli_connect_errno()) {
        return null;
    } else {
        $query = "SELECT profile_image_filename FROM user_profile_images 
        right join users on user_profile_images.user_id = users.user_id WHERE (username = ?) ";
        $stmt = $db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $userimagename = $result->fetch_row();
        $stmt->free_result();
        $db->close();
        if (is_array($userimagename) && $userimagename[0] != null) {
            return $userimagename[0];
        } else {
            return null;
        }
    }
}

function retrievePlaylists($username)
{
    //@$db = mysqli_connect("localhost", "ics325fa2226", "9427", "ics325fa2226"); // Use when using metrostate server
    $db = new mysqli("localhost", "root", "", "illumination_local");
    if (mysqli_connect_errno()) {
        return null;
        exit;
    }
    $query = "SELECT playlists.playlist_id, playlists.playlist_name, playlist_images.playlist_image_filename
    FROM playlists
    INNER JOIN playlist_images ON playlists.playlist_id = playlist_images.playlist_id
    INNER JOIN users ON users.user_id = playlists.user_id
    WHERE username = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($fetched_playlist_id, $fetched_playlist_name, $fetched_imgfilename);

    $playlists = array();
    while ($stmt->fetch()) {
        $playlist_object = new Playlist($fetched_playlist_id, $fetched_playlist_name, $fetched_imgfilename);
        array_push($playlists, $playlist_object);
    }
    $stmt->free_result();
    $db->close();
    return $playlists;
}

function retrieveSongsGenre($genre)
{
    //@$db = mysqli_connect("localhost", "ics325fa2226", "9427", "ics325fa2226"); // Use when using metrostate server
    $db = new mysqli("localhost", "root", "", "illumination_local");
    if (mysqli_connect_errno()) {
        return null;
        exit;
    }
    $query =
        "SELECT
        songs.song_id,
        title,
        albums.album_name,
        artists.artist_name
    FROM
        songs
    INNER JOIN albums ON albums.album_id = songs.album_id
    INNER JOIN song_has_artist ON song_has_artist.song_id = songs.song_id
    INNER JOIN artists ON artists.artist_id = song_has_artist.artist_id
    INNER JOIN song_has_genre ON song_has_genre.song_id = songs.song_id
    INNER JOIN genres ON song_has_genre.genre_id = genres.genre_id
    WHERE
        genres.genre_name = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('s', $genre);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($song_id, $song_title, $song_album, $song_artist);

    $retrieved_songs = array();
    while ($stmt->fetch()) {
        $song = new Song($song_id, $song_title, $song_album, $song_artist);
        array_push($retrieved_songs, $song);
    }
    $stmt->free_result();
    $db->close();
    return $retrieved_songs;
}

function retrieveSongsAlbum($album)
{
    //@$db = mysqli_connect("localhost", "ics325fa2226", "9427", "ics325fa2226"); // Use when using metrostate server
    $db = new mysqli("localhost", "root", "", "illumination_local");
    if (mysqli_connect_errno()) {
        return null;
        exit;
    }
    $query =
        "SELECT
        songs.song_id,
        title,
        albums.album_name,
        artists.artist_name
    FROM
        songs
    INNER JOIN albums ON albums.album_id = songs.album_id
    INNER JOIN song_has_artist ON song_has_artist.song_id = songs.song_id
    INNER JOIN artists ON artists.artist_id = song_has_artist.artist_id
    WHERE
        albums.album_name = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('s', $album);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($song_id, $song_title, $song_album, $song_artist);

    $retrieved_songs = array();
    while ($stmt->fetch()) {
        $song = new Song($song_id, $song_title, $song_album, $song_artist);
        array_push($retrieved_songs, $song);
    }
    $stmt->free_result();
    $db->close();
    return $retrieved_songs;
}

function retrieveSongsArtist($artist)
{
    //@$db = mysqli_connect("localhost", "ics325fa2226", "9427", "ics325fa2226"); // Use when using metrostate server
    $db = new mysqli("localhost", "root", "", "illumination_local");
    if (mysqli_connect_errno()) {
        return null;
        exit;
    }
    $query =
        "SELECT
            songs.song_id,
            title,
            albums.album_name,
            artists.artist_name
        FROM
            songs
        INNER JOIN albums ON albums.album_id = songs.album_id
        INNER JOIN song_has_artist ON song_has_artist.song_id = songs.song_id
        INNER JOIN artists ON artists.artist_id = song_has_artist.artist_id
        WHERE
            artists.artist_name = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('s', $artist);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($song_id, $song_title, $song_album, $song_artist);

    $retrieved_songs = array();
    while ($stmt->fetch()) {
        $song = new Song($song_id, $song_title, $song_album, $song_artist);
        array_push($retrieved_songs, $song);
    }
    $stmt->free_result();
    $db->close();
    return $retrieved_songs;
}

function retrieveSongsLang($lang)
{
    //@$db = mysqli_connect("localhost", "ics325fa2226", "9427", "ics325fa2226"); // Use when using metrostate server
    $db = new mysqli("localhost", "root", "", "illumination_local");
    if (mysqli_connect_errno()) {
        return null;
        exit;
    }
    $query =
        "SELECT
        songs.song_id,
        title,
        albums.album_name,
        artists.artist_name
    FROM
        songs
    INNER JOIN albums ON albums.album_id = songs.album_id
    INNER JOIN song_has_artist ON song_has_artist.song_id = songs.song_id
    INNER JOIN artists ON artists.artist_id = song_has_artist.artist_id
    INNER JOIN languages ON languages.language_id = songs.language_id
    WHERE
        languages.language_name = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('s', $lang);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($song_id, $song_title, $song_album, $song_artist);

    $retrieved_songs = array();
    while ($stmt->fetch()) {
        $song = new Song($song_id, $song_title, $song_album, $song_artist);
        array_push($retrieved_songs, $song);
    }
    $stmt->free_result();
    $db->close();
    return $retrieved_songs;
}

function retrieveSongsYear($year_max, $year_min)
{
    //@$db = mysqli_connect("localhost", "ics325fa2226", "9427", "ics325fa2226"); // Use when using metrostate server
    $db = new mysqli("localhost", "root", "", "illumination_local");
    if (mysqli_connect_errno()) {
        return null;
        exit;
    }
    $query =
        "SELECT
            songs.song_id,
            title,
            albums.album_name,
            artists.artist_name
        FROM
            songs
        INNER JOIN albums ON albums.album_id = songs.album_id
        INNER JOIN song_has_artist ON song_has_artist.song_id = songs.song_id
        INNER JOIN artists ON artists.artist_id = song_has_artist.artist_id
        WHERE
            songs.release_year BETWEEN ? AND ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('ss', $year_min, $year_max);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($song_id, $song_title, $song_album, $song_artist);

    $retrieved_songs = array();
    while ($stmt->fetch()) {
        $song = new Song($song_id, $song_title, $song_album, $song_artist);
        array_push($retrieved_songs, $song);
    }
    $stmt->free_result();
    $db->close();
    return $retrieved_songs;
}

function insertNewPlaylist($username ,$playlist_to_save) {
    //@$db = mysqli_connect("localhost", "ics325fa2226", "9427", "ics325fa2226"); // Use when using metrostate server
    $userId = retrieveUserId($username);
    $playlist_name = "New Playlist";
    @$db = mysqli_connect("localhost", "root", "", "illumination_local"); //Use when working offline and locally
    if (mysqli_connect_errno()) {
        echo "<p>Error: Could not register user.<br/>
          Please try again later.</p>";
        exit;
    }
    //Add default image to playlist
    $query = "INSERT INTO playlists(user_id, playlist_name) VALUES(?, ?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param('ss', $userId, $playlist_name);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        // do nothing;
    } else {
        echo "<p>An error has occurred.<br/>
           Could not sign up.</p>";
    }
    //Add default image to playlist
    $new_playlistId = (int) $db->insert_id;
    $query = "INSERT INTO playlist_images(playlist_id) VALUES(?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param('s', $new_playlistId);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        // do nothing;
    } else {
        echo "<p>An error has occurred.<br/>
           Could not sign up.</p>";
    }
    $added_song = false;
    foreach ($playlist_to_save as $song){
        $songId = $song->getID();
        $query = "INSERT INTO playlist_has_song(playlist_id, song_id) VALUES(?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param('ss', $new_playlistId, $songId);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $added_song = true;
        } else {
            echo "<p>An error has occurred.<br/>
            Could not sign up.</p>";
        }
    }
    $stmt->free_result();
    $db->close();
    return $added_song;
}
function updatePlaylist($playist_id, $playlist_to_save){
    echo 'IN progress';
}
function retrieveUserId ($username){
     //@$db = mysqli_connect("localhost", "ics325fa2226", "9427", "ics325fa2226"); // Use when using metrostate server
     @$db = mysqli_connect("localhost", "root", "", "illumination_local"); //Use when working offline and locally
     if (mysqli_connect_errno()) {
         echo "<p>Error: Could not register user.<br/>
           Please try again later.</p>";
         exit;
     }
     $query = "SELECT user_id FROM users WHERE username = ?";
     $stmt = $db->prepare($query);
     $stmt->bind_param('s', $username);
     $stmt->execute();
     $stmt->store_result();
 
     $stmt->bind_result($user_id);
     $stmt->fetch();
     $stmt->free_result();
     $db->close();
     return $user_id;
}
function retrievePlaylistObject($playlist_id){
    //@$db = mysqli_connect("localhost", "ics325fa2226", "9427", "ics325fa2226"); // Use when using metrostate server
    $db = new mysqli("localhost", "root", "", "illumination_local");
    if (mysqli_connect_errno()) {
        return null;
        exit;
    }
    $query = "SELECT playlists.playlist_id, playlists.playlist_name, playlist_images.playlist_image_filename
    FROM playlists
    INNER JOIN playlist_images ON playlists.playlist_id = playlist_images.playlist_id
    WHERE playlists.playlist_id = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('i', $playlist_id);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($fetched_playlist_id, $fetched_playlist_name, $fetched_imgfilename);
    while ($stmt->fetch()) {
        $playlist_object = new Playlist($fetched_playlist_id, $fetched_playlist_name, $fetched_imgfilename);
    }
    $stmt->free_result();
    $db->close();
    return $playlist_object;
}
function retreivePlaylist($playlist_id) {
    //@$db = mysqli_connect("localhost", "ics325fa2226", "9427", "ics325fa2226"); // Use when using metrostate server
    $db = new mysqli("localhost", "root", "", "illumination_local");
    if (mysqli_connect_errno()) {
        return null;
        exit;
    }
    $query =
    "SELECT
        songs.song_id,
        songs.title,
        albums.album_name,
        artists.artist_name
    FROM
        `playlist_has_song`
    INNER JOIN songs ON songs.song_id = playlist_has_song.song_id
    INNER JOIN albums ON albums.album_id = songs.album_id
    INNER JOIN song_has_artist ON song_has_artist.song_id = songs.song_id
    INNER JOIN artists ON artists.artist_id = song_has_artist.artist_id
    WHERE
        playlist_id = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('s', $playlist_id);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($song_id, $song_title, $song_album, $song_artist);

    $retrieved_songs = array();
    while ($stmt->fetch()) {
        $song = new Song($song_id, $song_title, $song_album, $song_artist);
        array_push($retrieved_songs, $song);
    }
    $stmt->free_result();
    $db->close();
    return $retrieved_songs;
}

function retrieveEmail($username){
    //@$db = new mysqli("localhost", "ics325fa2226", "9427", "ics325fa2226"); // Use when using metrostate server
    $db = new mysqli("localhost", "root", "", "illumination_local");
    if (mysqli_connect_errno()) {
        echo '<p>Error: Could not connect to database. Please try again later.</p>';
        exit;
    }
    $user_email = "";
    $query = "SELECT user_email FROM users WHERE (username = ?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();

    $stmt->bind_result($user_email);
    $stmt->fetch();
    $stmt->free_result();
    $db->close();
    return $user_email;
}
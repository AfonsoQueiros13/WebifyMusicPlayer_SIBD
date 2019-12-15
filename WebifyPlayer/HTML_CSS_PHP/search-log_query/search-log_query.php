<!DOCTYPE html>
<html lang="en-US">

<head>
  <title>Webify</title>
  <link rel="icon" type="image/gif/png" href="../../images/logo.png">
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="layout.css">
  <link rel="stylesheet" href="responsive.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>


<body>
  <!-- TOP BAR -->
  <!-- should contain login and register html pages? -->
  <header>

      <img src="../../images/logo.png" alt="logo">
      <h1>Webify</h1>
      <?php $id = $_GET['id'];
            $pngphoto= "../../profile_pictures/profilephoto_user".$id.".png";
            $jpgphoto= "../../profile_pictures/profilephoto_user".$id.".jpg";
            if (file_exists($pngphoto)) {
                ?> <img src=<?=$pngphoto?> alt="Profile Photo" height="42" width="42">
            <?}?>
            <?if (file_exists($jpgphoto)) {
                ?> <img src=<?=$jpgphoto?> alt="Profile Photo" height="42" width="42">
            <?}?>
            <?if (!file_exists($pngphoto) && !file_exists($jpgphoto)) {
                ?> <img src=<?="../../images/profile.png"?> alt="Profile Photo" height="42" width="42">
                <form action="../php_actions/action_upload.php?id=<?=$id?>" method="post" enctype="multipart/form-data">
                    Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit"  name="submit">
                </form> 
            <?}?>
      <div id="signup">
        <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        require_once('../../config/init.php');
        require_once('../../tools/db_queries_user.php');
        $id = $_GET['id'];
        $nickname = selectUserNickfromID($id);
        echo($nickname[0]['nick_name']);?> 
      </div>

  </header>

  <div id="sidebar-clone">
      <div id="sidebar">
        <ul>
          <li><i class="fa fa-home"></i><a href="../loggedin/loggedin.php?id=<?=$_GET['id']?>">Home</a></li>
          <li><i class="fa fa-search"></i><a href="../search-log/search-log.php?id=<?=$_GET['id']?>">Search</a></li>
          <li><i class="fa fa-music"></i><a href="../mysongs/mysongs.php?id=<?=$_GET['id']?>">My Songs</a></li>
          <li><i class="fa fa-archive"></i><a href="../playlists/playlists.php?id=<?=$_GET['id']?>">Playlists</a></li>
          <li><i class="fa fa-folder"></i><a href="../playlists/playlists.php?id=<?=$_GET['id']?>">My Albums</a></li>
          <li><i class="fa fa-power-off"></i><a href="../home/home.php?id=<?=$_GET['id']?>">Logout </a></li>
        </ul>
      </div>
    </div>

  <!-- page content -->
  <!-- include textbox for searching songs, artists, playlists(?),.. -->
  <!-- should also include sidebar -->

  <form action="search-log_query.php?id=<?=$_GET['id']?>" method="post">
    <input type="text" name="searchquery" placeholder="Type anything . . .">
    <input type="submit" value="Search">
  </form>

  <div id="initialtext">

    <h2>Artists</h2>
    <div id="artists">
      <?php
      /*DISPLAY ERRORS*/
      ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);

      /*REQUIRES TO RUN CORRECTY PHP SCRIPT*/
      require_once('../../config/init.php');
      require_once('../../tools/db_queries_search.php');
      require_once('../../tools/db_queries_album.php');

      $search = $_POST['searchquery'];
      $all_artists = searchForArtist($search);

      $count = 0;
      foreach ($all_artists as $artist) {
        $artist = $all_artists[$count]['name'];
        $ID = get_id_by_name($artist);
        ?>
        <li>
          <a href="../selected_artist-guestmode/selected_artist.php?id=<?= $ID['id'] ?>">
            <div>
              <?= $artist ?>
            </div>
          </a>
        </li>


      <?php
        $count++;
      }
      ?>
    </div>


    <h3>Albums</h3>
    <div id="albums">
      <?php
      /*DISPLAY ERRORS*/
      ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);

      /*REQUIRES TO RUN CORRECTY PHP SCRIPT*/
      require_once('../../config/init.php');
      require_once('../../tools/db_queries_search.php');
      require_once('../../tools/db_queries_album.php');

      $search = $_POST['searchquery'];

      $all_albums = searchForAlbum($search);
      $path = get_album_image($search);

      $count = 0;
      foreach ($all_albums as $album) {

        //$album = get_album_by_id($all_albums[$count++]['nome_album']);
        $album = $all_albums[$count]['nome_album'];
        ?>

        <li>
          <a href="../artist-guest/artist-guest.php?id=<?= $album['id'] ?>">
            <img src="<?= $path[$count]['img_path'] ?>" alt="artistcover">
            <div>
              <?= $album ?>
            </div>
          </a>
        </li>


      <?php
        $count++;
      }
      ?>
    </div>




    <h4>Songs</h4>
    <div id="songs">
      <?php
      /*DISPLAY ERRORS*/
      ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);

      /*REQUIRES TO RUN CORRECTY PHP SCRIPT*/
      require_once('../../config/init.php');
      require_once('../../tools/db_queries_search.php');
      require_once('../../tools/db_queries_album.php');

      $search = $_POST['searchquery'];

      $all_musics = searchForMusic($search);


      $count = 0;
      foreach ($all_musics as $music) {

        //$album = get_album_by_id($all_albums[$count++]['nome_album']);
        $music = $all_musics[$count]['name_music'];
        ?>

        <li>
          <a href="../artist-guest/artist-guest.php?id=<?= $music['id'] ?>">

            <div>
              <?= $music ?>
            </div>
          </a>
        </li>


      <?php
        $count++;
      }
      ?>
    </div>

    <h4>Genres</h4>
    <div id="genres">
      <?php
      /*DISPLAY ERRORS*/
      ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);

      /*REQUIRES TO RUN CORRECTY PHP SCRIPT*/
      require_once('../../config/init.php');
      require_once('../../tools/db_queries_search.php');
      require_once('../../tools/db_queries_album.php');

      $search = $_POST['searchquery'];

      $allgenre = searchForGenre($search);


      $count = 0;
      foreach ($allgenre as $genre) {

        //$album = get_album_by_id($all_albums[$count++]['nome_album']);
        $genre = $allgenre[$count]['gen_name'];
        ?>

        <li>
          <a href="../artist-guest/artist-guest.php?id=<?= $genre['id'] ?>">

            <div>
              <?= $genre ?>
            </div>
          </a>
        </li>


      <?php
        $count++;
      }
      ?>
    </div>

  </div>





</body>

</html>

</div>





</body>

</html> 
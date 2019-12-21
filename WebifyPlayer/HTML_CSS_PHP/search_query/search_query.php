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
    <div id="signup">
      <a href="../register/register.php">Register</a>
      <a href="../login/login.php">Login </a>
    </div>
  </header>

  <div id="sidebar-clone">
    <div id="sidebar">
      <ul>
        <li><i class="fa fa-home"></i><a href="../home/home.php">Home</a></li>
        <li><i class="fa fa-search"></i><a href="../search/search.php">Search</a></li>
      </ul>
    </div>
  </div>

  <!-- page content -->
  <!-- include textbox for searching songs, artists, playlists(?),.. -->
  <!-- should also include sidebar -->

  <form action="search_query.php" method="post">
    <input type="text" name="searchquery" placeholder="Type anything . . .">
    <input type="submit" value="Search">
  </form>

  <div id="initialtext">

    <h2>Artists</h2>
    <div id="artists">
      <?phpphp
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
      foreach ($all_artists as $artist) :
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


      <?phpphp
        $count++;
        endforeach; ?>
    </div>


    <h3>Albums</h3>
    <div id="albums">
      <?phpphp
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


      $count = 0;
      $count2=0;
      foreach ($all_albums as $album) :
        $path = get_album_image($album['nome_album']);
        //$album = get_album_by_id($all_albums[$count++]['nome_album']);
        $album = $all_albums[$count++]['nome_album'];
        $link= getalbumid_by_albumname($album);
        ?>

        <li>
          <a href="../artist-guest/artist-guest.php?id=<?=$link['id'] ?>">
            <img src="<?=$path[$count2]['img_path']?>" alt="artistcover">
            <div>
              <?= $album ?>
            </div>
          </a>
        </li>


      <?phpphp endforeach; ?>

    </div>




    <h4>Songs</h4>
    <div id="songs">
      <?phpphp
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
      foreach ($all_musics as $music) :

        //$album = get_album_by_id($all_albums[$count++]['nome_album']);
        $music = $all_musics[$count]['name_music'];
        ?>

        <li>
            <div>
              <?= $music ?>
            </div>
          </a>
        </li>


      <?phpphp
        $count++;
        endforeach; ?>

    </div>

    <h4>Genres</h4>
    <div id="genres">
      <?phpphp
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
      foreach ($allgenre as $genre) :

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


      <?phpphp
      endforeach; ?>


    </div>

  </div>





</body>

</html>

</div>





</body>

</html>
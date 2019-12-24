<!DOCTYPE html>
<html lang="en-US">

<head>
  <title>Webify</title>
  <script src= 
"https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"> 
  </script> 
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

  <form action="../search_query/search_query.php" method="POST">
    <input type="text"  id = "searchquery" name="searchquery" placeholder="Type anything . . ." onkeyup='saveValue(this);' />
    <input type="submit" value="Search"/>
  </form>

  

<script type="text/javascript">
        document.getElementById("searchquery").value = getSavedValue("searchquery");    // set the value to this input
        /* Here you can add more inputs to set value. if it's saved */

        //Save the value function - save it to localStorage as (ID, VALUE)
        function saveValue(e){
            var id = e.id;  // get the sender's id to save it . 
            var val = e.value; // get the value. 
            localStorage.setItem(id, val);// Every time user writing something, the localStorage's value will override . 
        }

        //get the saved value function - return the value of "v" from localStorage. 
        function getSavedValue  (v){
            if (!localStorage.getItem(v)) {
                return "";// You can change this to your defualt value. 
            }
            return localStorage.getItem(v);
        }
</script>

<script>
    $("#searchquery").on( 
          "propertychange change keyup paste input", function() { 
          window.location = "../search_query/search_query.php"
        }); 
</script>

  <div id="initialtext">

    <h2>Search for anything</h2>
    <h3>artists, albums, songs, genres,...</h3>
  </div>

<script>
var query = document.getElementById("searchquery").value;
if (query.length != 0){

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


  <?php
    $count++;
    endforeach; ?>
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


  <?php endforeach; ?>

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


  <?php
    $count++;
    endforeach; ?>

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


  <?php
  endforeach; ?>


</div>

</div>
}
</script>

</body>

</html>

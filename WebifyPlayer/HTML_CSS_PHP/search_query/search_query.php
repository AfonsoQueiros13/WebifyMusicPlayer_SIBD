<?php
session_start();

include('../header.php');
include('../iconmenu.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/*REQUIRES TO RUN CORRECTY PHP SCRIPT*/
require_once('../../config/init.php');
require_once('../../tools/db_queries_search.php');
require_once('../../tools/db_queries_album.php');

/* Max results per page */
$max_results = 10;
$countertotal = 0;
$page = $_GET['page'];
$value= $_GET['value'];
if ($value == 0) {
    $search = $_POST['searchquery'];
}
else{
    $search = $_GET['searchquery'];
}
$currentpage = $_GET['page'];

if($currentpage == 1){
  $count1 = 0;
  $count2 = 0;
  $count3 = 0;
  $count4 = 0;
}
else {
  $count1 = $_GET['count1'];
  $count2 = $_GET['count2'];
  $count3 = $_GET['count3'];
  $count4 = $_GET['count4'];
}

$counter_album = 0;
$counter_artist = 0;
$counter_musics = 0;
$counter_genre = 0;


$all_artists = searchForArtist($search);
$counter=0;
foreach ($all_artists as $artist) {
$counter_artist++;
}

// $search = $_POST['searchquery'];
$all_albums = searchForAlbum($search);
foreach ($all_albums as $album) {
  $counter_album++;
}

// $search = $_POST['searchquery'];
$all_musics = searchForMusic($search);
foreach ($all_musics as $music) {
  $counter_musics++;
}

// $search = $_POST['searchquery'];
$allgenre = searchForGenre($search);
foreach ($allgenre as $genre) {
  $counter_genre++;
}
$counter = $counter_genre + $counter_musics + $counter_album + $counter_artist;

 ?>


  <!-- page content -->
  <!-- include textbox for searching songs, artists, playlists(?),.. -->
  <!-- should also include sidebar -->

<div id="search">
  <form action="../search_query/search_query.php?page=1&value=0" method="POST">
    <input type="text" name="searchquery" placeholder="Type anything . . .">
    <input type="submit" value="Search">
  </form>
</div>

  <div id="initialtext">

    <h2>Artists</h2>
    <div id="artists">
      <ul>
        <?php
        if($currentpage == 1)
          $count1 = 0;

        foreach ($all_artists as $artist) {
           if($countertotal < $max_results){
          if($count1 < $counter_artist ){
          $artist = $all_artists[$count1]['name'];
          $ID = get_id_by_name($artist);
          ?>
          <li>
            <a href="../selected_artist-guestmode/selected_artist.php?id=<?=$ID['id'] ?>">
              <div>
                <?= $artist ?>
              </div>
            </a>
          </li>


        <?php
          $count1++;
          $countertotal++;
        }
        ?>
        <?php } ?>
        <?php } ?>
      </ul>

    </div>

    <h3>Albums</h3>
    <div id="albums">
      <ul>


        <?php
        if($currentpage == 1)
          $count2 = 0;
        /*DISPLAY ERRORS*/
        $count_aux=0;

        foreach ($all_albums as $album) {
          if($countertotal < $max_results){
          if($count2 < $counter_album ){
          $path = get_album_image($album['nome_album']);
          //$album = get_album_by_id($all_albums[$count++]['nome_album']);
          $album = $all_albums[$count2++]['nome_album'];
          $link= getalbumid_by_albumname($album);
          $countertotal++;
          ?>

          <li>
            <a href="../artist-guest/artist-guest.php?id=<?=$link['id'] ?>">
              <img src="<?=$path[$count_aux]['img_path']?>" alt="artistcover">
              <div>
                <?= $album ?>
              </div>
            </a>
          </li>
        <?php
        }
        ?>
         <?php
        }
        ?>
        <?php
        }
        ?>
      </ul>
    </div>




    <h4>Songs</h4>
    <div id="songs">
      <?php
      if($currentpage == 1)
        $count3 = 0;
      /*DISPLAY ERRORS*/

      foreach ($all_musics as $music) {
        if($countertotal < $max_results){
        if($count3 < $counter_musics){
        //$album = get_album_by_id($all_albums[$count++]['nome_album']);
        $music = $all_musics[$count3]['name_music'];
        ?>
        <ul>
          <li>
              <div>
                <?= $music ?>
              </div>

          </li>
        </ul>


        <?php
        }
        else {
        $count3=0;
        break;
        }


      ?>
      <?php
      $count3++;
      $countertotal++;
      }

      ?>
      <?php

        }
      ?>
    </div>


    <h4>Genres</h4>
    <div id="genres">
      <?php
      if($currentpage == 1)
        $count4 = 0;
      foreach ($allgenre as $genre) {
        if($countertotal < $max_results){
        if($count4 < $counter_genre){
        //$album = get_album_by_id($all_albums[$count++]['nome_album']);
        $genre = $allgenre[$count4]['gen_name'];
        ?>

        <ul>
          <li>
            <a href="../artist-guest/artist-guest.php?id=<?= $genre ?>">

              <div>
                <?= $genre ?>
              </div>
            </a>
          </li>
        </ul>



      <?php
        $count4++;
      }

      ?>
      <?php

      $countertotal++;
      }
      ?>
      <?php

      }
      ?>
    </div>
    <br>
<?php include('../pagination.php'); ?>
  </div>





<?php include('../footer.php'); ?>

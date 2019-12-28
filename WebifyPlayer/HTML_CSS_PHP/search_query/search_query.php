<?php
session_start();

include('../header.php');
include('../iconmenu.php');
include('../footer.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/*REQUIRES TO RUN CORRECTY PHP SCRIPT*/
require_once('../../config/init.php');
require_once('../../tools/db_queries_search.php');
require_once('../../tools/db_queries_album.php');

$search = $_POST['searchquery'];
$all_artists = searchForArtist($search);

// $search = $_POST['searchquery'];
$all_albums = searchForAlbum($search);

// $search = $_POST['searchquery'];
$all_musics = searchForMusic($search);


// $search = $_POST['searchquery'];
$allgenre = searchForGenre($search);

 ?>


  <!-- page content -->
  <!-- include textbox for searching songs, artists, playlists(?),.. -->
  <!-- should also include sidebar -->

<div id="search">
  <form action="search_query.php" method="post">
    <input type="text" name="searchquery" placeholder="Type anything . . .">
    <input type="submit" value="Search">
  </form>
</div>


  <div id="initialtext">

    <h2>Artists</h2>
    <div id="artists">
      <ul>
        <?php
        $countertotal=0;
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
          $countertotal++;
        }
        ?>
      </ul>

    </div>


    <h3>Albums</h3>
    <div id="albums">
      <ul>


        <?php
        /*DISPLAY ERRORS*/

        $count = 0;
        $count2=0;
        foreach ($all_albums as $album) {
          $path = get_album_image($album['nome_album']);
          //$album = get_album_by_id($all_albums[$count++]['nome_album']);
          $album = $all_albums[$count++]['nome_album'];
          $link= getalbumid_by_albumname($album);
          $countertotal++;
          ?>

          <li>
            <a href="../artist-guest/artist-guest.php?id=<?=$link['id'] ?>">
              <img src="<?=$path[$count2]['img_path']?>" alt="artistcover">
              <div>
                <?= $album ?>
              </div>
            </a>
          </li>


        <?php
        }
        ?>
      </ul>
    </div>




    <h4>Songs</h4>
    <div id="songs">
      <?php
      /*DISPLAY ERRORS*/

      $count = 0;
      foreach ($all_musics as $music) {

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
        $countertotal++;
      }
      ?>
    </div>

    <h4>Genres</h4>
    <div id="genres">
      <?php

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
        $countertotal++;
      }
      ?>
    </div>

  </div>

<?php

session_start();

include('../header.php');
include('../iconmenu.php');




 ?>
    <div id="content">

      <div id="main">

        <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        require_once('../../config/init.php');
        require_once('../../tools/db_queries_album.php');
        require_once('../../tools/db_queries_search.php');
        require_once('../../tools/db_queries_artists.php');

        $ID=$_GET['id'];
        $albums=searchForAlbums_by_artist_id($ID);
        $info=get_artist_name_by_id($ID);
        $artist = get_artist_by_id($ID);

         ?>

        <div id="artist">
          <h2> <?=$info['name'] ?> </h2>
          <img src="<?= $artist['img_path_artist'] ?>" alt="artistcover">
        </div>


            <?php
            $count=0;
            foreach ($albums as $album_single) {
              $result=$album_single['nome_album'];
              $img=get_album_image($result);
            ?>
            <h3>Album</h3>
                <img src="<?=$img[$count]['img_path']?>" alt="cover photo">
              <ul>  <li> <?=$album_single['nome_album'] ?> </li>  </ul>


        <?php $songs=searchForMusic($album_single['nome_album']); ?>

        <h4>Songs</h4>
        <ul>
          <?php  foreach ($songs as $song_name) { ?>
              <li> <?= $song_name['name_music'] ?> </li>
          <?php } ?>
        </ul>

          <?php
          }
          ?>

      </div>
    </div>


<?php include('../footer.php'); ?>

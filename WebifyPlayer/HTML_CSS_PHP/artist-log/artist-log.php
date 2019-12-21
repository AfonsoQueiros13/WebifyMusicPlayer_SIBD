<?php
session_start();
include('../header.php');
include('../iconmenu.php');
include('../footer.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../../config/init.php');
require_once('../../tools/db_queries_album.php');

require_once('../../tools/db_queries_music.php');

$id_user = $_GET['id_user'];
$id_album = $_GET ['id_album'];
$result = verifyMyAlbums($id_user, $id_album);



 ?>

  <!-- page content -->

  <div id="content">

    <div id="coverart">

      <img src="<?= $album['img_path'] ?>" alt="artist_img">

      <?php
          if ($result == 0){
          ?>
          <form action="../php_actions/action_myalbums.php?id_album=<?=$id_album?>&id_user=<?=$id_user?>" id="form" method="post">
            <input type="submit" value="Add to MyAlbums">
          </form>
          <? } ?>

          <?
          $result = verifyMyAlbums($id_user, $id_album);
          if ($result == 1){
          ?> <a> Album added in MyAlbums </a>
          <? } ?>
      <div>
        <?= $info['name'] ?>
      </div>
    </div>

    <ul>

      <? foreach ($songs as $song_name) { ?>
        <li> <?= $song_name['name_music'] ?> </li>

        <audio controls>
          <source src="../../music/drake/scorpion/Jaded.mp3" type="audio/ogg">
        </audio>
        <?php

          $id_user = $_GET['id_user'];
          $id_album = $_GET['id_album'];
          $id_music = $song_name['id'];

          $result = verifyMySongs($id_user, $id_music);


          if ($result == 0)
          {
          ?><form action="../php_actions/action_mysongs.php?id_album=<?=$id_album?>&id_user=<?=$id_user?>&id_music=<?=$song_name['id']?>" id="form" method="post">
          <input type="submit" value="Add to MySongs">
          </form>
          <? } ?>
          <?
          $result = verifyMySongs($id_user, $id_music);
          if ($result == 1){
          ?> <a> Music added in MySongs </a>
          <? } ?>
        <? } ?>

    </ul>

  </div>


</body>

</html>

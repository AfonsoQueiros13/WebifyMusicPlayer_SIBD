<?php
  session_start();
  include('../header.php');
  include('../iconmenu.php');


  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  require_once('../../config/init.php');
  require_once('../../tools/db_queries_album.php');

 ?>

 <?php
    if(isset($_SESSION['log'])==false){
  ?>

  <div id="content">

    <div id="coverart">
      <?php


      $ID = $_GET['id'];

      $album = get_album_by_id($ID);
      $songs = get_songs_in_album($album['nome_album'], $ID);
      $info = get_album_and_artist_info($ID);
      ?>
      <img src="<?= $album['img_path'] ?>" alt="artist_img">
      <div> <a href="../selected_artist-guestmode/selected_artist.php?id=<?= $album['id_artist'] ?>"> <?= $info['name'] ?> </a> </div>
    </div>

    <div id="songs">
      <ul>

        <?php foreach ($songs as $song_name) { ?>
          <li> <div><?= $song_name['name_music'] ?></div>
          <audio controls>
            <source src="../../music/drake/scorpion/Jaded.mp3" type="audio/ogg">
          </audio>
        <?php } ?>
          </li>
      </ul>
    </div>

  </div>

<?php } ?>




<?php if(isset($_SESSION['log'])==true){
  require_once('../../config/init.php');
  require_once('../../tools/db_queries_album.php');

  require_once('../../tools/db_queries_music.php');

  $id_user = $_SESSION['id'];
  $id_album = $_GET ['id'];
  $result = verifyMyAlbums($id_user, $id_album);
  $album = get_album_by_id($id_album);
  $songs = get_songs_in_album($album['nome_album'], $id_album);
  $info = get_album_and_artist_info($id_album);

  ?>

  <div id="content">

    <div id="coverart">

      <img src="<?= $album['img_path'] ?>" alt="artist_img">
      <?php
          if ($result == 0){?>
            <form action="../php_actions/action_myalbums.php?id_album=<?=$id_album?>&id_user=<?=$id_user?>" id="form" method="post">
              <input type="submit" value="Add to MyAlbums">
            </form>

        <?php } ?>

        <?php if($result == 1){ ?>
          <div id="added">
            <a> Album added in MyAlbums </a>
          </div>


        <?php } ?>

        <div>
          <a href="../selected_artist-guestmode/selected_artist.php?id=<?= $album['id_artist'] ?>"> <?= $info['name'] ?> </a>
        </div>
    </div>

    <ul>
      <?php foreach ($songs as $song_name): ?>

            <li> <div><?= $song_name['name_music'] ?></div>

            <audio controls>
              <source src="../../music/drake/scorpion/Jaded.mp3" type="audio/ogg">
            </audio>
            <?php
              ini_set('display_errors', 1);
              ini_set('display_startup_errors', 1);
              error_reporting(E_ALL);
              require_once('../../config/init.php');
              require_once('../../tools/db_queries_music.php');
              $id_user = $_SESSION['id'];
              $id_album = $_GET['id'];
              $id_music = $song_name['id'];
              $result = verifyMySongs($id_user, $id_music);
              if ($result == 0){
                ?><form action="../php_actions/action_mysongs.php?id_album=<?=$id_album?>&id_user=<?=$id_user?>&id_music=<?=$song_name['id']?>" method="post">
                  <div>
                    <input type="submit" value="Add to MySongs">
                  </div>
                </form>
            <?php } ?>
              <?php
              $result = verifyMySongs($id_user, $id_music);
              if ($result == 1):
              ?> <br> <a> Music added in MySongs </a>
              <?php endif; ?>
      <?php endforeach; ?>
            </li>
    </ul>

  </div>

<?php } ?>

<?php   include('../footer.php'); ?>

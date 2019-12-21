<?php
  session_start();

  include('../header.php');
  include('../iconmenu.php');
  include('../footer.php');

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
          <li> <?= $song_name['name_music'] ?> </li>
          <audio controls>
            <source src="../../music/drake/scorpion/Jaded.mp3" type="audio/ogg">
          </audio>
        <?php } ?>

      </ul>
    </div>

  </div>

<?php } ?>




<?php if(isset($_SESSION['log'])==true){} ?>

<?php
session_start();
include('../header.php');
include('../iconmenu.php');



ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



require_once('../../config/init.php');
require_once('../../tools/db_queries_album.php');

$id = $_SESSION['id'];
 ?>



  <div id="continue">
    <h2>My Albums</h2>
    <ul>
      <?php


      #$searchmusic = $_POST['searchquery'];

      $allalbums = selectMyAlbums($id);


      $count = 0;
      foreach ($allalbums as $album) {

        $album = $allalbums[$count]['id_album'];
        $name_album = get_album_by_id($album);

        ?>

        <li>
          <div>
            <?= $name_album['nome_album']; ?>
          </div>
        <a href="../artist-guest/artist-guest.php?id=<?=$album?>"></a>
          <?php $result = verifyMyAlbums($id, $album); ?>
                <?php  if ($result == 1) { ?>
                    <form action="../php_actions/action_removemyalbums.php?id_user=<?=$id ?>&id_album=<?=$album ?>" method="post">
                    <input type="submit" value="Remove from My Albums">
                  </form>
                <?php } ?>

        </li>


      <?php
        $count++;
      }
      ?>

    </ul>
  </div>

  <?php include('../footer.php'); ?>

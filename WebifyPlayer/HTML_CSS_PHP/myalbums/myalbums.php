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

$id = $_SESSION['id'];
 ?>



  <div id="cont">
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
        <a href="../artist-guest/artist-guest.php?id=<?=$album?>">
          <? $result = verifyMyAlbums($id, $album);
                  if ($result == 1) {
                    ?><form action="../php_actions/action_removemyalbums.php?id_user=<?=$id ?>&id_album=<?=$album ?>" id="form2" method="post">
                    <input type="submit" value="Remove from My Albums">
                  </form>
                    <?// echo //= $album ?>
                <? } ?>
            <div>
              <?= $name_album['nome_album']; ?>
            </div>
          </a>
        </li>


      <?php
        $count++;
      }
      ?>

    </ul>
  </div>

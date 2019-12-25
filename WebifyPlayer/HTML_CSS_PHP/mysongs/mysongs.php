<?php

include('../header.php');
include('../iconmenu.php');
include('../footer.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

 ?>

    <div id="cont">
      <h2>My Songs</h2>
      <ul>
        <?php
        /*DISPLAY ERRORS*/


        /*REQUIRES TO RUN CORRECTY PHP SCRIPT*/
        require_once('../../config/init.php');
        require_once('../../tools/db_queries_music.php');


        #$searchmusic = $_POST['searchquery'];
        $id = $_SESSION['id'];
        $allmusics = selectMySongs($id);

        $count = 0;
        foreach ($allmusics as $music) {
          ?>

          <li>
            <div>
              <? $musicids = selectMusicIDbyName($music['name_music']); ?>
              <?php $musicID = $musicids[0]['id']; ?>
              <a><?= $musicID ?>
                <? $result = verifyMySongs($id, $musicID);
                  if ($result == 1) {
                    ?><form action="../php_actions/action_removemysongs.php?id_user=<?= $id ?>&id_music=<?= $musicID ?>" id="form2" method="post">
                    <input type="submit" value="Remove from My Songs">
                    <? echo $music['name_music']; ?>
                  </form>
                <? } ?>


        <?php
          }
        ?>
            </div>
            </a>
          </li>
      </ul>
    </div>

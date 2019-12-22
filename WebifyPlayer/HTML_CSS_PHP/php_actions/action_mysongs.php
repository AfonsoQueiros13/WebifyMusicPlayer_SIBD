<?php
  /*DISPLAY ERRORS*/
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  /*REQUIRES TO RUN CORRECTY PHP SCRIPT*/
  require_once('../../config/init.php');
  require_once('../../tools/db_queries_music.php');

  $id_user= $_GET['id_user'];
  $id_music = $_GET['id_music'];
  $id_album = $_GET['id_album'];
  try {
    insertMySong($id_user,$id_music,$id_album); //RETURNS FOR $user_data db information for this user

      } 
      catch(Exception $e) {
        echo 'Exception -> ';
        var_dump($e->getMessage());
    }

?>
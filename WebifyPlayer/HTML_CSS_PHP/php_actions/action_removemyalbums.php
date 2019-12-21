
<?phpphp
  /*DISPLAY ERRORS*/
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  /*REQUIRES TO RUN CORRECTY PHP SCRIPT*/
  require_once('../../config/init.php');
  require_once('../../tools/db_queries_album.php');

  $id_user= $_GET['id_user'];
  $id_album = $_GET['id_album'];
  try {
    deleteMyAlbums($id_album,$id_user); //RETURNS FOR $user_data db information for this user
    header('Location: ../myalbums/myalbums.php?&id='.$id_user);

      } 
      catch(Exception $e) {
        echo 'Exception -> ';
        var_dump($e->getMessage());
    }

?>
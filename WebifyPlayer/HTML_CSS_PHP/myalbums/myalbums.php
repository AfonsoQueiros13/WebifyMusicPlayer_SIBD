<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en-US">

<head>
  <title> Webify </title>
  <link rel="icon" type="image/gif/png" href="../../images/logo.png">
  <meta charset="UTF-8">
  <link href="style.css" rel=stylesheet>
  <link href="layout.css" rel=stylesheet>
  <link href="responsive.css" rel=stylesheet>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <header>
    <img src="../../images/logo.png" alt="logo">
    <h1>Webify</h1>
    <?php $id = $_GET['id'];
            $pngphoto= "../../profile_pictures/profilephoto_user".$id.".png";
            $jpgphoto= "../../profile_pictures/profilephoto_user".$id.".jpg";
            if (file_exists($pngphoto)) {
                ?> <img src=<?=$pngphoto?> alt="Profile Photo" height="42" width="42">
            <?php }?>
            <?php if (file_exists($jpgphoto)) {
                ?> <img src=<?=$jpgphoto?> alt="Profile Photo" height="42" width="42">
            <?php }?>
            <?php if (!file_exists($pngphoto) && !file_exists($jpgphoto)) {
                ?> <img src=<?="../../images/profile.png"?> alt="Profile Photo" height="42" width="42">
                <form action="../php_actions/action_upload.php?id=<?=$id?>" method="post" enctype="multipart/form-data">
                    Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit"  name="submit">
                </form> 
            <?php }?>
    <div id="signup">
      <?php
      ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      require_once('../../config/init.php');
      require_once('../../tools/db_queries_user.php');
      $id = $_GET['id'];
      $nickname = selectUserNickfromID($id);
      echo ($nickname[0]['nick_name']); ?>
    </div>
  </header>
  <?php $id = $_GET['id']; ?>
  <div id="sidebar-clone">
    <div id="iconmenu">
      <ul>
        <li><i class="fa fa-home"></i><a href="../loggedin/loggedin.php?id=<?=$id?>">Home</a></li>
        <li><i class="fa fa-search"></i><a href="../search-log/search-log.php?id=<?=$id?>">Search</a></li>
        <li><i class="fa fa-music"></i><a href="../mysongs/mysongs.php?id=<?=$id?>">My Songs</a></li>
        <li><i class="fa fa-folder"></i><a href="../myalbums/myalbums.php?id=<?=$id?>">My Albums</a></li>
        <li><i class="fa fa-power-off"></i><a href="../home/home.php">Logout </a></li>
      </ul>
    </div>
  </div>
=======
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
>>>>>>> REFORMAT



  <div id="cont">
    <h2>My Albums</h2>
    <ul>
      <?php


      #$searchmusic = $_POST['searchquery'];

      $allalbums = selectMyAlbums($id);


      $count = 0;
<<<<<<< HEAD
      foreach ($allalbums as $album) :
        
        $album = $allalbums[$count];
=======
      foreach ($allalbums as $album) {

        $album = $allalbums[$count]['id_album'];
>>>>>>> REFORMAT
        $name_album = get_album_by_id($album);

        ?>

        <li>
<<<<<<< HEAD
        <a href="../artist-log/artist-log.php?id_album=<?=$album['id_album']?>&id_user=<?=$id?>">
          <?php $result = verifyMyAlbums($id, $album);
                  if ($result == 1) :
                    ?><form action="../php_actions/action_removemyalbums.php?id_user=<?=$id ?>&id_album=<?=$album ?>" id="form2" method="post">
                    <input type="submit" value="Remove from My Albums">
                    <?php echo $name_album; ?>
=======
        <a href="../artist-guest/artist-guest.php?id=<?=$album?>">
          <? $result = verifyMyAlbums($id, $album);
                  if ($result == 1) {
                    ?><form action="../php_actions/action_removemyalbums.php?id_user=<?=$id ?>&id_album=<?=$album ?>" id="form2" method="post">
                    <input type="submit" value="Remove from My Albums">
>>>>>>> REFORMAT
                  </form>
                  <?php endif; ?>
            <div>
              <?= $name_album['nome_album']; ?>
            </div>
          </a>
        </li>


      <?php
        $count++;
        endforeach; ?>

    </ul>
  </div>

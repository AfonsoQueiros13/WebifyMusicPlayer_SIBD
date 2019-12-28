<?php
session_start();

include('../header.php');
include('../iconmenu.php');
include('../footer.php');

<<<<<<< HEAD
<body>
  <header>
    <img src="../../images/logo.png" alt="logo">
    <h1>Webify</h1>
    <?php $id = $_GET['id'];
            $pngphoto= "../../profile_pictures/profilephoto_user".$id.".png";
            $jpgphoto= "../../profile_pictures/profilephoto_user".$id.".jpg";
            if (file_exists($pngphoto)) {
                ?> <img src=<?=$pngphoto?> alt="Profile Photo" height="42" width="42">
            <?php } ?>
            <?php if (file_exists($jpgphoto)) {
                ?> <img src=<?=$jpgphoto?> alt="Profile Photo" height="42" width="42">
            <?php } ?>
            <?php if (!file_exists($pngphoto) && !file_exists($jpgphoto)) {
                ?> <img src=<?="../../images/profile.png"?> alt="Profile Photo" height="42" width="42">
            <?php } ?>
    <div id="signup">
      <?php
      ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      require_once('../../config/init.php');
      require_once('../../tools/db_queries_user.php');
      $id = $_GET['id'];
      $nickname = selectUserNickfromID($id);
      echo($nickname[0]['nick_name']);?>
  </header>

  <div id="sidebar-clone">
    <div id="iconmenu">
      <ul>
        <li><i class="fa fa-home"></i><a href="../loggedin/loggedin.php?id=<?=$_GET['id']?>">Home</a></li>
        <li><i class="fa fa-search"></i><a href="../search-log/search-log.php?id=<?=$_GET['id']?>">Search</a></li>
        <li><i class="fa fa-music"></i><a href="../mysongs/mysongs.php?id=<?=$_GET['id']?>"> My Songs</a> </li>
        <li><i class="fa fa-archive"></i><a href="../playlists/playlists.php?id=<?=$_GET['id']?>"> My Playlists</a></li>
        <li><i class="fa fa-folder"></i><a href="../myalbums/myalbums.php?id=<?= $id ?>">My Albums</a></li>
        <li><i class="fa fa-power-off"></i><a href="../home/home.php">Logout </a></li>
      </ul>
    </div>
  </div>
=======
$id=$_SESSION['id'];

>>>>>>> REFORMAT

 ?>
  <div id="rest">
<<<<<<< HEAD
    <h1><?php echo($nickname[0]['nick_name'])?></h1>
    <form action="../php_actions/action_upload.php?id=<?=$id?>" method="post" enctype="multipart/form-data">
                    Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit"  name="submit">
                </form> 
=======
    <h1><?echo($_SESSION['username'])?></h1>

    <h2> Change Profile Picture of User :  <?php echo($_SESSION['username'])?> </h2>
      <form action="../php_actions/action_upload.php" method="post" enctype="multipart/form-data">
                    Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit"  name="submit">
      </form>
>>>>>>> REFORMAT
  </div>

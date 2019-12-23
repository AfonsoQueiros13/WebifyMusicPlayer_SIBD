<!DOCTYPE html>
<html lang="en-US">

<head>
  <title> Webify </title>
  <link rel="icon" type="image/gif, image/png" href="../../images/logo.png">
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
      echo($nickname[0]);?>
  </header>

  <div id="sidebar-clone">
    <div id="iconmenu">
      <ul>
        <li><i class="fa fa-home"></i><a href="../loggedin/loggedin.php?id=<?=$_GET['id']?>">Home</a></li>
        <li><i class="fa fa-search"></i><a href="../search-log/search-log.php?id=<?=$_GET['id']?>">Search</a></li>
        <li><i class="fa fa-music"></i><a href="../mysongs/mysongs.php?id=<?=$_GET['id']?>"> My Songs</a> </li>
        <li><i class="fa fa-archive"></i><a href="../playlists/playlists.php?id=<?=$_GET['id']?>"> My Playlists</a></li>
        <li><i class="fa fa-power-off"></i><a href="../home/home.php">Logout </a></li>
      </ul>
    </div>
  </div>

  <div id="rest">
    <h1><?php echo($nickname[0])?></h1>
    <form action="../php_actions/action_upload.php?id=<?=$id?>" method="post" enctype="multipart/form-data">
                    Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit"  name="submit">
                </form> 
  </div>

</body>

</html>

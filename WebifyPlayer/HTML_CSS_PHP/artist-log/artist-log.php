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
  <!-- TOP BAR -->
  <header>

    <img src="../../images/logo.png" alt="logo">
    <h1>Webify</h1>
    <?php $id = $_GET['id_user'];
            $pngphoto= "../../profile_pictures/profilephoto_user".$id.".png";
            $jpgphoto= "../../profile_pictures/profilephoto_user".$id.".jpg";
            if (file_exists($pngphoto))?> 
            <img src=<?=$pngphoto?> alt="Profile Photo" height="42" width="42">
            <?php if (file_exists($jpgphoto))?> 
            <img src=<?=$jpgphoto?> alt="Profile Photo" height="42" width="42">
            <?php if (!file_exists($pngphoto) && !file_exists($jpgphoto)):?> 
            <img src=<?="../../images/profile.png"?> alt="Profile Photo" height="42" width="42">
                <form action="../php_actions/action_upload.php?id=<?=$id?>" method="post" enctype="multipart/form-data">
                    Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit"  name="submit">
                </form> 
            <?php endif;?>
    <div id="signup">
      <?php
      ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);
      require_once('../../config/init.php');
      require_once('../../tools/db_queries_user.php');
      $id = $_GET['id_user'];
      $nickname = selectUserNickfromID($id);
      echo ($nickname[0]['nick_name']); ?>
    </div>

  </header>

  <!-- page content -->

  <div id="sidebar-clone">
    <div id="iconmenu">
      <ul>
        <li><i class="fa fa-home"></i><a href="../loggedin/loggedin.php?id=<?=$_GET['id_user']?>">Home</a></li>
        <li><i class="fa fa-search"></i><a href="../search-log/search-log.php?id=<?=$_GET['id_user']?>">Search</a></li>
        <li><i class="fa fa-music"></i><a href="../mysongs/mysongs.php?id=<?=$_GET['id_user']?>"> My Songs</a></li>
        <li><i class="fa fa-archive"></i><a href="../playlists/playlists.php?id=<?=$_GET['id_user']?>">Playlists</a></li>
        <li><i class="fa fa-folder"></i><a href="../myalbums/myalbums.php?id=<?=$_GET['id_user']?>">My Albums</a></li>
        <li><i class="fa fa-power-off"></i><a href="../home/home.php">Logout</a></li>
      </ul>
    </div>
  </div>


  <div id="content">

    <div id="coverart">
      <?php
      ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);
      require_once('../../config/init.php');
      require_once('../../tools/db_queries_album.php');
      require_once('../../tools/db_queries_user.php');

      $id_user = $_GET['id_user'];
      $id_album = $_GET ['id_album'];
      $nickname = selectUserNickfromID($id_user);
      $album = get_album_by_id($id_album);
      $songs = get_songs_in_album($album['nome_album'], $id_album);
      $info = get_album_and_artist_info($id_album);
      ?>
      <img src="<?= $album['img_path'] ?>" alt="artist_img">
      <?php
          ini_set('display_errors', 1);
          ini_set('display_startup_errors', 1);
          require_once('../../config/init.php');
          require_once('../../tools/db_queries_album.php');
          $id_user = $_GET['id_user'];
          $id_album = $_GET ['id_album'];
          $result = verifyMyAlbums($id_user, $id_album);
          if ($result == 0):
          ?><form action="../php_actions/action_myalbums.php?id_album=<?=$id_album?>&id_user=<?=$id_user?>" id="form" method="post">
          <input type="submit" value="Add to MyAlbums">
          </form>
          <?php endif; ?>
          <?php $result = verifyMyAlbums($id_user, $id_album);
          if ($result == 1):
          ?> <a> Album added in MyAlbums </a>
          <?php endif; ?>
      <div> <?= $info['name'] ?> </div>
    </div>

    <ul>

      <?php foreach ($songs as $song_name): ?>
            <li> <?= $song_name['name_music'] ?> </li>

            <audio controls>
              <source src="../../music/drake/scorpion/Jaded.mp3" type="audio/ogg">
            </audio>
            <?php
              ini_set('display_errors', 1);
              ini_set('display_startup_errors', 1);
              error_reporting(E_ALL);
              require_once('../../config/init.php');
              require_once('../../tools/db_queries_music.php');
              $id_user = $_GET['id_user'];
              $id_album = $_GET['id_album'];
              $id_music = $song_name['id'];
              $result = verifyMySongs($id_user, $id_music);
              if ($result == 0):
              ?><form action="../php_actions/action_mysongs.php?id_album=<?=$id_album?>&id_user=<?=$id_user?>&id_music=<?=$song_name['id']?>" id="form" method="post">
              <input type="submit" value="Add to MySongs">
              </form>
              <?php endif; ?>
              <?php
              $result = verifyMySongs($id_user, $id_music);
              if ($result == 1):
              ?> <a> Music added in MySongs </a>
              <?php endif; ?>
      <?php endforeach; ?>


    </ul>

  </div>


</body>

</html>

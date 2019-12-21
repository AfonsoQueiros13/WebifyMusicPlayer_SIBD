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
        <div id="signup">
          <a href="../register/register.php">Register</a>
          <a href="../login/login.php">Login </a>
        </div>

    </header>

    <div id="sidebar-clone">
      <div id="iconmenu">
        <ul>
          <li><i class="fa fa-home"></i><a href="../home/home.php">Home</a></li>
          <li><i class="fa fa-search"></i><a href="../search/search.php">Search</a></li>
        </ul>
      </div>
    </div>

    <div id="content">

      <div id="main">

        <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        require_once('../../config/init.php');
        require_once('../../tools/db_queries_album.php');
        require_once('../../tools/db_queries_search.php');
        require_once('../../tools/db_queries_artists.php');

        $ID=$_GET['id'];
        $albums=searchForAlbums_by_artist_id($ID);
        $info=get_artist_name_by_id($ID);
        $artist = get_artist_by_id($ID);

         ?>

        <div id="artist">
          <h2> <?=$info['name'] ?> </h2>
          <img src="<?= $artist['img_path_artist'] ?>" alt="artistcover">
        </div>

          <ul>
            <?php
            $count=0;
            foreach ($albums as $album_single) :
              $result=$album_single['nome_album'];
              $img=get_album_image($result);
            ?>
            <h3>Album</h3>
                <img src="<?=$img[$count]['img_path']?>" alt="cover photo">
                <li> <?=$album_single['nome_album'] ?> </li>
          </ul>

        <?php $songs=searchForMusic($album_single['nome_album']); ?>

        <h4>Songs</h4>
        <ul>
          <?php  foreach ($songs as $song_name) { ?>
              <li> <?= $song_name['name_music'] ?> </li>
          <?php } ?>
        </ul>

          <?php
          endforeach;
          ?>

      </div>
    </div>




  </body>

</html>

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
    <div id="signup">
      <a href="../register/register.php">Register</a>
      <a href="../login/login.php">Login </a>
    </div>

  </header>

  <!-- page content -->

  <div id="sidebar-clone">
    <div id="iconmenu">
      <ul>
        <li><i class="fa fa-home"></i><a href="../home/home.php">Home</a></li>
        <li><i class="fa fa-search"></i><a href="../search/search.php">Search</a></li>
      </ul>
    </div>
  </div>


  <div id="content">

    <div id="coverart">
      <?php
      ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      require_once('../../config/init.php');
      require_once('../../tools/db_queries_album.php');

      $ID = $_GET['id'];

      $album = get_album_by_id($ID);
      $songs = get_songs_in_album($album['nome_album'], $ID);
      $info = get_album_and_artist_info($ID);
      ?>
      <img src="<?= $album['img_path'] ?>" alt="artist_img">
      <div> <a href="../selected_artist-guestmode/selected_artist.php?id=<?= $album['id_artist'] ?>"> <?= $info['name'] ?> </a> </div>
    </div>

    <ul>

      <?php foreach ($songs as $song_name) { ?>
        <li> <?= $song_name['name_music'] ?> </li>
        <audio controls>
          <source src="../../music/drake/scorpion/Jaded.mp3" type="audio/ogg">
        </audio>
      <?php } ?>

    </ul>

  </div>


</body>

</html>

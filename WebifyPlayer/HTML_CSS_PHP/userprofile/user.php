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
    <div id="signup">
      <?php
      ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      require_once('../../config/init.php');
      require_once('../../tools/db_queries_user.php');
      $id = $_GET['id'];
      $nickname = selectUserNickfromID($id);
      echo($nickname[0]['nick_name']);?>
    </div>
    <div id="img">
      <img src="../../images/user/default.jpg" alt="default_photo">
    </div>
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
    <h1><?echo($nickname[0]['nick_name'])?></h1>

    <h2> Change Profile Picture
      <form action="../php_actions/action_profile.php">
        <input type="file" name="myFile" accept="image/jpeg"><br><br>
        <input type="submit" value="Choose Photo"> </h2>
      </form>
  </div>

</body>

</html>

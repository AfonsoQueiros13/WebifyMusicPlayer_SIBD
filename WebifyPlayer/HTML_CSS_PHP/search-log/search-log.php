<!DOCTYPE html>
<html lang="en-US">

  <head>
    <title>Webify</title>
    <link rel="icon" type="image/gif/png" href="../../images/logo.png">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="layout.css">
    <link rel="stylesheet" href="responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>


  <body>
    <!-- TOP BAR -->
    <!-- should contain login and register html pages? -->
    <header>
      <img src="../../images/logo.png" alt="logo">
      <h1>Webify</h1>
      <?php $id = $_GET['id'];
            $pngphoto= "../../profile_pictures/profilephoto_user".$id.".png";
            $jpgphoto= "../../profile_pictures/profilephoto_user".$id.".jpg";
            if (file_exists($pngphoto)) :
                ?> <img src=<?=$pngphoto?> alt="Profile Photo" height="42" width="42">
            <?php endif;?>
            <?php if (file_exists($jpgphoto)) :
                ?> <img src=<?=$jpgphoto?> alt="Profile Photo" height="42" width="42">
            <?php endif;?>
            <?php if (!file_exists($pngphoto) && !file_exists($jpgphoto)) :
                ?> <img src=<?="../../images/profile.png"?> alt="Profile Photo" height="42" width="42">
            <?php endif;?>
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
    </header>

    <div id="sidebar-clone">
      <div id="sidebar">
        <ul>
          <!-- <li><a href="../loggedin/loggedin.html">Home</a></li>
          <li><a href="../search-log/search-log.html">Search</a></li>
          <li><a href="../mysongs/mysongs.html">My Songs</a></li>
          <li><a href="../playlists/playlists.html">Playlists</a></li>
          <li><a href="../home/home.html">Logout </a></li> -->

          <li><i class="fa fa-home"></i><a href="../loggedin/loggedin.php?id=<?=$_GET['id']?>">Home</a></li>
          <li><i class="fa fa-search"></i><a href="../search-log/search-log.php?id=<?=$_GET['id']?>">Search</a></li>
          <li><i class="fa fa-music"></i><a href="../mysongs/mysongs.php?id=<?=$_GET['id']?>">My Songs</a></li>
          <li><i class="fa fa-archive"></i><a href="../playlists/playlists.php?id=<?=$_GET['id']?>">Playlists</a></li>
          <li><i class="fa fa-folder"></i><a href="../playlists/playlists.php?id=<?=$_GET['id']?>">My Albums</a></li>
          <li><i class="fa fa-power-off"></i><a href="../home/home.php?id=<?=$_GET['id']?>">Logout </a></li>
        </ul>
      </div>
    </div>


    <!-- page content -->
    <!-- include textbox for searching songs, artists, playlists(?),.. -->
    <!-- should also include sidebar -->
           
    <form action="../search-log_query/search-log_query.php?id=<?=$_GET['id']?>" method="post">
    <input type="text" id= "searchquery" name="searchquery" placeholder="Type anything . . .">
    <input type="submit" value="Search">
    </form>

    <div id="initialtext">

      <h2>Search for anything</h2>
      <h3>artists, albums, songs,genres,...</h3>
    </div>


  </body>
</html>

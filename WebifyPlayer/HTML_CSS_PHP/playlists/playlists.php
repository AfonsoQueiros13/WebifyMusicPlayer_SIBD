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
          Profile Name
        </div>
    </header>

    <div id="sidebar-clone">
      <div id="iconmenu">
        <ul>
          <li><i class="fa fa-home"></i><a href="../loggedin/loggedin.php">Home</a></li>
          <li><i class="fa fa-search"></i><a href="../search-log/search-log.php">Search</a></li>
          <li><i class="fa fa-music"></i><a href="../mysongs/mysongs.php">My Songs</a></li>
          <li><i class="fa fa-archive"></i><a href="../playlists/playlists.php">Playlists</a></li>
          <li><i class="fa fa-power-off"></i><a href="../home/home.php">Logout </a></li>
        </ul>
      </div>
    </div>

    <div id="cont">
      <div id="mp">
        <h2>My Playlists</h2>
        <ul>
          <li>Playlist 1</li>
          <li>Create Playlist</li>
        </ul>
      </div>

      <div id="fp">
        <h2>Followed Playlists</h2>
        <ul>
          <li>Follow 1</li>
          <li>Follow 2</li>
        </ul>
      </div>
    </div>
  </body>
</html>

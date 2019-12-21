

<?php
session_start();
include('../header.php');


if(isset($_SESSION['log'])==false){
 ?>

<div id="iconmenu-clone">
    <div id="iconmenu">
        <ul>
            <li><i class="fa fa-home"></i><a href="../HOMEPAGE/homepage.php">Home</a></li>
            <li><i class="fa fa-search"></i><a href="../search/search.php">Search</a></li>
        </ul>
    </div>
</div>


<?php } ?>



<?php if(isset($_SESSION['log'])==true){ ?>
  <div id="iconmenu-clone">
      <div id="iconmenu">
          <ul>
              <li><i class="fa fa-home"></i><a href="../HOMEPAGE/homepage.php">Home</a></li>
              <li><i class="fa fa-search"></i><a href="../search/search.php">Search</a></li>
              <li><i class="fa fa-music"></i><a href="../mysongs/mysongs.php?id=<?= $_GET['id'] ?>"> My Songs</a> </li>
              <li><i class="fa fa-archive"></i><a href="../playlists/playlists.php?id=<?= $_GET['id'] ?>"> My Playlists</a></li>
              <li><i class="fa fa-folder"></i><a href="../myalbums/myalbums.php?id=<?= $id ?>">My Albums</a></li>
              <li><i class="fa fa-power-off"></i><a href="../php_actions/action_logout.php">Logout </a></li>
          </ul>
      </div>
  </div>
<?php } ?>

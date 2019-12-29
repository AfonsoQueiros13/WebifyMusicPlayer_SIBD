<?php
  session_start();

  include('../header.php');
  include('../iconmenu.php');


 ?>


  <!-- page content -->
  <!-- include textbox for searching songs, artists, playlists(?),.. -->
  <!-- should also include sidebar -->

<div id="search">
  <form action="../search_query/search_query.php?page=1&value=0" method="POST">
    <input type="text" name="searchquery" placeholder="Type anything . . .">
    <input type="submit" value="Search">
  </form>
</div>


  <div id="initialtext-search">

    <h2>Search for anything</h2>
    <h3>artists, albums, songs, genres,...</h3>
  </div>


  <?php   include('../footer.php'); ?>

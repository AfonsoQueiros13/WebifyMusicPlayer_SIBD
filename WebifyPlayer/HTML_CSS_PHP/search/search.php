<?php
  session_start();

  include('../header.php');
  include('../iconmenu.php');
  include('../footer.php');

 ?>


  <!-- page content -->
  <!-- include textbox for searching songs, artists, playlists(?),.. -->
  <!-- should also include sidebar -->

<div id="search">
  <form action="../search_query/search_query.php" method="POST">
    <input type="text" name="searchquery" placeholder="Type anything . . ." onkeyup='saveValue(this);'>
    <input type="submit" value="Search">
  </form>
</div>


<<<<<<< HEAD
  <div id="initialtext">
=======
  <div id="initialtext-search">
>>>>>>> REFORMAT

    <h2>Search for anything</h2>
    <h3>artists, albums, songs, genres,...</h3>
  </div>

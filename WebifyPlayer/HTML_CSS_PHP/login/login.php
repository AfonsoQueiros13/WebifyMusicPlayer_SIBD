<?php
session_start();

include('../header.php');
include('../iconmenu.php');
include('../footer.php');
 ?>

    <!-- <div id="signin"> -->
    <div id="login">
      <form action="../php_actions/action_login.php" method="post">
          <input type="text" name="email" placeholder="email"> <br>
          <input type="password" name="password" placeholder="password"> <br>
          <input type="submit" value="Log in">
      </form>
    </div>

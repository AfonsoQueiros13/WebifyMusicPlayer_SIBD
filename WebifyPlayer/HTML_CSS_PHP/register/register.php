<?php
session_start();

include('../header.php');
include('../iconmenu.php');
include('../footer.php');

 ?>

    <!-- page content -->
    <!-- should have register form, sidebar to return to home and search,... -->
    <div id="register">
      <form action="../php_actions/action_register.php" method="POST">
          <input type="text" name="email" placeholder="e-mail"><br>
          <input type="text" name="nick" placeholder="nickname"> <br>
          <input type="text" name="password" placeholder="password"> <br>
          <input type="submit" value="Register to Webify">
      </form>
    </div>

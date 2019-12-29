<?php
session_start();

include('../header.php');
include('../iconmenu.php');

$test=$_SESSION['value'];


 ?>

    <!-- page content -->
    <!-- should have register form, sidebar to return to home and search,... -->
    <div id="register">
      <form action="../php_actions/action_register.php" method="POST">
          <input type="text" name="email" placeholder="e-mail" value="<?php echo $_SESSION['value'] ?>"><br>
          <input type="text" name="nick" placeholder="nickname" value="<?php echo $_SESSION['nick'] ?>" > <br>
          <input type="password" name="password" placeholder="password"> <br>
          <input type="submit" value="Register to Webify">
      </form>
    </div>


    <?php include('../footer.php'); ?>

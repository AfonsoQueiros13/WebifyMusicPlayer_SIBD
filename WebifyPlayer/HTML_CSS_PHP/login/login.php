<?php
session_start();

include('../header.php');
include('../iconmenu.php');

 ?>

    <!-- <div id="signin"> -->
    <div id="login">
      <form action="../php_actions/action_login.php" method="post">
          <input type="text" name="email" placeholder="email" value="<?php echo $_SESSION['value']?>"> <br>
          <input type="password" name="password" placeholder="password"> <br>
          <input type="submit" value="Log in">
      </form>
    </div>

<?php include('../footer.php'); ?>

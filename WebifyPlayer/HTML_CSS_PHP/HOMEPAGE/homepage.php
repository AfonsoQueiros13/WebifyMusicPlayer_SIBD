<?php
  session_start();

  $_SESSION['log'];
  $_SESSION['value']=NULL;
  $_SESSION['nick']=NULL;

  include('../header.php');
  include('../iconmenu.php');
  include('../list_content.php');
  include('../footer.php');

 ?>

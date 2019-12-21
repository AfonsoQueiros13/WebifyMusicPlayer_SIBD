<?php
session_start();
unset($_SESSION['log']);
unset($_SESSION['nick_name']);
unset($_SESSION['id']);
session_destroy();
header('Location: ../HOMEPAGE/homepage.php');
exit;
 ?>

<?php
session_start();
unset($_SESSION['log']);
unset($_SESSION['username']);
unset($_SESSION['id']);
unset($_SESSION['email']);
session_destroy();
header('Location: ../HOMEPAGE/homepage.php');
exit;
 ?>

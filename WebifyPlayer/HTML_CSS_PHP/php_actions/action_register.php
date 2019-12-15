<?php
  /*DISPLAY ERRORS*/
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  /*REQUIRES TO RUN CORRECTY PHP SCRIPT*/
  require_once('../../config/init.php');
  require_once('../../tools/db_queries_user.php');
  $email = $_POST['email'];
  $nick = $_POST['nick'];
  $password = $_POST['password'];
  try {
    insertUser($email, $nick, $password);
    header('Location: ../home/home.php');
  } catch(Exception $e) {
    echo 'Exception -> ';
    var_dump($e->getMessage());
}

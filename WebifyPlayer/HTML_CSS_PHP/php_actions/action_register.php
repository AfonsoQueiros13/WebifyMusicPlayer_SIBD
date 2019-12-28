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

  if($email == null){
    echo ("<script>alert('please insert an email');setTimeout(\"location.href = '../register/register.php';\",100);</script>");
    return;
  }

  if($nick == null ){
    echo ("<script>alert('please insert a valid nickname!');setTimeout(\"location.href = '../register/register.php';\",100);</script>");
    return;
  }

  if($password == null){
    echo ("<script>alert('please type a password');setTimeout(\"location.href = '../register/register.php';\",100);</script>");
    
  }

  try {
    insertUser($email, $nick, $password);
  } catch(Exception $e) {
    echo 'Exception -> ';
    var_dump($e->getMessage());
}

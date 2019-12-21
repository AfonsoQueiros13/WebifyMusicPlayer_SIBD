<?php
  session_start();
  /*DISPLAY ERRORS*/
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  /*REQUIRES TO RUN CORRECTY PHP SCRIPT*/
  require_once('../../config/init.php');
  require_once('../../tools/db_queries_user.php');

  $email = $_POST['email'];
  $password = $_POST['password'];
  try {
    $user_data = selectUser($email,$password); //RETURNS FOR $user_data db information for this user
    if(!$user_data)
    {
      echo ("<script>alert('E-mail or/and Password are Invalid!');setTimeout(\"location.href = '../login/login.php';\",100);</script>");
    }
    else
    {
      $id = selectUserID($email,$password);
      $_SESSION['username']=$user_data['nick_name'];
      $_SESSION['id']=$user_data['id'];
      $_SESSION['log']=1;
      header('Location: ../HOMEPAGE/homepage.php');
      exit;
    }

  } catch(Exception $e) {
    echo 'Exception -> ';
    var_dump($e->getMessage());
}

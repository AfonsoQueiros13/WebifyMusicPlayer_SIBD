<?php
  require_once('config/init.php');
  require_once('database/user.php');

  $username = $_POST['username'];
  $password = $_POST['password'];

  try {
    insertUser($username, $password);
    header('Location: list_categories.php');
  } catch(PDOException $e) {
    header('Location: register.php');
  }
?>
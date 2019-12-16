<?php
  require_once('config/init.php');
  require_once('database/category.php');

  $categories = getAllCategories();

  include('templates/header.php');
  include('templates/list_categories.php');
  include('templates/footer.php');
?>
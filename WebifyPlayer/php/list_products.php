<?php
  require_once('config/init.php');

  require_once('database/category.php');
  require_once('database/product.php');

  $id = $_GET['id'];

  if (!isset($id))
    die(header('Location: list_categories.php'));

  $category = getCategoryById($id);

  if (!$category)
    die(header('Location: list_categories.php'));

  $products = getProductsByCategory($id);

  include('templates/header.php');
  include('templates/list_products.php');
  include('templates/footer.php');
?>
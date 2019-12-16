<?php

function getAllCategories() {
  global $dbh;
  $stmt = $dbh->prepare('SELECT * FROM category');
  $stmt->execute();
  return $stmt->fetchAll();
}

function getCategoryById($id) {
  global $dbh;
  $stmt = $dbh->prepare('SELECT * 
                         FROM category 
                         WHERE id = ?');
  $stmt->execute(array($id));
  return $stmt->fetch();
}

?>
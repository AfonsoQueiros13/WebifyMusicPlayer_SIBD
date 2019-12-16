<?php

  function getProductsByCategory($id) {
    global $dbh;
    $stmt = $dbh->prepare('SELECT * 
                           FROM product 
                           WHERE cat_id = ?');
    $stmt->execute(array($id));
    return $stmt->fetchAll();
  }

?>
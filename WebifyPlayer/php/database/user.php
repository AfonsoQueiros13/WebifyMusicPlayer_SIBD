<?php
  function insertUser($username, $password) {
    global $dbh;
    $stmt = $dbh->prepare('INSERT INTO users VALUES(?, ?)');
    $stmt->execute(array($username, sha1($password)));
  }
?>
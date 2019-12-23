<?php
/*INSERT USER IN DATABASE*/
function insertUser($email, $nick, $password)
{
  global $dbh;
  $query = "SELECT * FROM normal_user WHERE email= ? OR nick_name = ? ";
  $stmt = $dbh->prepare($query);
  $stmt->execute(array($email,$nick));
  $count=$stmt->fetchColumn();
  echo $count;


  if ($count == 0) { //NO ENTRANCE FOR THIS E-MAIL IN DATABASE
      $query = 'INSERT INTO normal_user VALUES(?,?,?,?)';
      $stmt = $dbh->prepare($query);
      $stmt->execute(array(null, $email, $nick, sha1($password))); //NULL AUTOINCREMENTS ID
      header('Location: ../HOMEPAGE/homepage.php');

  }
  else //ERROR INSERTING IN DB -> ALREADY EXISTS THIS E-MAIL
  {
    echo ("<script>alert('E-mail or Username already exists!');setTimeout(\"location.href = '../register/register.php';\",100);</script>");

  }
}

/*SELECT USER IN DATABASE FOR LOGIN*/
function selectUser($email,$password)
{
  global $dbh;
  $query = "SELECT * FROM normal_user WHERE email = ? AND passwd = ?";
  $stmt= $dbh->prepare($query);
  $stmt->execute(array($email,sha1($password)));
  return $stmt->fetchAll(); // DESIRED VALUES RETURNED FROM DB
}

function selectUserID($email)
{
  global $dbh;
  $query = "SELECT id FROM normal_user WHERE email = ?";
  $stmt= $dbh->prepare($query);
  $stmt->execute(array($email));
  return $stmt->fetchAll(); // DESIRED VALUES RETURNED FROM DB
}


function selectUserNickfromID($id)
{
  global $dbh;
  $query = "SELECT nick_name FROM normal_user WHERE id = ?";
  $stmt= $dbh->prepare($query);
  $stmt->execute(array($id));
  return $stmt->fetchAll(); // DESIRED VALUES RETURNED FROM DB
}

function insertphoto($id){
  global $dbh;
  $query = " nick_name FROM normal_user WHERE id = ?";
  $stmt= $dbh->prepare($query);
  $stmt->execute(array($id));
}

function changeuserphoto($id){

}

?>

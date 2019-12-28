<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/*REQUIRES TO RUN CORRECTY PHP SCRIPT*/

function get_all_rap_albums()
{

    global $dbh;
    $query = "SELECT * FROM album where album.id_genre = 1";
    $stmt = $dbh->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();
}



function get_all_albums_from_trends(){
  global $dbh;
  $stmt=$dbh->prepare('SELECT * FROM trends join album where id=id_album');
  $stmt->execute();
  return $stmt->fetchAll();
}

function get_album(){
  global $dbh;
  $stmt=$dbh->prepare('SELECT * FROM album');
  $stmt->execute();
  return $stmt->fetchAll();
}
function get_album_by_id($id){
  global $dbh;
  $stmt=$dbh->prepare('SELECT * FROM album where id= ?');
  $stmt->execute(array($id));
  return $stmt->fetch();
}
//select * from album join artist where album.id_artist=artist.id
function get_songs_in_album($name,$albumid){
  global $dbh;
  $stmt=$dbh->prepare('SELECT * FROM album join music where album.nome_album= ? and  id_album= ?');
  $stmt->execute(array($name,$albumid));
  return $stmt->fetchAll();
}

function get_album_and_artist_info($id){
  global $dbh;
  $stmt=$dbh->prepare('SELECT * from album join artist where album.id_artist=artist.id and album.id= ?');
  $stmt->execute(array($id));
  return $stmt->fetch();
}

function get_artist_name_by_id($id){
  global $dbh;
  $stmt=$dbh->prepare('SELECT distinct name from album join artist where album.id_artist=artist.id and artist.id= ?');
  $stmt->execute(array($id));
  return $stmt->fetch();
}



function insertMyAlbum($id_user,$id_album){

  global $dbh;
  $query = "SELECT * FROM liked_albums WHERE id_user = ? and id_album= ? ";
  $stmt = $dbh->prepare($query);
  $stmt->execute(array($id_user, $id_album));
  $count = $stmt->fetchColumn();

  if ($count == 0) { //NO ENTRANCE FOR THIS MUSIC IN DATABASE LIKED_MUSICS
      $query = 'INSERT INTO liked_albums VALUES(?,?)';
      $stmt = $dbh->prepare($query);
      $stmt->execute(array($id_user, $id_album)); //NULL AUTOINCREMENTS ID
      header('Location: ../artist-guest/artist-guest.php?id='.$id_album);
  }

}

function verifyMyAlbums($id_user, $id_album)
{

    global $dbh;
    $query = "SELECT * FROM liked_albums WHERE id_user = ? and id_album= ? ";
    $stmt = $dbh->prepare($query);
    $stmt->execute(array($id_user, $id_album));
    $count = $stmt->fetchColumn();

    if ($count == 0)  //NO ENTRANCE FOR THIS MUSIC IN DATABASE LIKED_MUSICS
        return 0;
    else
        return 1;
}

function selectMyAlbums($id_user)
{

    global $dbh;
    $query = "SELECT * FROM album, liked_albums WHERE album.id = liked_albums.id_album AND liked_albums.id_user = ?";
    $stmt = $dbh->prepare($query);
    $stmt->execute(array($id_user));
    $count = $stmt->fetchColumn();
    return $stmt->fetchAll();
}


function deleteMyAlbums($id_album, $id_user)
{
    global $dbh;
    $query = "DELETE FROM  liked_albums WHERE liked_albums.id_album = ? AND liked_albums.id_user = ?";
    $stmt = $dbh->prepare($query);
    $stmt->execute(array($id_album,$id_user));
}
 ?>

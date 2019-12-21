<?phpphp
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/*REQUIRES TO RUN CORRECTY PHP SCRIPT*/

function searchForArtist($search)
{
  global $dbh;
  $query = "SELECT distinct name from artist join genre join album join music on artist.id=album.id_artist and genre.id=artist.id_genre and artist.id=music.id_artist and music.id_artist=album.id_artist and music.id_album=album.id where artist.name LIKE '%'||?||'%' or nome_album=? or name_music=? or genre.gen_name=?  ";
  $stmt = $dbh->prepare($query);
  $stmt->execute(array($search,$search,$search,$search));
  return $stmt->fetchAll();
}




function searchForAlbum($search)
{
  global $dbh;
  $query = "SELECT distinct nome_album from artist join genre join album join music on artist.id=album.id_artist and genre.id=artist.id_genre and artist.id=music.id_artist and music.id_artist=album.id_artist and music.id_album=album.id where artist.name=? or nome_album LIKE '%'||?||'%' or name_music=? or genre.gen_name = ?";
  $stmt = $dbh->prepare($query);
  $stmt->execute(array($search, $search, $search, $search));
  return $stmt->fetchAll();
}

function searchForMusic($search)
{
  global $dbh;
  $query = "SELECT distinct name_music from artist join genre join album join music on artist.id=album.id_artist and genre.id=artist.id_genre and artist.id=music.id_artist and music.id_artist=album.id_artist and music.id_album=album.id where artist.name=? or nome_album=? or name_music LIKE '%'||?||'%'  or genre.gen_name = ?";
  $stmt = $dbh->prepare($query);
  $stmt->execute(array($search, $search, $search, $search));
  return $stmt->fetchAll();
}

function searchForGenre($search)
{
  global $dbh;
  $query = "SELECT distinct gen_name from artist join genre join album join music on artist.id=album.id_artist and genre.id=artist.id_genre and artist.id=music.id_artist and music.id_artist=album.id_artist and music.id_album=album.id where artist.name=? or nome_album=? or name_music=? or genre.gen_name LIKE '%'||?||'%'";
  $stmt = $dbh->prepare($query);
  $stmt->execute(array($search, $search, $search, $search));
  return $stmt->fetchAll();
}


function searchForAlbums_by_artist_id($search)
{
  global $dbh;
  $query = "SELECT distinct nome_album from artist join album join music on artist.id=album.id_artist and artist.id=music.id_artist and music.id_artist=album.id_artist and music.id_album=album.id where artist.id= ?";
  $stmt = $dbh->prepare($query);
  $stmt->execute(array($search));
  return $stmt->fetchAll();
}

function getalbumid_by_albumname($search){
  global $dbh;
  $query = "SELECT distinct album.id from artist join album join music where nome_album=?";
  $stmt = $dbh->prepare($query);
  $stmt->execute(array($search));
  return $stmt->fetch();
}

function get_album_image($search)
{
  global $dbh;
  $query = "SELECT distinct img_path from artist join album join music on artist.id=album.id_artist and artist.id=music.id_artist and music.id_artist=album.id_artist and music.id_album=album.id where artist.name=? or nome_album=? or name_music=?";
  $stmt = $dbh->prepare($query);
  $stmt->execute(array($search, $search, $search));
  return $stmt->fetchAll();
}

function get_id_by_name($search)
{
  global $dbh;
  $query = "SELECT distinct artist.id from artist join album join music on artist.id=album.id_artist and artist.id=music.id_artist and music.id_artist=album.id_artist and music.id_album=album.id where artist.name=? or nome_album=? or name_music=?" ;
  $stmt=$dbh->prepare($query);
  $stmt->execute(array($search,$search,$search));
  return $stmt->fetch();
}
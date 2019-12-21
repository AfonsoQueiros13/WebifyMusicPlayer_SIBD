<?phpphp
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function get_all_artists()
{

    global $dbh;
    $query = "SELECT * FROM artist";
    $stmt = $dbh->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();
}


function get_artist_by_id($id){
    global $dbh;
    $stmt=$dbh->prepare('SELECT * FROM artist where id= ?');
    $stmt->execute(array($id));
    return $stmt->fetch();
  }

?>
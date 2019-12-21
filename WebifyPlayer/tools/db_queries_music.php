<?phpphp
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


/*REQUIRES TO RUN CORRECTY PHP SCRIPT*/

function insertMySong($id_user, $id_music, $id_album)
{

    global $dbh;
    $query = "SELECT * FROM liked_musics WHERE id_user = ? and id_music= ? ";
    $stmt = $dbh->prepare($query);
    $stmt->execute(array($id_user, $id_music));
    $count = $stmt->fetchColumn();

    if ($count == 0) { //NO ENTRANCE FOR THIS MUSIC IN DATABASE LIKED_MUSICS
        $query = 'INSERT INTO liked_musics VALUES(?,?)';
        $stmt = $dbh->prepare($query);
        $stmt->execute(array($id_user, $id_music)); //NULL AUTOINCREMENTS ID
        header('Location: ../artist-log/artist-log.php?id_album=' . $id_album . '&id_user=' . $id_user);
    } 
}


function verifyMySongs($id_user, $id_music)
{

    global $dbh;
    $query = "SELECT * FROM liked_musics WHERE id_user = ? and id_music= ? ";
    $stmt = $dbh->prepare($query);
    $stmt->execute(array($id_user, $id_music));
    $count = $stmt->fetchColumn();

    if ($count == 0)  //NO ENTRANCE FOR THIS MUSIC IN DATABASE LIKED_MUSICS
        return 0; 
    else
        return 1;
}


function selectMySongs($id_user)
{

    global $dbh;
    $query = "SELECT music.name_music FROM music, liked_musics WHERE music.id = liked_musics.id_music AND liked_musics.id_user = ?";
    $stmt = $dbh->prepare($query);
    $stmt->execute(array($id_user));
    return $stmt->fetchAll();
}


function deleteMySongs($id_music, $id_user)
{
    global $dbh;
    $query = "DELETE FROM  liked_musics WHERE liked_musics.id_music = ? AND liked_musics.id_user = ?";
    $stmt = $dbh->prepare($query);
    $stmt->execute(array($id_music,$id_user));
}

function selectMusicIDbyName($nome_musica)
{
    
    global $dbh;
    $query = "SELECT id FROM  music WHERE name_music = ?";
    $stmt = $dbh->prepare($query);
    $stmt->execute(array($nome_musica));
    return $stmt->fetchAll();
}
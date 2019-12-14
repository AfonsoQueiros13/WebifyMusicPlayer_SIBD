<!DOCTYPE html>
<html lang="en-US">

<head>
    <title> Webify </title>
    <link rel="icon" type="image/gif/png" href="../../images/logo.png">
    <meta charset="UTF-8">
    <link href="style.css" rel=stylesheet>
    <link href="layout.css" rel=stylesheet>
    <link href="responsive.css" rel=stylesheet>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>



<body>
    <!-- TOP BAR -->
    <header>
        <img src="../../images/logo.png" alt="logo">
        <h1>Webify</h1>
        <div id="signup">
            <a href="../register/register.php">Register</a>
            <a href="../login/login.php">Login</a>
        </div>

    </header>

    <!-- page content -->

    <div id="iconmenu-clone">
        <div id="iconmenu">
            <ul>
                <li><i class="fa fa-home"></i><a href="home.php">Home</a></li>
                <li><i class="fa fa-search"></i><a href="../search/search.php">Search</a></li>
            </ul>
        </div>
    </div>


    <div id="rest">

        <article>
            <!-- artists -> songs or just songs? -->
            <h2>Trending Albums</h2>
            <ul>
                <?php
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                require_once('../../config/init.php');
                require_once('../../tools/db_queries_album.php');

                $all_albums = get_all_albums_from_trends();

                $count = 1;

                foreach ($all_albums as $album) {

                    $album = get_album_by_id($count++);
                    ?>

                    <li>
                        <a href="../artist-guest/artist-guest.php?id=<?= $album['id'] ?>">
                            <img src="<?= $album['img_path'] ?>" alt="artistcover">
                            <div>
                                <?= $album['nome_album'] ?>
                            </div>
                        </a>
                    </li>


                <?php } ?>
        </ul>


        </article>

        <article>
            <!-- artists -> songs or just songs? -->
            <h2>Albuns by Genre - Rap</h2>
            <ul>
                <?php
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                require_once('../../config/init.php');
                require_once('../../tools/db_queries_album.php');

                $all_rap_albums = get_all_rap_albums();
                $count = 0;

                foreach ($all_rap_albums as $rap_album) {

                    $rap_album= get_album_by_id($all_rap_albums[$count++]['id']);
                    ?>

                    <li>
                        <a href="../artist-guest/artist-guest.php?id=<?= $rap_album['id'] ?>">
                            <img src="<?= $rap_album['img_path'] ?>" alt="artistcover">
                            <div>
                                <?= $rap_album['nome_album'] ?>
                            </div>
                        </a>
                    </li>


                <?php } ?>
        </ul>

        </article>

        <article>
            <!-- artists -> songs or just songs? -->
            <h2>Artists of the Moment</h2>
            <ul>
                <?php
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                require_once('../../config/init.php');
                require_once('../../tools/db_queries_artists.php');

                $all_artists = get_all_artists();
                $count = 0;

                foreach ($all_artists as $artist) {

                    $artist= get_artist_by_id($all_artists[$count++]['id']);
                    
                    ?>

                    <li>
                        
                        <a href="../selected_artist-guestmode/selected_artist.php?id=<?= $artist['id'] ?>">
                            <img src="<?= $artist['img_path_artist'] ?>" alt="artistcover">
                            <div>
                                <?= $artist['name'] ?>
                            </div>
                        </a>
                    </li>


                <?php } ?>
        </ul>
        </article>

    </div>


</body>

</html>

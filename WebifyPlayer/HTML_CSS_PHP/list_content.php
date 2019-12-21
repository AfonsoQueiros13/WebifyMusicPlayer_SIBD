<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require_once('../../config/init.php');
require_once('../../tools/db_queries_album.php');
require_once('../../tools/db_queries_artists.php');

$all_albums = get_all_albums_from_trends();

$all_rap_albums = get_all_rap_albums();

$all_artists = get_all_artists();
 ?>




<div id="rest">

    <article>
        <!-- artists -> songs or just songs? -->
        <h2>Trending Albums</h2>
        <ul>
            <?php

            // $all_albums = get_all_albums_from_trends();

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

            // $all_rap_albums = get_all_rap_albums();
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

            // $all_artists = get_all_artists();
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

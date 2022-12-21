<?php
    include '/wamp/www/anime_movie/model/movie_modal.php';
     include '/wamp/www/anime_movie/utils/mySql.php';
    if(isset($_GET['anime_id'])){
        $movie = new movie('','',$_GET['anime_id']);
        $movies = $movie->getListMovieByAnimeId();
    }
    if(isset($_GET['movie_id'])){
        $movie = new movie($_GET['movie_id'],'','');
        $movie_id = $movie->getMovie();
    }
?>
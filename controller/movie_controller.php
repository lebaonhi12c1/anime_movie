<?php
    include '/wamp/www/anime_movie/model/movie_modal.php';
     include '/wamp/www/anime_movie/utils/mySql.php';
    for ($i=2; $i <8 ; $i++) { 
        $movie = new movie($i+43,"https://v39-us.tiktokcdn.com/25b302bd0fa2ff3514ca4ab230490289/63a41c1b/video/tos/alisg/tos-alisg-pve-0037/9f893498cf504ac090a762eb31567f05/?a=1233&ch=0&cr=0&dr=0&lr=all&cd=0%7C0%7C0%7C0&cv=1&br=2946&bt=1473&cs=0&ds=3&ft=XsFb_qT0m7jPD12IY-7q3wUUHvyKMeF~OD&mime_type=video_mp4&qs=0&rc=OjZnNmZpMzw4ODs2ZGkzOUBpM2Z5Nmg6ZmtxZjMzODgzNEAtNV4vYmMuXzYxMTNfNTEwYSMwcGRjcjRnYHBgLS1kLy1zcw%3D%3D&l=20221222025743061E014A59956286E932&btag=80000&cc=8",$i);
        $movie->getInsert();
    }
    if(isset($_GET['anime_id'])){
        $movie = new movie('','',$_GET['anime_id']);
        $movies = $movie->getListMovieByAnimeId();
    }
    if(isset($_GET['movie_id'])){
        $movie = new movie($_GET['movie_id'],'','');
        $movie_id = $movie->getMovie();
    }

    
?>
<?php
    include '../model/anime_modal.php';
    include '../utils/mySql.php';
    $anime = new anime('','','','','','','');
    $animes = $anime->getAllAnime();
    var_dump($animes);
?>
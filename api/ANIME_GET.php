<?php
include_once(__DIR__ . "/models/anime.class.php");

$mAnime = new Anime();
$datosAnime = $mAnime->GetAll();

display_result(array("res"=>$datosAnime));
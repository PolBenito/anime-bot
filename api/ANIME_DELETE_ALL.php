<?php
include_once(__DIR__ . "/models/anime.class.php");

$mAnime = new Anime();
$res = $mAnime->DeleteAll();
if (!$res) display_error("No se han podido eliminar los animes.");

display_result(array("res"=>true));
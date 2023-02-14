<?php
include_once(__DIR__ . "/models/anime.class.php");

$req_COD_ANIME = (int)$_REQUEST["COD_ANIME"];

if ($req_COD_ANIME <= 0) display_error("No se ha indicado el COD_ANIME.");

$mAnime = new Anime();
$res = $mAnime->Delete($req_COD_ANIME);
if (!$res) display_error("No se ha podido eliminar el anime.");

display_result(array("res"=>true));
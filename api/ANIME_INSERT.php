<?php
include_once(__DIR__ . "/models/anime.class.php");

$req_COD_ANIME = (int)$_REQUEST["COD_ANIME"];
$req_TITLE = (string)$_REQUEST["TITLE"];
$req_IMAGE = (string)$_REQUEST["IMAGE"];
$req_URL = (string)$_REQUEST["URL"];
$req_AIRING = (string)$_REQUEST["AIRING"];
$req_DAY = (string)$_REQUEST["DAY"];
$req_HOUR = (string)$_REQUEST["HOUR"];
$req_DAY_ENG = (string)$_REQUEST["DAY_ENG"];
$req_TOTAL_EPISODES = (int)$_REQUEST["TOTAL_EPISODES"];
$req_FINAL_POST_EPISODE = (int)$_REQUEST["FINAL_POST_EPISODE"];

if ($req_COD_ANIME <= 0) display_error("No se ha indicado el COD_ANIME.");
if (empty($req_TITLE)) display_error("No se ha indicado el TITLE.");
if (empty($req_URL)) display_error("No se ha indicado la URL.");

$params = array();
$params["COD_ANIME"] = $req_COD_ANIME;
$params["TITLE"] = $req_TITLE;
$params["IMAGE"] = $req_IMAGE;
$params["URL"] = $req_URL;
$params["AIRING"] = $req_AIRING;
$params["DAY"] = $req_DAY;
$params["HOUR"] = $req_HOUR;
$params["DAY_ENG"] = $req_DAY_ENG;
$params["TOTAL_EPISODES"] = $req_TOTAL_EPISODES;
$params["FINAL_POST_EPISODE"] = $req_FINAL_POST_EPISODE;

$mAnime = new Anime();
$res = $mAnime->Insert($params);
if (!$res) display_error("No se ha podido guardar el anime.");

display_result(array("res"=>true));
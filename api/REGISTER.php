<?php
include_once(__DIR__ . "/models/user.class.php");

$req_COD_USER = (int)$_REQUEST["COD_USER"];
$req_PASSWORD = (string)$_REQUEST["PASSWORD"];
$req_KEY = (string)$_REQUEST["KEY"];
$req_NOMBRE = (string)$_REQUEST["NOMBRE"];
$req_URL = (string)$_REQUEST["URL"];

if ($req_COD_USER <= 0) display_error("No se ha indicado el COD_USER.");
if (empty($req_PASSWORD)) display_error("No se ha indicado el PASSWORD.");
if (empty($req_KEY)) display_error("No se ha indicado la KEY.");
if (empty($req_NOMBRE)) display_error("No se ha indicado el NOMBRE.");
if (empty($req_URL)) display_error("No se ha indicado la URL al perfil de MyAnimeList.");

$mUser = new User();
$existe = $mUser->UserExist($req_COD_USER);
if ($existe) display_error("El usuario ".$req_COD_USER." ya existe.");

$params = array();
$params["COD_USER"] = $req_COD_USER;
$params["PASSWORD"] = $req_PASSWORD;
$params["KEY"] = $req_KEY;
$params["NOMBRE"] = $req_NOMBRE;
$params["URL"] = $req_URL;

$registrado = $mUser->Insert($params);
if (!$registrado) display_error("No te has podido registrar correctamente. Por favor, ponte en contacto con el administrador a través del canal de Discord.");

$_SESSION["COD_USER"] = $req_COD_USER;

display_result(array("res"=>true));
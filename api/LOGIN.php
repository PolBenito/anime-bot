<?php
include_once(__DIR__ . "/models/user.class.php");

$req_COD_USER = (int)$_REQUEST["COD_USER"];

if (empty($req_COD_USER)) display_error("No se ha indicado el COD_USER.");

$mUser = new User();
$existe = $mUser->UserExist($req_COD_USER);
if (!$existe) display_error("El usuario ".$req_COD_USER." no existe.");

$datosUser = $mUser->Get($req_COD_USER);
if (empty($datosUser)) display_error("Contraseña incorrecta.");

$_SESSION["COD_USER"] = $req_COD_USER;

display_result(array("res"=>$datosUser[0]));
<?php
include_once(__DIR__ . "/models/user.class.php");

$COD_USER = $_SESSION["COD_USER"];

$mUser = new User();
$datosUser = $mUser->Get($COD_USER);
if (empty($datosUser)) display_error("No se ha podido recuperar la información del usuario.");

display_result(array("res"=>$datosUser[0]));
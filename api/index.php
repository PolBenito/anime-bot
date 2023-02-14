<?php
error_reporting(E_ALL ^E_WARNING ^E_DEPRECATED ^E_NOTICE);
session_start();
$_SESION = array();

require(__DIR__ . "/models/auth.class.php");
require(__DIR__ . "/functions.lib.php");

$req_login = (int)$_REQUEST["login"];
$req_OP = (string)$_REQUEST["OP"];
$req_COD_USER = (int)$_REQUEST["COD_USER"];

if (empty($req_OP)) display_error("OP no encontrada.");

if ($req_login == 0) {
    if ($req_COD_USER <= 0) display_error("No se ha encontrado el código del usuario.");
    $_SESSION["COD_USER"] = (int)$req_COD_USER;
}

$path = __DIR__."/".$req_OP.".php";

if (file_exists($path)) include_once($path);
else display_error("Fichero no encontrado");
<?php

if (!function_exists("display_result")) {
	function display_result($datos = array(), $tipo = "success") {
		$datos["estado"] = "ok";
		$datos["tipo"] = $tipo;
		session_destroy();
		die(json_encode($datos)); 
	}
}

if (!function_exists("display_error")) {
	function display_error($mensaje = "Error con la Base de Datos.", $tipo = "error") {
		$result = array();
		$result["estado"] = "ko";
		$result["tipo"] = $tipo;
		$result["mensaje"] = $mensaje;
		session_destroy();
		die(json_encode($result));    
	}
}

if (!function_exists("clg")) {
    function clg($var, $exit = false) {
        if (is_array($var) || is_object($var)) {
            echo "<pre>";
            print_r($var);
            echo "</pre>";
        }
        else {
            echo $var;
            echo "<br>";
        }
    
        if ($exit) exit;
    }
}
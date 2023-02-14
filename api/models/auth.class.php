<?php

class Auth {

    public $pdo;

    function __construct() {
        $PATH_TO_SQLITE_FILE = __DIR__ . "/../db/anime-bot.db";

        try {
            if ($this->pdo == null) {
                $this->pdo = new PDO("sqlite:".$PATH_TO_SQLITE_FILE, "", "", array(PDO::ATTR_PERSISTENT => true));
            }
        } 
        catch(PDOException $e) {
            display_error("Error al abrir la conexión SQLite: ".$e->getMessage());
        }
    }
}
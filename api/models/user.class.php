<?php

class User {

    private $auth;

    function __construct() {
        $this->auth = new Auth();
    }

    function Get($cod_user) {
        $SQL = "SELECT 
                    *
                FROM 
                    USER
                WHERE 
                    COD_USER = :COD_USER";

        try {
            $stmt = $this->auth->pdo->prepare($SQL);

            $stmt->execute([
                ':COD_USER' => $cod_user
            ]);

            $_resultados = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $_resultados[] = [
                    'COD_USER' => $row['COD_USER'],
                    'PASSWORD' => $row['PASSWORD'],
                    'KEY' => $row['KEY'],
                    'NOMBRE' => $row['NOMBRE'],
                    'URL' => $row['URL'],
                ];
            }

            return $_resultados;
        }
        catch(PDOException $e) {
            display_error($e->getMessage());
        }
    }

    function UserExist($cod_user) {
        $SQL = "SELECT 
                    *
                FROM 
                    USER
                WHERE 
                    COD_USER = :COD_USER";

        try {
            $stmt = $this->auth->pdo->prepare($SQL);

            $stmt->execute([
                ':COD_USER' => $cod_user
            ]);

            $_resultados = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $_resultados[] = [
                    'COD_USER' => $row['COD_USER']
                ];
            }

            return !empty($_resultados);
        }
        catch(PDOException $e) {
            display_error($e->getMessage());
        }
    }

    // El único que usa 'pdo->query', ya que a todos se le pasará el parámetro de 'COD_USER'
    function GetAllUsers() {
        $SQL = "SELECT *
                FROM USER";
        
        try {
            $stmt = $this->auth->pdo->query($SQL);
            
            $_resultados = [];
            while ($row = $stmt->fetchObject()) {
                $_resultados[] = $row;
            }

            return $_resultados;
        }
        catch(PDOException $e) {
            display_error($e->getMessage());
        }
    }

    function Insert($params) {
        $COD_USER = (int)$params["COD_USER"];
        $PASSWORD = (string)$params["PASSWORD"];
        $KEY = (string)$params["KEY"];
        $NOMBRE = (string)$params["NOMBRE"];
        $URL = (string)$params["URL"];

        $SQL = "INSERT INTO USER (
                    COD_USER, 
                    PASSWORD, 
                    KEY, 
                    NOMBRE, 
                    URL
                )
                VALUES (
                    :COD_USER, 
                    :PASSWORD, 
                    :KEY, 
                    :NOMBRE, 
                    :URL
                )";

        try {
            $stmt = $this->auth->pdo->prepare($SQL);

            $res = $stmt->execute([
                ':COD_USER' => $COD_USER,
                ':PASSWORD' => $PASSWORD,
                ':KEY' => $KEY,
                ':NOMBRE' => $NOMBRE,
                ':URL' => $URL
            ]);

            return $res;
        }
        catch(PDOException $e) {
            if ($e->getCode() == 23000) display_error("Ya existe este usuario.", "warning");
            display_error($e->getMessage());
        }
    }

}


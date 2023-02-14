<?php

class Anime {
    
    private $auth;

    function __construct() {
        $this->auth = new Auth();
    }

    function GetAll() {
        $SQL = "SELECT 
                    COD_USER, 
                    COD_ANIME, 
                    TITLE, 
                    IMAGE, 
                    URL, 
                    AIRING, 
                    DAY, 
                    HOUR, 
                    DAY_ENG, 
                    TOTAL_EPISODES, 
                    FINAL_POST_EPISODE
                FROM 
                    ANIME
                WHERE 
                    COD_USER = :COD_USER";

        try {
            $stmt = $this->auth->pdo->prepare($SQL);

            $stmt->execute([
                ':COD_USER' => $_SESSION["COD_USER"]
            ]);

            $_resultados = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) $_resultados[] = $row;

            return $_resultados;
        }
        catch(PDOException $e) {
            display_error($e->getMessage());
        }
    }

    function Insert($params) {
        $COD_ANIME = (int)$params["COD_ANIME"];
        $TITLE = (string)$params["TITLE"];
        $IMAGE = (string)$params["IMAGE"];
        $URL = (string)$params["URL"];
        $AIRING = (bool)$params["AIRING"];
        $DAY = (string)$params["DAY"];
        $HOUR = (string)$params["HOUR"];
        $DAY_ENG = (string)$params["DAY_ENG"];
        $TOTAL_EPISODES = (int)$params["TOTAL_EPISODES"];
        $FINAL_POST_EPISODE = (int)$params["FINAL_POST_EPISODE"];

        $SQL = "INSERT INTO ANIME (
                    COD_USER, 
                    COD_ANIME, 
                    TITLE, 
                    IMAGE, 
                    URL, 
                    AIRING, 
                    DAY, 
                    HOUR, 
                    DAY_ENG, 
                    TOTAL_EPISODES, 
                    FINAL_POST_EPISODE
                )
                VALUES (
                    :COD_USER, 
                    :COD_ANIME, 
                    :TITLE, 
                    :IMAGE, 
                    :URL, 
                    :AIRING, 
                    :DAY, 
                    :HOUR, 
                    :DAY_ENG, 
                    :TOTAL_EPISODES, 
                    :FINAL_POST_EPISODE
                )";

        try {
            $stmt = $this->auth->pdo->prepare($SQL);

            $res = $stmt->execute([
                ':COD_USER' => $_SESSION["COD_USER"],
                ':COD_ANIME' => $COD_ANIME,
                ':TITLE' => $TITLE,
                ':IMAGE' => $IMAGE,
                ':URL' => $URL,
                ':AIRING' => $AIRING,
                ':DAY' => $DAY,
                ':HOUR' => $HOUR,
                ':DAY_ENG' => $DAY_ENG,
                ':TOTAL_EPISODES' => $TOTAL_EPISODES,
                ':FINAL_POST_EPISODE' => $FINAL_POST_EPISODE,
            ]);

            return $res;
        }
        catch(PDOException $e) {
            display_error($e->getMessage());
        }
    }

    function Delete($COD_ANIME) {
        $COD_ANIME = (int)$COD_ANIME;
        
        $SQL = "DELETE FROM
                    ANIME
                WHERE
                    COD_USER = :COD_USER
                    AND COD_ANIME = :COD_ANIME";

        try {
            $stmt = $this->auth->pdo->prepare($SQL);

            $res = $stmt->execute([
                ':COD_USER' => $_SESSION["COD_USER"],
                ':COD_ANIME' => $COD_ANIME
            ]);

            return $res;
        }
        catch(PDOException $e) {
            display_error($e->getMessage());
        }
    }

    function DeleteAll() {
        $SQL = "DELETE FROM
                    ANIME
                WHERE
                    COD_USER = :COD_USER";

        try {
            $stmt = $this->auth->pdo->prepare($SQL);

            $res = $stmt->execute([
                ':COD_USER' => $_SESSION["COD_USER"]
            ]);

            return $res;
        }
        catch(PDOException $e) {
            display_error($e->getMessage());
        }
    }

}
<?php

namespace src\Models;

use PDO;
use PDOException;

final class Database
{
    private $DB;
    private $config;

    public function __construct()
    {
        $this->config = __DIR__ . '/../../config.php';
        require_once $this->config;

        $this->connexionDB();
    }

    private function connexionDB(): void
    {
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
            $this->DB = new PDO($dsn, DB_USER, DB_PWD);
        } catch (PDOException $error) {
            echo "Quelque chose s'est mal passé : " . $error->getMessage();
        }
    }

    public function getDB()
    {
        return $this->DB;
    }

    /**
     * Initialisation de la Base de Données : installation des tables et mise à jour du fichier config.php
     * @return string message d'échec ou de réussite.
     */
    public function initializeDB(): string
    {

        // Vérifier si la base de données est vide
        if ($this->testIfTableTDLExists()) {
            return "La base de données semble déjà remplie.";
            die();
        }
        // Télécharger le fichier sql d'initialisation dans la BDD
        try {
            $sql = file_get_contents(__DIR__ . "/../Migrations/brief-todo-list.sql");

            $this->DB->query($sql);
            // Mettre à jour le fichier config.php

            if ($this->MiseAJourConfig()) {
                return "installation de la Base de Données terminée !";
                die();
            }
        } catch (PDOException $erreur) {
            return "impossible de remplir la Base de données : " . $erreur->getMessage();
            die();
        }
    }

    /**
     * Vérifie si la table Films existe déjà dans la BDD
     * @return bool
     */
    private function testIfTableTDLExists(): bool
    {
        $existant = $this->DB->query('SHOW TABLES FROM ' . DB_NAME . ' like \'' . PREFIXE . 'tasks\'')->fetch();

        if ($existant !== false && $existant[0] == PREFIXE . "tasks") {
            return true;
        } else {
            return false;
        }
    }

    private function MiseAJourConfig(): bool
    {

        $fconfig = fopen($this->config, 'w');

        $contenu = "<?php
    // lors de la mise en open source, remplacer les infos concernant la base de données.
    
    define('DB_HOST', '" . DB_HOST . "');
    define('DB_NAME', '" . DB_NAME . "');
    define('DB_USER', '" . DB_USER . "');
    define('DB_PWD', '" . DB_PWD . "');
    define('PREFIXE', '" . PREFIXE . "');
    
    // Ne pas toucher :
    
    define('DB_INITIALIZED', TRUE);";


        if (fwrite($fconfig, $contenu)) {
            fclose($fconfig);
            return true;
        } else {
            fclose($fconfig);
            return false;
        }
    }
}

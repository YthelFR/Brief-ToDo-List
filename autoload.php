<?php

// On charge les classes et les repositories à la demande :

use src\Models\Database;

spl_autoload_register('chargerClasses');

function chargerClasses($classe)
{
    var_dump($classe);

    $classe = str_replace('src', '', $classe);
    var_dump($classe);
    $classe = str_replace('\\', '/', $classe);
    var_dump($classe);

    $fichier = $classe . '.php';
    var_dump($fichier);
    try {
        if (file_exists(__DIR__ . $fichier)) {
            require_once __DIR__ . $fichier;
        }
    } catch (Error $error) {
        echo "Une erreur est survenue : " . $error->getMessage();
    }
}

require __DIR__ . "/../config.php";

if (DB_INITIALIZED == FALSE) {
    $db = new Database;

    $db->initializeDB();
}

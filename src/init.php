<?php

use src\Models\Database;

require __DIR__ . './autoload.php';

require __DIR__ . "/../config.php";

if (DB_INITIALIZED == FALSE) {
    $db = new Database;

    $db->initializeDB();
}

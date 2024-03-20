<?php
require 'config.php';

use src\Models\Database;
use src\Models\Priority;
use src\Models\Task;
use src\Models\Category;
use src\Repositories\CategoryRepository;
use src\Repositories\PriorityRepository;
use src\Repositories\TaskRepository;
use src\Repositories\UserRepository;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Utilisez isset() pour vérifier si la clé existe dans le tableau $_POST
    $taskName = isset($_POST["taskName"]) ? $_POST["taskName"] : '';
    $dateTask = isset($_POST["dateTask"]) ? $_POST["dateTask"] : '';
    $titleTask = isset($_POST["titleTask"]) ? $_POST["titleTask"] : '';
    $answer = isset($_POST["answer"]) ? $_POST["answer"] : '';
    $descriptionTask = isset($_POST["descriptionTask"]) ? $_POST["descriptionTask"] : '';

    // Vous pouvez maintenant utiliser ces valeurs pour les traiter, les enregistrer dans une base de données, etc.
    echo "Nom de la tâche : " . $taskName . "<br>";
    echo "Date de la tâche : " . $dateTask . "<br>";
    echo "Catégorie de la tâche : " . $titleTask . "<br>";
    echo "Priorité : " . $answer . "<br>";
    echo "Description de la tâche : " . $descriptionTask . "<br>";
}
?>
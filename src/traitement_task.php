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

    $taskName = isset($_POST["taskName"]) ? $_POST["taskName"] : '';
    $dateTask = isset($_POST["dateTask"]) ? $_POST["dateTask"] : '';
    $titleTask = isset($_POST["titleTask"]) ? $_POST["titleTask"] : '';
    $answer = isset($_POST["answer"]) ? $_POST["answer"] : '';
    $descriptionTask = isset($_POST["descriptionTask"]) ? $_POST["descriptionTask"] : '';

    echo $taskName;
    echo $dateTask;
    echo $titleTask;
    echo $answer;
    echo $descriptionTask ;
}
?>
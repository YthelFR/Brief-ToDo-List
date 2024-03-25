<?php
session_start();

use src\Models\Database;
use src\Models\User;
use src\Repositories\UserRepository;

include("./autoloader.php");

if (isset($_POST)) {
    $data = file_get_contents("php://input");
    $decodedUser = (json_decode($data, true));


    $user = new User($decodedUser);

    $dbConnexion = new Database();
    $userManager = new UserRepository($dbConnexion);

    if ($userManager->checkUserExist($user)) {
        echo "Email already taken";
        return;
    }

    if ($userManager->register(($user))) {
        $_SESSION["id"] = $user->getId();
        echo "inserted";
    } else {
        echo "Error";
    }
}

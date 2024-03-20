<?php

use src\Repositories\UserRepository;
use src\Models\Database;
# On instancie un object Database
$database = new Database();

if (!empty($_POST['email']) && !empty($_POST['password']) && isset($_POST['email']) && isset($_POST['password'])) {

    # On fait appel à la fonction LogIn de l'object database
    $email = htmlentities($_POST['email']);

    $userAvecCeMail = $database->getThoseUsersByMail();

    if ($userAvecCeMail) {
        if (password_verify($_POST['password'], $userAvecCeMail->getpassword())) {
            $_SESSION['connecté'] = true;
            $_SESSION['user'] = serialize($userAvecCeMail);
            header('location: ../TableauDeBord.php');
            exit;
        }
    }
}
header('location: ../connexion.php?erreur=' . 7);
die;

<?php
require 'config.php';
use src\Models\User;
use src\Models\Database;
use src\Repositories\UserRepository;

if (!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['mail']) && !empty($_POST['password']) && !empty($_POST['confirm']) && isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['mail']) && isset($_POST['password']) && isset($_POST['confirm'])) {
    $LastName = htmlentities($_POST['lastName']);
    $FirstName = htmlentities($_POST['firstName']);

    if ($_POST['password'] === $_POST['confirm']) {
        if (strlen($_POST['password']) >= 7) {
            $Password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        } else {
            header('location: /../index.php?erreur=' . ERREUR_PASSWORD_LENGTH);
            exit;
        }
    } else {
        header('location: /../index.php?erreur=' . PASSWORD_PAS_IDENTIQUE);
        exit;
    }

    if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        $Mail = htmlentities($_POST['mail']);
    } else {
        header('location: ../index.php?email=' . ERREUR_EMAIL);
        exit;
    }
    // action finale
    $Data_base = new UserRepository();
    $User = new User($Lastname, $Firstname, $Password, $Mail);

    if (($Data_base->CreateThisUser($user)) == true) {
       echo "connexion réussie";
    } else {
        header('location: /../index.php?message=' . ERREUR_ENREGISTREMENT);
        die;
    }
} else {
    header('location: /../index.php?message=' . ERREUR_CHAMPS_VIDES);
}

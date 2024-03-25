<?php

use src\Models\User;
use src\Repositories\UserRepository;

$data = json_decode(file_get_contents("php://input"), true);

$LastName = isset($data['lastName']) ? htmlspecialchars($data['lastName']) : '';
$FirstName = isset($data['firstName']) ? htmlspecialchars($data['firstName']) : '';
$Mail = isset($data['mail']) ? htmlspecialchars($data['mail']) : '';
$Password = isset($data['password']) ? htmlspecialchars($data['password']) : '';
$Confirm = isset($data['confirm']) ? htmlspecialchars($data['confirm']) : '';

if (!empty($FirstName) && !empty($LastName) && !empty($Mail) && !empty($Password) && !empty($Confirm)) {

    if ($Password === $Confirm) {
        if (strlen($Password) >= 7) {
            $Password = password_hash($Password, PASSWORD_DEFAULT);
        } else {
            header('location: /../index.php?erreur=' . ERREUR_PASSWORD_LENGTH);
            exit;
        }
    } else {
        header('location: /../index.php?erreur=' . PASSWORD_PAS_IDENTIQUE);
        exit;
    }

    if (filter_var($Mail, FILTER_VALIDATE_EMAIL)) {
        // Préparation de l'insertion
        $Database = new UserRepository;
        $User = new User([
            'lastName' => $LastName,
            'firstName' => $FirstName,
            'password' => $Password,
            'mail' => $Mail
        ]);

        // Insertion dans la base de données
        if (($Database->CreateThisUser($User)) == true) {
            echo "connexion réussie";
        } else {
            header('location: /../index.php?message=' . ERREUR_ENREGISTREMENT);
            die;
        }
    } else {
        header('location: ../index.php?email=' . ERREUR_EMAIL);
        exit;
    }
} else {
    header('location: /../index.php?message=' . ERREUR_CHAMPS_VIDES);
}

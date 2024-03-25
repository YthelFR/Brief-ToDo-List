<?php
include "./../autoload.php";

use src\Models\Database;
use src\Models\User;
use src\Repositories\UserRepository;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = json_decode(file_get_contents("php://input"), true);

    $LastName = htmlspecialchars($data['Lastname']);
    $FirstName = htmlspecialchars($data['Firstname']);
    $Mail = htmlspecialchars($data['Mail']);
    $Password = htmlspecialchars($data['Password']);
    $Confirm = htmlspecialchars($data['Confirm']);

    if (!empty($FirstName) && !empty($LastName) && !empty($Mail) && !empty($Password) && !empty($Confirm)) {

        if ($Password === $Confirm) {
            if (strlen($Password) >= 7) {
                $Password = password_hash($Password, PASSWORD_DEFAULT);
            } else {
                // header('location: /../index.php?erreur=' . ERREUR_PASSWORD_LENGTH);
                exit;
            }
        } else {
            // header('location: /../index.php?erreur=' . PASSWORD_PAS_IDENTIQUE);
            exit;
        }

        if (filter_var($Mail, FILTER_VALIDATE_EMAIL)) {
            // Préparation de l'insertion
            $Database = new Database();
            $UserRepository = new UserRepository();
            
            $user = new User([
                'lastName' => $LastName,
                'firstName' => $FirstName,
                'password' => $Password,
                'mail' => $Mail
            ]);

            // Insertion dans la base de données
            if (($UserRepository->CreateThisUser($user)) == true) {
                // echo json_encode("connexion réussie");
            } else {
                // header('location: /../index.php?message=' . ERREUR_ENREGISTREMENT);
                die;
            }
        } else {
            // header('location: ../index.php?email=' . ERREUR_EMAIL);
            exit;
        }
    } else {
        // header('location: /../index.php?message=' . ERREUR_CHAMPS_VIDES);
        exit;
    }
}

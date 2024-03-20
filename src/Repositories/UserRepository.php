<?php

namespace src\Repositories;

use src\Models\Database;
use src\Models\User;
use PDO;
use PDOException;

class UserRepository
{
    private $DB;

    public function __construct()
    {
        $database = new Database;
        $this->DB = $database->getDB();

        require_once __DIR__ . '/../../config.php';
    }

    // Exemple d'une requête avec query :
    // il n'y a pas de risques, car aucun paramètre venant de l'extérieur n'est demandé dans le sql.
    public function getAllUsers()
    {
        $sql = "SELECT * FROM " . PREFIXE . "user;";

        $retour = $this->DB->query($sql)->fetchAll(PDO::FETCH_OBJ);

        return $retour;
    }
    /**
     * Exemple d'une requête préparée, avec prepare, bindParam et execute :
     * - prepare : permet d'écrire la requête sql, en remplaçant les nom des variables par :variable.
     * Il est aussi possible de mettre un '?', mais c'est moins lisible, surtout quand on a beaucoup de paramètres à passer.
     * - bindParam : permet d'associer un :variable avec la vraie variable.
     * - execute : permet d'exécuter le sql complet. 
     * 
     * L'id est un paramètre donné par le code, il y a un risque d'altération de la donnée.
     * Pour éviter des injections on prépare (on désamorce) la requête.
     */

    public function getThisUserById($id): object
    {
        $sql = "SELECT * FROM " . PREFIXE . "user WHERE id = :id";

        $statement = $this->DB->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();

        $retour = $statement->fetch(PDO::FETCH_OBJ);

        return $retour;
    }
    // Construire la méthode getThoseUsersByName()

    public function getThoseUsersByName(string $lastname): array
    {
        $sql = "SELECT * FROM " . PREFIXE . "user WHERE LASTNAME = :Lastname";

        $statement = $this->DB->prepare($sql);

        $statement->bindParam(':Lastname', $lastname);

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function getThoseUsersByMail(string $mail): array
    {
        $sql = "SELECT * FROM " . PREFIXE . "user WHERE MAIL = :Mail";

        $statement = $this->DB->prepare($sql);

        $statement->bindParam(':Mail', $mail);

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);
    }
    // Construire la méthode CreateThisPriority()

    public function CreateThisUser(User $user): bool
    {
        $sql = "INSERT INTO " . PREFIXE . "user (ID, LASTNAME, FIRSTNAME, PASSWORD, MAIL) VALUES (:ID, :LASTNAME, :FIRSTNAME, :PASSWORD, :MAIL)";

        $statement = $this->DB->prepare($sql);

        $retour = $statement->execute([
            ':ID' => $user->getId(),
            ':LASTNAME' => $user->getLastname(),
            ':FIRSTNAME' => $user->getFirstname(),
            ':PASSWORD' => $user->getPassword(),
            ':MAIL' => $user->getMail()
        ]);

        return $retour;
    }

    // Construire la méthode updateThisUser()
    public function updateThisUser(User $user): bool
    {
        $sql = "UPDATE " . PREFIXE . "user 
            SET
                LASTNAME = :LASTNAME,
                FIRSTNAME = :FIRSTNAME,
                PASSWORD = :PASSWORD,
                MAIL = :MAIL
            WHERE ID = :ID";

        $statement = $this->DB->prepare($sql);

        $retour = $statement->execute([
            ':ID' => $user->getId(),
            ':LASTNAME' => $user->getLastname(),
            ':FIRSTNAME' => $user->getFirstname(),
            ':PASSWORD' => $user->getPassword(),
            ':MAIL' => $user->getMail()
        ]);

        return $retour;
    }

    // Construire la méthode deleteThisUser()
    public function deleteThisUser(int $ID): bool
    {
        try {
            $sql = "DELETE FROM " . PREFIXE . "user WHERE ID = :ID;";

            $statement = $this->DB->prepare($sql);

            return $statement->execute([':ID' => $ID]);
        } catch (PDOException $error) {
            echo "Erreur de suppression : " . $error->getMessage();
            return FALSE;
        }
    }
}

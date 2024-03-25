<?php

namespace src\Repositories;


use src\Models\Database;
use src\Models\User;
use PDO;
use PDOException;

class UserRepository
{
    private $DB;
    private $pdo;


    public function __construct()
    {
        $database = new Database;
        $this->DB = $database->getDB();

        require_once __DIR__ . '/../../config.php';
        $this->pdo = $dbConnexion->getPDO();
    }

    // Exemple d'une requête avec query :
    // il n'y a pas de risques, car aucun paramètre venant de l'extérieur n'est demandé dans le sql.
    public function getAllUsers()
    {
        $sql = "SELECT * FROM " . PREFIXE . "user;";

        $retour = $this->DB->query($sql)->fetchAll(PDO::FETCH_CLASS, User::class);

        return $retour;
    }

    public function getThisUserById($id): User
    {
        $sql = "SELECT * FROM " . PREFIXE . "user WHERE id = :id";

        $statement = $this->DB->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();

        $retour = $statement->fetch(PDO::FETCH_CLASS, User::class);

        return $retour;
    }

    public function getThoseUsersByName(string $lastname): array
    {
        $sql = "SELECT * FROM " . PREFIXE . "user WHERE LASTNAME = :Lastname";

        $statement = $this->DB->prepare($sql);

        $statement->bindParam(':Lastname', $lastname);

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function getThoseUsersByMail(string $mail): User
    {
        $sql = "SELECT * FROM " . PREFIXE . "user WHERE MAIL = :Mail";

        $statement = $this->DB->prepare($sql);

        $statement->bindParam(':Mail', $mail);

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, User::class);
    }

    public function CreateThisUser(User $user): bool
    {
        try {
            $sql = "INSERT INTO " . PREFIXE . "user (LASTNAME, FIRSTNAME, PASSWORD, MAIL) VALUES (:LASTNAME, :FIRSTNAME, :PASSWORD, :MAIL)";
            $statement = $this->DB->prepare($sql);
            $retour = $statement->execute([
                ':LASTNAME' => $user->getLastname(),
                ':FIRSTNAME' => $user->getFirstname(),
                ':PASSWORD' => $user->getPassword(),
                ':MAIL' => $user->getMail()
            ]);
            return $retour;
        } catch (PDOException $e) {
            echo "Une erreur s'est produite lors de la création de l'utilisateur : " . $e->getMessage();
            return false;
        }
    }

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

    public function login(string $email, string $password)
    {
        $hash = hash("whirlpool", $password);


        try {
            $stmt = $this->pdo->query("SELECT * FROM " . PREFIXE . "user WHERE email_user = '$email' AND password_user = '$hash' ");
        } catch (\PDOException $e) {
            var_dump($e);
        }
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
        }

        if (isset($user)) {
            return $stmt->rowCount() == 1;
        }
    }

    public function register(User $user)
    {
        $password = hash("whirlpool", $user->getPassword());

        try {
            $stmt = $this->pdo->prepare("INSERT INTO " . PREFIXE . "user VALUES(NULL, ?, ?, ?, ?)");
            $stmt->execute([$user->getLastname(), $user->getFirstname(), $password, $user->getMail()]);

            return $stmt->rowCount() == 1;
        } catch (\PDOException $e) {
            return $e;
        }
    }

    public function checkUserExist(User $user)
    {
        $email = $user->getMail();

        try {
            $stmt = $this->pdo->query("SELECT * FROM " . PREFIXE . "user WHERE email_user = '$email' ");
        } catch (\PDOException $e) {
            return $e;
        }
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $user = new User($row);
        }

        if (isset($user)) {
            return $stmt->rowCount() == 1;
        }
    }
}

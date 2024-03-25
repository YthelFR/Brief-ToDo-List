<?php
namespace src\Repositories;

use src\Models\Database;
use src\Models\Priority;
use PDO;
use PDOException;

class PriorityRepository
{
    private $DB;

    public function __construct()
    {
        $database = new Database;
        $this->DB = $database->getDB();

        require_once __DIR__ . '/../../config.php';
    }


    public function getAllPriorities()
    {
        $sql = "SELECT * FROM " . PREFIXE . "priority;";

        $retour = $this->DB->query($sql)->fetchAll(PDO::FETCH_OBJ);

        return $retour;
    }


    public function getThisPriorityById($id): object
    {
        $sql = "SELECT * FROM " . PREFIXE . "priority WHERE id = :id";

        $statement = $this->DB->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();

        $retour = $statement->fetch(PDO::FETCH_OBJ);

        return $retour;
    }

    public function getThosePrioritiesByName(string $name): array
    {
        $sql = "SELECT * FROM " . PREFIXE . "priorirty WHERE NAME = :name";

        $statement = $this->DB->prepare($sql);

        $statement->bindParam(':name', $name);

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function CreateThisPriority(Priority $priority): bool
    {
        $sql = "INSERT INTO " . PREFIXE . "priority (ID, NAME) VALUES (:ID, :NAME)";

        $statement = $this->DB->prepare($sql);

        $retour = $statement->execute([
            ':ID' => $priority->getId(),
            ':NAME' => $priority->getName()
        ]);

        return $retour;
    }

    public function updateThisPriority(Priority $priority): bool
    {
        $sql = "UPDATE " . PREFIXE . "priority 
            SET
              NOM = :NOM,
            WHERE ID = :ID";

        $statement = $this->DB->prepare($sql);

        $retour = $statement->execute([
            ':ID' => $priority->getId(),
            ':NOM' => $priority->getName()
        ]);

        return $retour;
    }

    public function deleteThisPriority(int $ID): bool
    {
        try {
            $sql = "DELETE FROM " . PREFIXE . "priority WHERE ID = :ID;";

            $statement = $this->DB->prepare($sql);

            return $statement->execute([':ID' => $ID]);
        } catch (PDOException $error) {
            echo "Erreur de suppression : " . $error->getMessage();
            return FALSE;
        }
    }
}

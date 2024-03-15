<?php

namespace src\Repositories;

use src\Models\Database;
use src\Models\Task;
use PDO;
use PDOException;

class TaskRepository
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
    public function getAllTasks()
    {
        $sql = "SELECT * FROM " . PREFIXE . "task;";

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

    public function getThisTaskById($id): object
    {
        $sql = "SELECT * FROM " . PREFIXE . "task WHERE id = :id";

        $statement = $this->DB->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();

        $retour = $statement->fetch(PDO::FETCH_OBJ);

        return $retour;
    }
    // Construire la méthode getThoseTasksByTitle()

    public function getThoseTasksByTitle(string $title): array
    {
        $sql = "SELECT * FROM " . PREFIXE . "task WHERE TITLE = :title";

        $statement = $this->DB->prepare($sql);

        $statement->bindParam(':title', $title);

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);
    }
    // Construire la méthode CreateThisTask()

    public function CreateThisTask(Task $task): bool
    {
        $sql = "INSERT INTO " . PREFIXE . "task (ID, TITLE, DESCRIPTION, DATE, ID_USER, ID_PRIORITY) VALUES (:ID, :TITLE, :DESCRIPTION, :DATE, :ID_USER, :ID_PRIORITY)";

        $statement = $this->DB->prepare($sql);

        $retour = $statement->execute([
            ':ID' => $task->getId(),
            ':TITLE' => $task->getTitle(),
            ':DESCRIPTION' => $task->getDescription(),
            ':DATE' => $task->getDate(),
            ':ID_USER' => $task->getIdUser(),
            ':ID_PRIORITY' => $task->getIdPriority()
        ]);

        return $retour;
    }

    // Construire la méthode updateThisTask()
    public function updateThisTask(Task $task): bool
    {
        $sql = "UPDATE " . PREFIXE . "task 
            SET
              NOM = :NOM,
              TITLE = :TITLE,
              DESCRIPTION = :DESCRIPTION,
              DATE = :DATE
            WHERE ID = :ID";

        $statement = $this->DB->prepare($sql);

        $retour = $statement->execute([
            ':ID' => $task->getId(),
            ':TITLE' => $task->getTitle(),
            ':DESCRIPTION' => $task->getDescription(),
            ':DATE' => $task->getDate()
        ]);

        return $retour;
    }

    // Construire la méthode deleteThisTask()
    public function deleteThisTask(int $ID): bool
    {
        try {
            $sql = "DELETE FROM " . PREFIXE . "task WHERE ID = :ID;";

            $statement = $this->DB->prepare($sql);

            return $statement->execute([':ID' => $ID]);
        } catch (PDOException $error) {
            echo "Erreur de suppression : " . $error->getMessage();
            return FALSE;
        }
    }
}

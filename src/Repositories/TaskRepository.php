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

    public function getAllTasks()
    {
        $sql = "SELECT * FROM " . PREFIXE . "task;";

        $retour = $this->DB->query($sql)->fetchAll(PDO::FETCH_OBJ);

        return $retour;
    }

    public function getThisTaskById($id): object
    {
        $sql = "SELECT * FROM " . PREFIXE . "task WHERE id = :id";

        $statement = $this->DB->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();

        $retour = $statement->fetch(PDO::FETCH_OBJ);

        return $retour;
    }

    public function getThoseTasksByTitle(string $title): array
    {
        $sql = "SELECT * FROM " . PREFIXE . "task WHERE TITLE = :title";

        $statement = $this->DB->prepare($sql);

        $statement->bindParam(':title', $title);

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

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

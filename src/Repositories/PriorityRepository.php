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

    // Exemple d'une requête avec query :
    // il n'y a pas de risques, car aucun paramètre venant de l'extérieur n'est demandé dans le sql.
    public function getAllPriorities()
    {
        $sql = "SELECT * FROM " . PREFIXE . "priority;";

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

    public function getThisPriorityById($id): object
    {
        $sql = "SELECT * FROM " . PREFIXE . "priority WHERE id = :id";

        $statement = $this->DB->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();

        $retour = $statement->fetch(PDO::FETCH_OBJ);

        return $retour;
    }
    // Construire la méthode getThosePrioritiesByName()

    public function getThosePrioritiesByName(string $name): array
    {
        $sql = "SELECT * FROM " . PREFIXE . "priorirty WHERE NAME = :name";

        $statement = $this->DB->prepare($sql);

        $statement->bindParam(':name', $name);

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);
    }
    // Construire la méthode CreateThisPriority()

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

    // Construire la méthode updateThisPriority()
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

    // Construire la méthode deleteThisFilm()
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
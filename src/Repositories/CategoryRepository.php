<?php
namespace src\Repositories;

use src\Models\Database;
use src\Models\Category;
use PDO;
use PDOException;

class CategoryRepository
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
    public function getAllCategories()
    {
        $sql = "SELECT * FROM " . PREFIXE . "category;";

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

    public function getThisCategoryById($id): object
    {
        $sql = "SELECT * FROM " . PREFIXE . "category WHERE id = :id";

        $statement = $this->DB->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();

        $retour = $statement->fetch(PDO::FETCH_OBJ);

        return $retour;
    }
    // Construire la méthode getThoseCategoriesByName() Et oui, parce qu'on peut avoir plusieurs films avec le même nom !
    // Bien penser à préfixer vos tables ;)

    public function getThoseCategoriesByName(string $name): array
    {
        $sql = "SELECT * FROM " . PREFIXE . "category WHERE NAME = :name";

        $statement = $this->DB->prepare($sql);

        $statement->bindParam(':name', $name);

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);
    }
    // Construire la méthode CreateThisCategory()

    public function CreateThisCategory(Category $category): bool
    {
        $sql = "INSERT INTO " . PREFIXE . "category (ID, NOM) VALUES (:ID, :NOM)";

        $statement = $this->DB->prepare($sql);

        $retour = $statement->execute([
            ':ID' => $category->getId(),
            ':NOM' => $category->getName()
        ]);

        return $retour;
    }

    // Construire la méthode updateThisCategory()
    public function updateThisCategory(Category $category): bool
    {
        $sql = "UPDATE " . PREFIXE . "category 
            SET
              NOM = :NOM,
            WHERE ID = :ID";

        $statement = $this->DB->prepare($sql);

        $retour = $statement->execute([
            ':ID' => $category->getId(),
            ':NOM' => $category->getName()
        ]);

        return $retour;
    }

    // Construire la méthode deleteThisCategory()
    public function deleteThisCategory(int $ID): bool
    {
        try {
            $sql = "DELETE FROM " . PREFIXE . "task_has_category WHERE ID_CATEGORIY = :ID;
            DELETE FROM " . PREFIXE . "category WHERE ID = :ID;";

            $statement = $this->DB->prepare($sql);

            return $statement->execute([':ID' => $ID]);
        } catch (PDOException $error) {
            echo "Erreur de suppression : " . $error->getMessage();
            return FALSE;
        }
    }
}

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


    public function getAllCategories()
    {
        $sql = "SELECT * FROM " . PREFIXE . "category;";

        $retour = $this->DB->query($sql)->fetchAll(PDO::FETCH_OBJ);

        return $retour;
    }

    public function getThisCategoryById($id): Category
    {
        $sql = "SELECT * FROM " . PREFIXE . "category WHERE id = :id";

        $statement = $this->DB->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();

        $retour = $statement->fetch(PDO::FETCH_CLASS, Category::class);

        return $retour;
    }
    // Construire la méthode getThoseCategoriesByName() Et oui, parce qu'on peut avoir plusieurs films avec le même nom !
    // Bien penser à préfixer vos tables ;)

    public function getThisCategoryByName(string $name): array
    {
        $sql = "SELECT * FROM " . PREFIXE . "category WHERE NAME = :name";

        $statement = $this->DB->prepare($sql);

        $statement->bindParam(':name', $name);

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    // Construire la méthode CreateThisCategory()

    public function CreateThisCategory(Category $category): bool
    {
        $sql = "INSERT INTO " . PREFIXE . "category (NOM) VALUES (:NOM)";

        $statement = $this->DB->prepare($sql);

        $retour = $statement->execute([
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

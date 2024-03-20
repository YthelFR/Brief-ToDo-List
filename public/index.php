<?php
session_start();

$Messages_Erreurs = null;

if (isset($_GET['erreur'])) {
    $Messages_Erreurs = (int) $_GET['erreur'];
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/../assets/css/style.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <title>ToDo Liste</title>
</head>
<?php include_once __DIR__ . '/../src/Includes/header.php'; ?>
<main id="home" class="flex flex-row pt-12">
    <?php include_once __DIR__ . '/../src/Includes/navbar.php'; ?>

    <?php include_once __DIR__ . '/../src/Includes/form.php'; ?>
    <?php include_once __DIR__ . '/../src/Includes/tasks.php'; ?>


    </div>
    </div>
    <?php include_once __DIR__ . '/../src/Includes/connexion.php'; ?>
    <?php include_once __DIR__ . '/../src/Includes/Register.php'; ?>

</main>
<?php include_once __DIR__ . '/../src/Includes/footer.php';
?>
</body>
<script src="https://cdn.tailwindcss.com"></script>
<script src="./assets/js/script.js" type="module"></script>
<script src="./assets/js/darkmode.js"></script>

</html>
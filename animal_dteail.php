<?php
session_start();
require 'config.php';

$animal_id = $_GET['id'];
$animal = $pdo->prepare("SELECT * FROM animals WHERE id = ?");
$animal->execute([$animal_id]);
$animal = $animal->fetch();

// Incrémenter le compteur de consultation dans MongoDB
$mongoDB->animal_statistics->updateOne(
    ['animal_id' => $animal_id],
    ['$inc' => ['consultations' => 1]],
    ['upsert' => true]
);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($animal['name']) ?> - Détails</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?php include 'menu.html'; ?>

    <div class="container">
        <header class="mt-4">
            <h1><?= htmlspecialchars($animal['name']) ?></h1>
        </header>
        <section class="mt-5">
            <img src="<?= htmlspecialchars($animal['image']) ?>" alt="<?= htmlspecialchars($animal['name']) ?>"
                class="img-fluid">
            <h2>Espèce: <?= htmlspecialchars($animal['species']) ?></h2>
            <p>Habitat: <?= htmlspecialchars($animal['habitat_id']) ?></p>
        </section>
    </div>

    <footer class="mt-5 text-center">
        <p>&copy; 2024 Zoo Arcadia</p>
    </footer>
</body>

</html>
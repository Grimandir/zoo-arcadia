<?php
require '../config.php'; // Inclure la configuration de la base de données

// Vérifier si l'ID de l'animal est passé en paramètre GET
if (!isset($_GET['animal_id']) || empty($_GET['animal_id'])) {
    die("Animal non spécifié !");
}

$animal_id = intval($_GET['animal_id']);

// Récupérer les détails de l'animal
$stmt = $pdo->prepare("SELECT * FROM animals WHERE id = ?");
$stmt->execute([$animal_id]);
$animal = $stmt->fetch();

if (!$animal) {
    die("Animal non trouvé !");
}

// Récupérer les rapports vétérinaires pour cet animal
$stmt = $pdo->prepare("SELECT * FROM vet_reports WHERE animal_id = ?");
$stmt->execute([$animal_id]);
$reports = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($animal['name']) ?> - Détails</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <header>
        <h1>Animal : <?= htmlspecialchars($animal['name']) ?></h1>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="../images/<?= htmlspecialchars($animal['image']) ?>" class="img-fluid"
                    alt="<?= htmlspecialchars($animal['name']) ?>">
            </div>
            <div class="col-md-6">
                <h2><?= htmlspecialchars($animal['name']) ?></h2>
                <p>Espèce : <?= htmlspecialchars($animal['species']) ?></p>
                <p>Habitat : <?= htmlspecialchars($animal['habitat_id']) ?></p>
                <h3>Rapports vétérinaires</h3>
                <?php foreach ($reports as $report) : ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Visite du <?= htmlspecialchars($report['visit_date']) ?></h5>
                        <p class="card-text">État : <?= htmlspecialchars($report['status']) ?></p>
                        <p class="card-text">Nourriture : <?= htmlspecialchars($report['food']) ?>
                            (<?= htmlspecialchars($report['food_amount']) ?>g)</p>
                        <p class="card-text">Détails : <?= htmlspecialchars($report['visit_details']) ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="../assets/js/script.js"></script>
</body>

</html>
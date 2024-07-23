<?php
require '../config.php'; // Inclure la configuration de la base de données

// Vérifier si l'ID de l'habitat est passé en paramètre GET
if (!isset($_GET['habitat_id']) || empty($_GET['habitat_id'])) {
    die("Habitat non spécifié !");
}

$habitat_id = intval($_GET['habitat_id']);

// Récupérer les détails de l'habitat
$stmt = $pdo->prepare("SELECT * FROM habitats WHERE id = ?");
$stmt->execute([$habitat_id]);
$habitat = $stmt->fetch();

if (!$habitat) {
    die("Habitat non trouvé !");
}

// Récupérer les animaux de cet habitat
$stmt = $pdo->prepare("SELECT * FROM animals WHERE habitat_id = ?");
$stmt->execute([$habitat_id]);
$animals = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($habitat['name']) ?> - Détails</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <header>
        <h1>Habitat : <?= htmlspecialchars($habitat['name']) ?></h1>
    </header>
    <div class="container">
        <div class="row">
            <?php foreach ($animals as $animal) : ?>
                <div class="col-md-4">
                    <div class="card img-hover-zoom">
                        <img src="../assets/images/<?= htmlspecialchars($animal['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($animal['name']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($animal['name']) ?></h5>
                            <p class="card-text"><?= htmlspecialchars($animal['species']) ?></p>
                            <a href="animal_detail.php?animal_id=<?= $animal['id'] ?>" class="btn btn-custom">Voir les
                                détails</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../assets/js/script.js"></script>
</body>

</html>
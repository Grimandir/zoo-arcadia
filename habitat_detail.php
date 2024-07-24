<?php
require '../config.php';

if (isset($_GET['habitat'])) {
    $habitat_id = $_GET['habitat'];

    // Récupérer les informations de l'habitat
    $stmt = $pdo->prepare("SELECT * FROM habitats WHERE id = ?");
    $stmt->execute([$habitat_id]);
    $habitat = $stmt->fetch(PDO::FETCH_ASSOC);

    // Récupérer les animaux de cet habitat
    $stmt = $pdo->prepare("SELECT * FROM animals WHERE habitat_id = ?");
    $stmt->execute([$habitat_id]);
    $animals = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    echo "Habitat non spécifié.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($habitat['name']); ?> - Zoo Arcadia</title>
    <link rel="stylesheet" href="../https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Zoo Arcadia</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../services.php">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Habitats</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../avis.php">Avis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../connexion.php">Connexion</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h1><?php echo htmlspecialchars($habitat['name']); ?></h1>
        <p><?php echo htmlspecialchars($habitat['description']); ?></p>

        <h2>Animaux</h2>
        <div class="row">
            <?php foreach ($animals as $animal) : ?>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="../assets/images/<?php echo htmlspecialchars($animal['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($animal['name']); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($animal['name']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($animal['species']); ?></p>
                            <a href="../animal_detail.php?animal_id=<?php echo htmlspecialchars($animal['id']); ?>" class="btn btn-primary">Voir les détails</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.amazonaws.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../assets/js/script.js"></script>
</body>

</html>
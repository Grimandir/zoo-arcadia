<?php
require 'config.php';

// Récupérer les habitats
$habitats = $pdo->query("SELECT * FROM habitats")->fetchAll(PDO::FETCH_ASSOC);

// Récupérer les services
$services = $pdo->query("SELECT * FROM services")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Arcadia - Accueil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Zoo Arcadia</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="services.php">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="habitats/index.php">Habitats</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="avis.php">Avis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="connexion.php">Connexion</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Bienvenue au Zoo Arcadia</h1>
        <p>Découvrez nos habitats et nos animaux.</p>

        <h2>Habitats</h2>
        <div class="row">
            <?php foreach ($habitats as $habitat) : ?>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="assets/images/<?php echo htmlspecialchars($habitat['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($habitat['name']); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($habitat['name']); ?></h5>
                            <a href="habitats/habitat_detail.php?habitat=<?php echo htmlspecialchars($habitat['id']); ?>" class="btn btn-primary">Découvrir</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <h2>Services</h2>
        <div class="row">
            <?php foreach ($services as $service) : ?>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="assets/images/<?php echo htmlspecialchars($service['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($service['name']); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($service['name']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($service['description']); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>
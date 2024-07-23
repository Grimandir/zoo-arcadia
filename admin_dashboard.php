<?php
session_start();
require 'config.php';
redirectIfNotAdmin();

$statistics = $mongoDB->animal_statistics->find()->toArray();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Zoo Arcadia</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../assets/js/script.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../habitats/index.html">Zoo
            Arcadia</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../habitats/index.html">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../services.html">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../habitats.html">Habitats</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../avis.html">Avis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../contact.html">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../connexion.html">Connexion</a>
                </li>
                <?php if (isAdmin()) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin_dashboard.php">Dashboard</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <div class="container">
        <header class="mt-4">
            <h1>Dashboard des Consultations</h1>
        </header>
        <section class="mt-5">
            <table class="table">
                <thead>
                    <tr>
                        <th>Animal</th>
                        <th>Nombre de Consultations</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($statistics as $stat) : ?>
                        <?php
                        // Récupérer les détails de l'animal depuis MySQL
                        $animal = $pdo->prepare("SELECT name FROM animals WHERE id = ?");
                        $animal->execute([$stat['animal_id']]);
                        $animal = $animal->fetch();
                        ?>
                        <tr>
                            <td><?= htmlspecialchars($animal['name']) ?></td>
                            <td><?= htmlspecialchars($stat['consultations']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </div>

    <footer class="mt-5 text-center">
        <p>&copy; 2024 Zoo Arcadia</p>
    </footer>
</body>

</html>
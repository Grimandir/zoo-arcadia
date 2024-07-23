<?php
require 'config.php'; // Inclure la configuration de la base de données
session_start();

// Vérifier si l'utilisateur est connecté en tant qu'administrateur
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != 'admin') {
    header('Location: connexion.html');
    exit;
}

// Ajouter les fonctions pour gérer les services, habitats et animaux
function getServices($pdo)
{
    $stmt = $pdo->query("SELECT * FROM services");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getHabitats($pdo)
{
    $stmt = $pdo->query("SELECT * FROM habitats");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getAnimals($pdo)
{
    $stmt = $pdo->query("SELECT * FROM animals");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$services = getServices($pdo);
$habitats = getHabitats($pdo);
$animals = getAnimals($pdo);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - Administration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Zoo Arcadia</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="services.html">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="habitats/index.html">Habitats</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="avis.html">Avis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="connexion.html">Connexion</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Contenu principal -->
    <div class="container mt-4">
        <h1>Tableau de bord de l'administrateur</h1>

        <!-- Services -->
        <section>
            <h2>Gestion des services</h2>
            <a href="admin/add_service.php" class="btn btn-success mb-2">Ajouter un service</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($services as $service) : ?>
                        <tr>
                            <td><?= htmlspecialchars($service['id']) ?></td>
                            <td><?= htmlspecialchars($service['name']) ?></td>
                            <td><?= htmlspecialchars($service['description']) ?></td>
                            <td>
                                <a href="admin/edit_service.php?id=<?= $service['id'] ?>" class="btn btn-primary">Modifier</a>
                                <a href="admin/delete_service.php?id=<?= $service['id'] ?>" class="btn btn-danger">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <!-- Habitats -->
        <section>
            <h2>Gestion des habitats</h2>
            <a href="admin/add_habitat.php" class="btn btn-success mb-2">Ajouter un habitat</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($habitats as $habitat) : ?>
                        <tr>
                            <td><?= htmlspecialchars($habitat['id']) ?></td>
                            <td><?= htmlspecialchars($habitat['name']) ?></td>
                            <td><?= htmlspecialchars($habitat['description']) ?></td>
                            <td>
                                <a href="admin/edit_habitat.php?id=<?= $habitat['id'] ?>" class="btn btn-primary">Modifier</a>
                                <a href="admin/delete_habitat.php?id=<?= $habitat['id'] ?>" class="btn btn-danger">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <!-- Animaux -->
        <section>
            <h2>Gestion des animaux</h2>
            <a href="admin/add_animal.php" class="btn btn-success mb-2">Ajouter un animal</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Espèce</th>
                        <th>Habitat</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($animals as $animal) : ?>
                        <tr>
                            <td><?= htmlspecialchars($animal['id']) ?></td>
                            <td><?= htmlspecialchars($animal['name']) ?></td>
                            <td><?= htmlspecialchars($animal['species']) ?></td>
                            <td><?= htmlspecialchars($animal['habitat_id']) ?></td>
                            <td>
                                <a href="admin/edit_animal.php?id=<?= $animal['id'] ?>" class="btn btn-primary">Modifier</a>
                                <a href="admin/delete_animal.php?id=<?= $animal['id'] ?>" class="btn btn-danger">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>
<?php
session_start();

// Vérifiez si l'utilisateur est connecté et est un administrateur
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: connexion.html');
    exit;
}

// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=zoo_arcadia', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Récupérer les services, habitats et animaux
$services = $pdo->query("SELECT * FROM services")->fetchAll(PDO::FETCH_ASSOC);
$habitats = $pdo->query("SELECT * FROM habitats")->fetchAll(PDO::FETCH_ASSOC);
$animals = $pdo->query("SELECT * FROM animals")->fetchAll(PDO::FETCH_ASSOC);

// Récupérer les statistiques
$stmt = $pdo->query("SELECT animal_id, COUNT(*) as views FROM animal_views GROUP BY animal_id");
$animalViews = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Zoo Arcadia</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Zoo Arcadia - Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="admin.php">Accueil</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="admin_dashboard.php">Dashboard <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Déconnexion</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Dashboard Administrateur</h1>

        <h2>Gestion des Services</h2>
        <a href="add_service.php" class="btn btn-success mb-2">Ajouter un Service</a>
        <table class="table table-striped">
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
                        <td><?php echo htmlspecialchars($service['id']); ?></td>
                        <td><?php echo htmlspecialchars($service['name']); ?></td>
                        <td><?php echo htmlspecialchars($service['description']); ?></td>
                        <td>
                            <a href="edit_service.php?id=<?php echo htmlspecialchars($service['id']); ?>" class="btn btn-primary btn-sm">Modifier</a>
                            <a href="delete_service.php?id=<?php echo htmlspecialchars($service['id']); ?>" class="btn btn-danger btn-sm">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Gestion des Habitats</h2>
        <a href="add_habitat.php" class="btn btn-success mb-2">Ajouter un Habitat</a>
        <table class="table table-striped">
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
                        <td><?php echo htmlspecialchars($habitat['id']); ?></td>
                        <td><?php echo htmlspecialchars($habitat['name']); ?></td>
                        <td><?php echo htmlspecialchars($habitat['description']); ?></td>
                        <td>
                            <a href="edit_habitat.php?id=<?php echo htmlspecialchars($habitat['id']); ?>" class="btn btn-primary btn-sm">Modifier</a>
                            <a href="delete_habitat.php?id=<?php echo htmlspecialchars($habitat['id']); ?>" class="btn btn-danger btn-sm">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Gestion des Animaux</h2>
        <a href="add_animal.php" class="btn btn-success mb-2">Ajouter un Animal</a>
        <table class="table table-striped">
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
                        <td><?php echo htmlspecialchars($animal['id']); ?></td>
                        <td><?php echo htmlspecialchars($animal['name']); ?></td>
                        <td><?php echo htmlspecialchars($animal['species']); ?></td>
                        <td><?php echo htmlspecialchars($animal['habitat_id']); ?></td>
                        <td>
                            <a href="edit_animal.php?id=<?php echo htmlspecialchars($animal['id']); ?>" class="btn btn-primary btn-sm">Modifier</a>
                            <a href="delete_animal.php?id=<?php echo htmlspecialchars($animal['id']); ?>" class="btn btn-danger btn-sm">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Statistiques des Consultations des Animaux</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Animal ID</th>
                    <th>Nombre de consultations</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($animalViews as $view) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($view['animal_id']); ?></td>
                        <td><?php echo htmlspecialchars($view['views']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../assets/js/script.js"></script>
</body>

</html>
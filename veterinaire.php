<?php
session_start();
require 'config.php';
redirectIfNotVeterinaire();

$vet_id = $_SESSION['user_id'];
$animals = $pdo->query("SELECT * FROM animals")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $animal_id = $_POST['animal_id'];
    $status = $_POST['status'];
    $food = $_POST['food'];
    $food_amount = $_POST['food_amount'];
    $visit_date = $_POST['visit_date'];
    $visit_details = $_POST['visit_details'];

    $stmt = $pdo->prepare("INSERT INTO vet_reports (animal_id, vet_id, status, food, food_amount, visit_date, visit_details) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$animal_id, $vet_id, $status, $food, $food_amount, $visit_date, $visit_details]);

    $message = "Compte-rendu ajouté avec succès";
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vétérinaire - Zoo Arcadia</title>
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
            <h1>Espace Vétérinaire</h1>
        </header>
        <section class="mt-5">
            <p>Bienvenue, <?= htmlspecialchars($_SESSION['username']) ?>.</p>

            <?php if (!empty($message)) : ?>
                <div class="alert alert-success"><?= htmlspecialchars($message) ?></div>
            <?php endif; ?>

            <h2>Ajouter un Compte-Rendu</h2>
            <form action="veterinaire.php" method="post" class="mb-4">
                <div class="form-group">
                    <label for="animal_id">Animal</label>
                    <select class="form-control" id="animal_id" name="animal_id" required>
                        <?php foreach ($animals as $animal) : ?>
                            <option value="<?= $animal['id'] ?>"><?= htmlspecialchars($animal['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">État de l'animal</label>
                    <textarea class="form-control" id="status" name="status" required></textarea>
                </div>
                <div class="form-group">
                    <label for="food">Nourriture proposée</label>
                    <input type="text" class="form-control" id="food" name="food" required>
                </div>
                <div class="form-group">
                    <label for="food_amount">Grammage de la nourriture</label>
                    <input type="number" class="form-control" id="food_amount" name="food_amount" required>
                </div>
                <div class="form-group">
                    <label for="visit_date">Date de passage</label>
                    <input type="date" class="form-control" id="visit_date" name="visit_date" required>
                </div>
                <div class="form-group">
                    <label for="visit_details">Détail de l'état de l'animal</label>
                    <textarea class="form-control" id="visit_details" name="visit_details"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </section>
    </div>

    <footer class="mt-5 text-center">
        <p>&copy; 2024 Zoo Arcadia</p>
    </footer>
</body>

</html>


</html>
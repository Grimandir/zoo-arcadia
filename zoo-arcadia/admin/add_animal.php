<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: ../connexion.html');
    exit;
}

require '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $species = $_POST['species'];
    $habitat_id = $_POST['habitat_id'];
    $image = $_POST['image'];
    $stmt = $pdo->prepare("INSERT INTO animals (name, species, habitat_id, image) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $species, $habitat_id, $image]);
    header('Location: ../admin.php');
    exit;
}

// Récupérer les habitats pour le formulaire d'ajout d'animal
$habitats = $pdo->query("SELECT * FROM habitats")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Animal - Zoo Arcadia</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <?php include '../menu.html'; ?>

    <div class="container">
        <header class="mt-4">
            <h1>Ajouter Animal</h1>
        </header>
        <section class="mt-5">
            <form action="add_animal.php" method="post">
                <div class="form-group">
                    <label for="name">Nom de l'animal</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="species">Espèce</label>
                    <input type="text" class="form-control" id="species" name="species" required>
                </div>
                <div class="form-group">
                    <label for="habitat_id">Habitat</label>
                    <select class="form-control" id="habitat_id" name="habitat_id" required>
                        <?php foreach ($habitats as $habitat): ?>
                        <option value="<?= $habitat['id'] ?>"><?= htmlspecialchars($habitat['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Image (URL)</label>
                    <input type="text" class="form-control" id="image" name="image" required>
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
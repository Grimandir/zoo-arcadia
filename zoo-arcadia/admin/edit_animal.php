<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: ../connexion.html');
    exit;
}

require '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $species = $_POST['species'];
    $habitat_id = $_POST['habitat_id'];
    $image = $_POST['image'];
    $stmt = $pdo->prepare("UPDATE animals SET name = ?, species = ?, habitat_id = ?, image = ? WHERE id = ?");
    $stmt->execute([$name, $species, $habitat_id, $image, $id]);
    header('Location: ../admin.php');
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM animals WHERE id = ?");
$stmt->execute([$id]);
$animal = $stmt->fetch();

// Récupérer les habitats pour le formulaire d'édition d'animal
$habitats = $pdo->query("SELECT * FROM habitats")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Animal - Zoo Arcadia</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <?php include '../menu.html'; ?>

    <div class="container">
        <header class="mt-4">
            <h1>Modifier Animal</h1>
        </header>
        <section class="mt-5">
            <form action="edit_animal.php" method="post">
                <input type="hidden" name="id" value="<?= htmlspecialchars($animal['id']) ?>">
                <div class="form-group">
                    <label for="name">Nom de l'animal</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($animal['name']) ?>" required>
                </div>
                <div class="form-group">
                    <label for="species">Espèce</label>
                    <input type="text" class="form-control" id="species" name="species" value="<?= htmlspecialchars($animal['species']) ?>" required>
                </div>
                <div class="form-group">
                    <label for="habitat_id">Habitat</label>
                    <select class="form-control" id="habitat_id" name="habitat_id" required>
                        <?php foreach ($habitats as $habitat) : ?>
                            <option value="<?= $habitat['id'] ?>" <?= $habitat['id'] == $animal['habitat_id'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($habitat['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Image (URL)</label>
                    <input type="text" class="form-control" id="image" name="image" value="<?= htmlspecialchars($animal['image']) ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Modifier</button>
            </form>
        </section>
    </div>

    <footer class="mt-5 text-center">
        <p>&copy; 2024 Zoo Arcadia</p>
    </footer>
</body>

</html>
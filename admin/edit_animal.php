<?php
require '../config.php';

if (!isset($_GET['id'])) {
    header('Location: ../admin_dashboard.php');
    exit;
}

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $species = $_POST['species'];
    $habitat_id = $_POST['habitat_id'];

    $stmt = $pdo->prepare("UPDATE animals SET name = ?, species = ?, habitat_id = ? WHERE id = ?");
    $stmt->execute([$name, $species, $habitat_id, $id]);

    header('Location: ../admin_dashboard.php');
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM animals WHERE id = ?");
$stmt->execute([$id]);
$animal = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $pdo->query("SELECT * FROM habitats");
$habitats = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (!$animal) {
    header('Location: ../admin_dashboard.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un animal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <div class="container mt-4">
        <h1>Modifier un animal</h1>
        <form action="edit_animal.php?id=<?= $id ?>" method="post">
            <div class="form-group">
                <label for="name">Nom :</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($animal['name']) ?>" required>
            </div>
            <div class="form-group">
                <label for="species">Espèce :</label>
                <input type="text" class="form-control" id="species" name="species" value="<?= htmlspecialchars($animal['species']) ?>" required>
            </div>
            <div class="form-group">
                <label for="habitat_id">Habitat :</label>
                <select class="form-control" id="habitat_id" name="habitat_id" required>
                    <?php foreach ($habitats as $habitat) : ?>
                        <option value="<?= htmlspecialchars($habitat['id']) ?>" <?= $animal['habitat_id'] == $habitat['id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($habitat['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
</body>

</html>
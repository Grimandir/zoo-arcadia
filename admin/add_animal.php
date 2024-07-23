<?php
require '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $species = $_POST['species'];
    $habitat_id = $_POST['habitat_id'];

    $stmt = $pdo->prepare("INSERT INTO animals (name, species, habitat_id) VALUES (?, ?, ?)");
    $stmt->execute([$name, $species, $habitat_id]);

    header('Location: ../admin_dashboard.php');
    exit;
}

$stmt = $pdo->query("SELECT * FROM habitats");
$habitats = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un animal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <div class="container mt-4">
        <h1>Ajouter un animal</h1>
        <form action="add_animal.php" method="post">
            <div class="form-group">
                <label for="name">Nom :</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="species">Espèce :</label>
                <input type="text" class="form-control" id="species" name="species" required>
            </div>
            <div class="form-group">
                <label for="habitat_id">Habitat :</label>
                <select class="form-control" id="habitat_id" name="habitat_id" required>
                    <?php foreach ($habitats as $habitat) : ?>
                        <option value="<?= htmlspecialchars($habitat['id']) ?>"><?= htmlspecialchars($habitat['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Ajouter</button>
        </form>
    </div>
</body>

</html>
<?php
require '../config.php';

if (!isset($_GET['id'])) {
    header('Location: ../admin_dashboard.php');
    exit;
}

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];

    $stmt = $pdo->prepare("UPDATE habitats SET name = ?, description = ? WHERE id = ?");
    $stmt->execute([$name, $description, $id]);

    header('Location: ../admin_dashboard.php');
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM habitats WHERE id = ?");
$stmt->execute([$id]);
$habitat = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$habitat) {
    header('Location: ../admin_dashboard.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un habitat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <div class="container mt-4">
        <h1>Modifier un habitat</h1>
        <form action="edit_habitat.php?id=<?= $id ?>" method="post">
            <div class="form-group">
                <label for="name">Nom :</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="<?= htmlspecialchars($habitat['name']) ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description :</label>
                <textarea class="form-control" id="description" name="description" rows="4"
                    required><?= htmlspecialchars($habitat['description']) ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
</body>

</html>
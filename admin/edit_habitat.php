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
    $description = $_POST['description'];
    $image = $_POST['image'];
    $stmt = $pdo->prepare("UPDATE habitats SET name = ?, description = ?, image = ? WHERE id = ?");
    $stmt->execute([$name, $description, $image, $id]);
    header('Location: ../admin.php');
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM habitats WHERE id = ?");
$stmt->execute([$id]);
$habitat = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Habitat - Zoo Arcadia</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <?php include '../menu.html'; ?>

    <div class="container">
        <header class="mt-4">
            <h1>Modifier Habitat</h1>
        </header>
        <section class="mt-5">
            <form action="edit_habitat.php" method="post">
                <input type="hidden" name="id" value="<?= htmlspecialchars($habitat['id']) ?>">
                <div class="form-group">
                    <label for="name">Nom de l'habitat</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="<?= htmlspecialchars($habitat['name']) ?>" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description"
                        required><?= htmlspecialchars($habitat['description']) ?></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image (URL)</label>
                    <input type="text" class="form-control" id="image" name="image"
                        value="<?= htmlspecialchars($habitat['image']) ?>" required>
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
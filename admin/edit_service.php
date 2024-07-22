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
    $stmt = $pdo->prepare("UPDATE services SET name = ?, description = ? WHERE id = ?");
    $stmt->execute([$name, $description, $id]);
    header('Location: ../admin.php');
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM services WHERE id = ?");
$stmt->execute([$id]);
$service = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Service - Zoo Arcadia</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <?php include '../menu.html'; ?>

    <div class="container">
        <header class="mt-4">
            <h1>Modifier Service</h1>
        </header>
        <section class="mt-5">
            <form action="edit_service.php" method="post">
                <input type="hidden" name="id" value="<?= htmlspecialchars($service['id']) ?>">
                <div class="form-group">
                    <label for="name">Nom du service</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="<?= htmlspecialchars($service['name']) ?>" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description"
                        required><?= htmlspecialchars($service['description']) ?></textarea>
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
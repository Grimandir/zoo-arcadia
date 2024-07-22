<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: ../connexion.html');
    exit;
}

require '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $stmt = $pdo->prepare("INSERT INTO services (name, description) VALUES (?, ?)");
    $stmt->execute([$name, $description]);
    header('Location: ../admin.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Service - Zoo Arcadia</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <?php include '../menu.html'; ?>

    <div class="container">
        <header class="mt-4">
            <h1>Ajouter Service</h1>
        </header>
        <section class="mt-5">
            <form action="add_service.php" method="post">
                <div class="form-group">
                    <label for="name">Nom du service</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" required></textarea>
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
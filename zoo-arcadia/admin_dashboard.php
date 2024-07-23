<?php
session_start();
require 'config.php';
redirectIfNotAdmin();

$statistics = $mongoDB->animal_statistics->find()->toArray();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Zoo Arcadia</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js"></script>
</head>

<body>
    <?php include 'menu.html'; ?>

    <div class="container">
        <header class="mt-4">
            <h1>Dashboard des Consultations</h1>
        </header>
        <section class="mt-5">
            <table class="table">
                <thead>
                    <tr>
                        <th>Animal</th>
                        <th>Nombre de Consultations</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($statistics as $stat) : ?>
                        <?php
                        // Récupérer les détails de l'animal depuis MySQL
                        $animal = $pdo->prepare("SELECT name FROM animals WHERE id = ?");
                        $animal->execute([$stat['animal_id']]);
                        $animal = $animal->fetch();
                        ?>
                        <tr>
                            <td><?= htmlspecialchars($animal['name']) ?></td>
                            <td><?= htmlspecialchars($stat['consultations']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </div>

    <footer class="mt-5 text-center">
        <p>&copy; 2024 Zoo Arcadia</p>
    </footer>
</body>

</html>
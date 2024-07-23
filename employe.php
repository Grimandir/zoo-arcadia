<?php
session_start();
require 'config.php';
redirectIfNotEmploye();

$animals = $pdo->query("SELECT * FROM animals")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $animal_id = $_POST['animal_id'];
    $food = $_POST['food'];
    $food_amount = $_POST['food_amount'];
    $feeding_date = $_POST['feeding_date'];

    $stmt = $pdo->prepare("INSERT INTO feeding_logs (animal_id, food, food_amount, feeding_date) VALUES (?, ?, ?, ?)");
    $stmt->execute([$animal_id, $food, $food_amount, $feeding_date]);

    $message = "Alimentation ajoutée avec succès";
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employé - Zoo Arcadia</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../assets/js/script.js"></script>
</head>

<body>


    <div class="container">
        <header class="mt-4">
            <h1>Espace Employé</h1>
        </header>
        <section class="mt-5">
            <p>Bienvenue, <?= htmlspecialchars($_SESSION['username']) ?>.</p>

            <?php if (!empty($message)) : ?>
                <div class="alert alert-success"><?= htmlspecialchars($message) ?></div>
            <?php endif; ?>

            <h2>Ajouter Alimentation pour un Animal</h2>
            <form action="employe.php" method="post" class="mb-4">
                <div class="form-group">
                    <label for="animal_id">Animal</label>
                    <select class="form-control" id="animal_id" name="animal_id" required>
                        <?php foreach ($animals as $animal) : ?>
                            <option value="<?= $animal['id'] ?>"><?= htmlspecialchars($animal['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="food">Nourriture</label>
                    <input type="text" class="form-control" id="food" name="food" required>
                </div>
                <div class="form-group">
                    <label for="food_amount">Quantité</label>
                    <input type="number" class="form-control" id="food_amount" name="food_amount" required>
                </div>
                <div class="form-group">
                    <label for="feeding_date">Date et Heure</label>
                    <input type="datetime-local" class="form-control" id="feeding_date" name="feeding_date" required>
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
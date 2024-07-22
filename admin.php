<?php
session_start();
require 'config.php';
redirectIfNotAdmin();

$services = $pdo->query("SELECT * FROM services")->fetchAll(PDO::FETCH_ASSOC);
$habitats = $pdo->query("SELECT * FROM habitats")->fetchAll(PDO::FETCH_ASSOC);
$animals = $pdo->query("SELECT * FROM animals")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Zoo Arcadia</title>
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
            <h1>Espace Administrateur</h1>
        </header>
        <section class="mt-5">
            <p>Bienvenue, <?= htmlspecialchars($_SESSION['username']) ?>.</p>

            <h2>Gérer les Services</h2>
            <button class="btn btn-primary mb-3" data-toggle="form" data-target="#form-add-service">Ajouter un
                Service</button>
            <form id="form-add-service" action="admin/add_service.php" method="post" class="mb-4">
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
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($services as $service): ?>
                    <tr>
                        <td><?= htmlspecialchars($service['name']) ?></td>
                        <td><?= htmlspecialchars($service['description']) ?></td>
                        <td>
                            <a href="admin/edit_service.php?id=<?= $service['id'] ?>"
                                class="btn btn-warning btn-sm">Modifier</a>
                            <a href="admin/delete_service.php?id=<?= $service['id'] ?>"
                                class="btn btn-danger btn-sm">Supprimer</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h2>Gérer les Habitats</h2>
            <button class="btn btn-primary mb-3" data-toggle="form" data-target="#form-add-habitat">Ajouter un
                Habitat</button>
            <form id="form-add-habitat" action="admin/add_habitat.php" method="post" class="mb-4">
                <div class="form-group">
                    <label for="name">Nom de l'habitat</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image (URL)</label>
                    <input type="text" class="form-control" id="image" name="image" required>
                </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($habitats as $habitat): ?>
                    <tr>
                        <td><?= htmlspecialchars($habitat['name']) ?></td>
                        <td><?= htmlspecialchars($habitat['description']) ?></td>
                        <td><img src="<?= htmlspecialchars($habitat['image']) ?>"
                                alt="<?= htmlspecialchars($habitat['name']) ?>" style="width: 100px;"></td>
                        <td>
                            <a href="admin/edit_habitat.php?id=<?= $habitat['id'] ?>"
                                class="btn btn-warning btn-sm">Modifier</a>
                            <a href="admin/delete_habitat.php?id=<?= $habitat['id'] ?>"
                                class="btn btn-danger btn-sm">Supprimer</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h2>Gérer les Animaux</h2>
            <button class="btn btn-primary mb-3" data-toggle="form" data-target="#form-add-animal">Ajouter un
                Animal</button>
            <form id="form-add-animal" action="admin/add_animal.php" method="post" class="mb-4">
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
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Espèce</th>
                        <th>Habitat</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($animals as $animal): ?>
                    <tr>
                        <td><?= htmlspecialchars($animal['name']) ?></td>
                        <td><?= htmlspecialchars($animal['species']) ?></td>
                        <td><?= htmlspecialchars($animal['habitat_id']) ?></td>
                        <td><img src="<?= htmlspecialchars($animal['image']) ?>"
                                alt="<?= htmlspecialchars($animal['name']) ?>" style="width: 100px;"></td>
                        <td>
                            <a href="admin/edit_animal.php?id=<?= $animal['id'] ?>"
                                class="btn btn-warning btn-sm">Modifier</a>
                            <a href="admin/delete_animal.php?id=<?= $animal['id'] ?>"
                                class="btn btn-danger btn-sm">Supprimer</a>
                        </td>
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
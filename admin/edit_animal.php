<?php
session_start();

if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: connexion.html');
    exit;
}

$pdo = new PDO('mysql:host=localhost;dbname=zoo_arcadia', 'root', '');
$habitats = $pdo->query("SELECT * FROM habitats")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $species = $_POST['species'];
    $habitat_id = $_POST['habitat_id'];

    $stmt = $pdo->prepare("UPDATE animals SET name = ?, species = ?, habitat_id = ? WHERE id = ?");
    $stmt->execute([$name, $species, $habitat_id, $id]);

    header('Location: admin_dashboard.php');
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM animals WHERE id = ?");
$stmt->execute([$id]);
$animal = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Animal - Zoo Arcadia</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Zoo Arcadia - Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="admin.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="edit_animal.php?id=<?php echo htmlspecialchars($id); ?>">Modifier Animal
                        <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Déconnexion</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Modifier un Animal</h1>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($animal['id']); ?>">
            <div class="form-group">
                <label for="name">Nom de l'Animal</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($animal['name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="species">Espèce</label>
                <input type="text" class="form-control" id="species" name="species" value="<?php echo htmlspecialchars($animal['species']); ?>" required>
            </div>
            <div class="form-group">
                <label for="habitat_id">Habitat</label>
                <select class="form-control" id="habitat_id" name="habitat_id" required>
                    <?php foreach ($habitats as $habitat) : ?>
                        <option value="<?php echo htmlspecialchars($habitat['id']); ?>" <?php if ($habitat['id'] == $animal['habitat_id']) echo 'selected'; ?>>
                            <?php echo htmlspecialchars($habitat['name']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.amazonaws.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../assets/js/script.js"></script>
</body>

</html>
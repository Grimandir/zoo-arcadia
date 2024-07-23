<?php
session_start();
require '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        switch ($user['role']) {
            case 'admin':
                header('Location: admin.php');
                break;
            case 'veterinaire':
                header('Location: veterinaire.php');
                break;
            case 'employe':
                header('Location: employe.php');
                break;
        }
        exit;
    } else {
        $error = "Nom d'utilisateur ou mot de passe incorrect";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Zoo Arcadia</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../habitats/index.html">Zoo
            Arcadia</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../habitats/index.html">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../services.html">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../habitats.html">Habitats</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../avis.html">Avis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../contact.html">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../connexion.html">Connexion</a>
                </li>
                <?php if (isAdmin()) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="../admin_dashboard.php">Dashboard</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <div class="container">
        <header class="mt-4">
            <h1>Connexion</h1>
        </header>
        <section id="connexion" class="mt-5">
            <?php if (!empty($error)) : ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="username">Email</label>
                    <input type="email" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Se connecter</button>
            </form>
        </section>
    </div>

    <footer class="mt-5 text-center">
        <p>&copy; 2024 Zoo Arcadia</p>
    </footer>
</body>

</html>


</html>
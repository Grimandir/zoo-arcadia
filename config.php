<?php
// Configuration de la base de données MySQL
define('DB_HOST', 'localhost');
define('DB_NAME', 'zoo_arcadia');
define('DB_USER', 'root');
define('DB_PASS', '');

// Connexion à MySQL avec PDO
try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Connexion à MongoDB
require 'vendor/autoload.php'; // Inclure l'autoload de Composer
$mongoClient = new MongoDB\Client("mongodb://localhost:27017");
$mongoDB = $mongoClient->zoo_arcadia;

// Fonction pour sécuriser les données des formulaires
function sanitizeInput($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}

// Fonction pour vérifier si l'utilisateur est connecté
function isLoggedIn()
{
    return isset($_SESSION['user_id']);
}

// Fonction pour vérifier si l'utilisateur est administrateur
function isAdmin()
{
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}

// Fonction pour vérifier si l'utilisateur est vétérinaire
function isVeterinaire()
{
    return isset($_SESSION['role']) && $_SESSION['role'] === 'veterinaire';
}

// Fonction pour vérifier si l'utilisateur est employé
function isEmploye()
{
    return isset($_SESSION['role']) && $_SESSION['role'] === 'employe';
}

// Fonction pour rediriger les utilisateurs non connectés
function redirectIfNotLoggedIn($redirectUrl = 'connexion.html')
{
    if (!isLoggedIn()) {
        header("Location: $redirectUrl");
        exit;
    }
}

// Fonction pour rediriger les utilisateurs non administrateurs
function redirectIfNotAdmin($redirectUrl = 'connexion.html')
{
    if (!isAdmin()) {
        header("Location: $redirectUrl");
        exit;
    }
}

// Fonction pour rediriger les utilisateurs non vétérinaires
function redirectIfNotVeterinaire($redirectUrl = 'connexion.html')
{
    if (!isVeterinaire()) {
        header("Location: $redirectUrl");
        exit;
    }
}

// Fonction pour rediriger les utilisateurs non employés
function redirectIfNotEmploye($redirectUrl = 'connexion.html')
{
    if (!isEmploye()) {
        header("Location: $redirectUrl");
        exit;
    }
}

// Démarrer la session si elle n'est pas déjà démarrée
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

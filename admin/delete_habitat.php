<?php
session_start();

if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: connexion.html');
    exit;
}

$pdo = new PDO('mysql:host=localhost;dbname=zoo_arcadia', 'root', '');
$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM habitats WHERE id = ?");
$stmt->execute([$id]);

header('Location: admin_dashboard.php');
exit;

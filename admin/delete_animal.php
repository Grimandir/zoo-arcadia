<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: ../connexion.html');
    exit;
}

require '../config.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM animals WHERE id = ?");
$stmt->execute([$id]);

header('Location: ../admin.php');
exit;

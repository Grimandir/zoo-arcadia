<?php
require '../config.php';

if (!isset($_GET['id'])) {
    header('Location: ../admin_dashboard.php');
    exit;
}

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM habitats WHERE id = ?");
$stmt->execute([$id]);

header('Location: ../admin_dashboard.php');
exit;

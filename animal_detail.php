<?php
require 'vendor/autoload.php';

if (isset($_GET['animal_id'])) {
    $animal_id = $_GET['animal_id'];

    // Connexion à la base de données
    $pdo = new PDO('mysql:host=localhost;dbname=zoo_arcadia', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer les informations de l'animal
    $stmt = $pdo->prepare("SELECT * FROM animals WHERE id = ?");
    $stmt->execute([$animal_id]);
    $animalData = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($animalData) {
        echo "<h1>" . htmlspecialchars($animalData['name']) . "</h1>";
        echo "<p>Espèce: " . htmlspecialchars($animalData['species']) . "</p>";

        // Incrémenter le compteur de vues
        $mongo = new MongoDB\Client("mongodb://localhost:27017");
        $collection = $mongo->zoo_arcadia->animal_views;
        $collection->updateOne(
            ['animal_id' => (int)$animal_id],
            ['$inc' => ['views' => 1]],
            ['upsert' => true]
        );

        // Afficher les détails de l'animal
        echo "<p>Description: " . htmlspecialchars($animalData['description']) . "</p>";

        // Récupérer les rapports du vétérinaire
        $stmt = $pdo->prepare("SELECT * FROM vet_reports WHERE animal_id = ?");
        $stmt->execute([$animal_id]);
        $reports = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($reports) {
            echo "<h2>Rapports Vétérinaires</h2><ul>";
            foreach ($reports as $report) {
                echo "<li>Date: " . htmlspecialchars($report['visit_date']) . " - Etat: " . htmlspecialchars($report['health_status']) . " - Nourriture: " . htmlspecialchars($report['food_given']) . "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>Aucun rapport vétérinaire trouvé pour cet animal.</p>";
        }
    } else {
        echo "<p>Animal non trouvé.</p>";
    }
} else {
    echo "<p>Animal non spécifié.</p>";
}

<?php
if (isset($_GET['habitat'])) {
    $habitat = $_GET['habitat'];

    // Connexion à la base de données
    $pdo = new PDO('mysql:host=localhost;dbname=zoo_arcadia', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer les informations de l'habitat
    $stmt = $pdo->prepare("SELECT * FROM habitats WHERE name = ?");
    $stmt->execute([$habitat]);
    $habitatData = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($habitatData) {
        echo "<h1>" . htmlspecialchars($habitatData['name']) . "</h1>";
        echo "<p>" . htmlspecialchars($habitatData['description']) . "</p>";

        // Récupérer les animaux de cet habitat
        $stmt = $pdo->prepare("SELECT * FROM animals WHERE habitat_id = ?");
        $stmt->execute([$habitatData['id']]);
        $animals = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($animals) {
            echo "<h2>Animaux</h2><ul>";
            foreach ($animals as $animal) {
                echo "<li><a href='animal_detail.php?animal_id=" . htmlspecialchars($animal['id']) . "'>" . htmlspecialchars($animal['name']) . "</a> (" . htmlspecialchars($animal['species']) . ")</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>Aucun animal trouvé pour cet habitat.</p>";
        }
    } else {
        echo "<p>Habitat non trouvé.</p>";
    }
} else {
    echo "<p>Habitat non spécifié.</p>";
}

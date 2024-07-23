# Zoo Arcadia

## Description

Zoo Arcadia est un projet de site web pour un zoo fictif, conçu pour mettre en valeur les différents habitats et animaux du parc, offrir des services aux visiteurs et permettre aux employés et vétérinaires de gérer les animaux et leurs soins.

## Fonctionnalités

- **Page d'accueil** : Présentation du zoo, des habitats, des services et des avis des visiteurs.
- **Menu de navigation** : Accès à toutes les sections du site, incluant l'accueil, les services, les habitats, la connexion et la page de contact.
- **Vue globale des services** : Liste des services offerts par le zoo.
- **Vue globale des habitats** : Liste des habitats avec des détails sur les animaux qu'ils contiennent.
- **Détail des animaux** : Informations détaillées sur chaque animal, y compris les rapports vétérinaires et les journaux d'alimentation.
- **Gestion des avis** : Les visiteurs peuvent laisser des avis qui seront validés par les employés.
- **Formulaire de contact** : Permet aux visiteurs de contacter le zoo.
- **Espace administrateur** : Gérer les comptes utilisateurs, services, habitats et animaux.
- **Espace employé** : Valider les avis, gérer les services et enregistrer les journaux d'alimentation.
- **Espace vétérinaire** : Saisir des rapports sur l'état des animaux.
- **Statistiques de consultation des habitats** : Suivi des consultations des animaux et affichage des statistiques dans l'espace administrateur.

## Technologies Utilisées

- **HTML5** : Structure des pages web.
- **CSS3** et **Bootstrap** : Style et réactivité des pages web.
- **JavaScript/jQuery** : Interactions et animations.
- **PHP avec PDO** : Logique de l'application et interaction avec la base de données MySQL.
- **MySQL** : Base de données relationnelle pour stocker les informations du zoo.
- **MongoDB** : Base de données non relationnelle pour les statistiques de consultation des animaux.

## Prérequis

- Serveur web (Apache, Nginx, etc.)
- PHP 7.4 ou supérieur
- MySQL 5.7 ou supérieur
- MongoDB 4.0 ou supérieur
- Composer

## Installation

1. **Cloner le dépôt :**
    
    git clone https://github.com/votre-utilisateur/zoo-arcadia.git
    cd zoo-arcadia


2. **Installer les dépendances PHP :**
    
    composer install
    

3. **Configurer la base de données MySQL :**
    - Créer une base de données MySQL :
        
        CREATE DATABASE zoo_arcadia;
    
    - Importer les tables et les données :
       
        mysql -u votre_utilisateur -p zoo_arcadia < database.sql
        

4. **Configurer MongoDB :**
    - Assurez-vous que MongoDB est en cours d'exécution.
    - Créer la base de données et la collection nécessaires :
        
        javascript
        use zoo_arcadia
        db.createCollection("animal_statistics")
        

5. **Configurer le fichier `config.php` :**

    <?php
    // Configuration de la base de données MySQL
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'zoo_arcadia');
    define('DB_USER', 'votre_utilisateur');
    define('DB_PASS', 'votre_mot_de_passe');

    // Connexion à MySQL avec PDO
    try {
        $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }

    // Connexion à MongoDB
    require 'vendor/autoload.php'; // Inclure l'autoload de Composer
    $mongoClient = new MongoDB\Client("mongodb://localhost:27017");
    $mongoDB = $mongoClient->zoo_arcadia;

    // Fonction pour sécuriser les données des formulaires
    function sanitizeInput($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    // Fonction pour vérifier si l'utilisateur est connecté
    function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }

    // Fonction pour vérifier si l'utilisateur est administrateur
    function isAdmin() {
        return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
    }

    // Fonction pour vérifier si l'utilisateur est vétérinaire
    function isVeterinaire() {
        return isset($_SESSION['role']) && $_SESSION['role'] === 'veterinaire';
    }

    // Fonction pour vérifier si l'utilisateur est employé
    function isEmploye() {
        return isset($_SESSION['role']) && $_SESSION['role'] === 'employe';
    }

    // Fonction pour rediriger les utilisateurs non connectés
    function redirectIfNotLoggedIn($redirectUrl = 'connexion.html') {
        if (!isLoggedIn()) {
            header("Location: $redirectUrl");
            exit;
        }
    }

    // Fonction pour rediriger les utilisateurs non administrateurs
    function redirectIfNotAdmin($redirectUrl = 'connexion.html') {
        if (!isAdmin()) {
            header("Location: $redirectUrl");
            exit;
        }
    }

    // Fonction pour rediriger les utilisateurs non vétérinaires
    function redirectIfNotVeterinaire($redirectUrl = 'connexion.html') {
        if (!isVeterinaire()) {
            header("Location: $redirectUrl");
            exit;
        }
    }

    // Fonction pour rediriger les utilisateurs non employés
    function redirectIfNotEmploye($redirectUrl = 'connexion.html') {
        if (!isEmploye()) {
            header("Location: $redirectUrl");
            exit;
        }
    }

    // Démarrer la session si elle n'est pas déjà démarrée
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    ?>
    

6. **Configurer le fichier `.htaccess` :**
 
 # Activer la réécriture d'URL.

    RewriteEngine On

    # Rediriger toutes les requêtes vers index.php

    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ index.php [QSA,L]

    # Forcer l'utilisation de HTTPS
    RewriteCond %{HTTPS} !=on
    RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

    # Désactiver l'affichage de l'index des répertoires
    Options -Indexes

    # Protéger le fichier .htaccess
    <Files .htaccess>
    Order Allow,Deny
    Deny from all
    </Files>

    # Empêcher l'accès aux fichiers de configuration
    <FilesMatch "\.(php|config)$">
    Order Allow,Deny
    Deny from all
    </FilesMatch>

    # Empêcher l'accès aux fichiers sensibles
    <FilesMatch "(^\.|composer\.(json|lock)|phpunit\.xml|^vendor)">
    Order Allow,Deny
    Deny from all
    </FilesMatch>

    # Paramètres de sécurité supplémentaires
    <IfModule mod_headers.c>
        Header set X-Content-Type-Options nosniff
        Header set X-XSS-Protection "1; mode=block"
        Header set X-Frame-Options DENY
        Header set Strict-Transport-Security "max-age=31536000; includeSubDomains"
    </IfModule>
    ```

## Structure du Projet

/zoo-arcadia
├── /admin
│ ├── add_service.php
│ ├── edit_service.php
│ ├── delete_service.php
│ ├── add_habitat.php
│ ├── edit_habitat.php
│ ├── delete_habitat.php
│ ├── add_animal.php
│ ├── edit_animal.php
│ ├── delete_animal.php
├── /assets
│ ├── /css
│ │ └── style.css
│ ├── /images
│ │ └── (image files)
│ └── /js
│ └── script.js
├── /vendor
│ ├── (composer installed packages)
├── .htaccess
├── composer.json
├── composer.lock
├── config.php
├── index.html
├── services.html
├── habitats.html
├── avis.html
├── contact.html
├── menu.html
├── connexion.html
├── login.php
├── admin.php
├── admin_dashboard.php
├── veterinaire.php
├── employe.php
├── animal_detail.php
└── README.md

markdown
Copier le code

## Utilisation

1. Accédez à `http://votre-domaine/index.html` pour visiter la page d'accueil du site.
2. Utilisez le menu de navigation pour explorer les services, les habitats, les avis, et la page de contact.
3. Les administrateurs peuvent accéder à `http://votre-domaine/admin.php` pour gérer les utilisateurs, les services, les habitats et les animaux.
4. Les vétérinaires peuvent accéder à `http://votre-domaine/veterinaire.php` pour saisir les rapports sur les animaux.
5. Les employés peuvent accéder à `http://votre-domaine/employe.php` pour valider les avis et gérer les journaux d'alimentation.

## Contributions

Les contributions sont les bienvenues ! Veuillez suivre les étapes ci-dessous pour contribuer :

1. Fork le dépôt.
2. Créez une branche pour votre fonctionnalité (`git checkout -b feature/ma-fonctionnalité`).
3. Commitez vos modifications (`git commit -m 'Ajouter ma fonctionnalité'`).
4. Poussez votre branche (`git push origin feature/ma-fonctionnalité`).
5. Ouvrez une Pull Request.

## Licence

Ce projet est sous licence MIT. Consultez le fichier [LICENSE](LICENSE) pour plus d'informations.

---

Ce fichier `README.md` fournit une description complète et détaillée de votre projet Zoo Arcadia, couvrant tous les aspects nécessaires pour l'installation, la configuration et l'utilisation du projet.
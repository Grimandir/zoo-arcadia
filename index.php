<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Arcadia - Accueil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Zoo Arcadia</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="services.html">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="habitats.html">Habitats</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="avis.html">Avis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="connexion.html">Connexion</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Bienvenue au Zoo Arcadia</h1>
        <p>Découvrez nos habitats et nos animaux.</p>

        <h2>Habitats</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="assets/images/savane.jpg" class="card-img-top" alt="Savane">
                    <div class="card-body">
                        <h5 class="card-title">Savane</h5>
                        <a href="habitat_detail.php?habitat=savane" class="btn btn-primary">Découvrir</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="assets/images/jungle.jpg" class="card-img-top" alt="Jungle">
                    <div class="card-body">
                        <h5 class="card-title">Jungle</h5>
                        <a href="habitat_detail.php?habitat=jungle" class="btn btn-primary">Découvrir</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="assets/images/reptiles.jpg" class="card-img-top" alt="Reptiles">
                    <div class="card-body">
                        <h5 class="card-title">Reptiles</h5>
                        <a href="habitat_detail.php?habitat=reptiles" class="btn btn-primary">Découvrir</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="assets/images/aquatique.jpg" class="card-img-top" alt="Aquatique">
                    <div class="card-body">
                        <h5 class="card-title">Aquatique</h5>
                        <a href="habitat_detail.php?habitat=aquatique" class="btn btn-primary">Découvrir</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="assets/images/mammiferes.jpg" class="card-img-top" alt="Mammifères">
                    <div class="card-body">
                        <h5 class="card-title">Mammifères</h5>
                        <a href="habitat_detail.php?habitat=mammiferes" class="btn btn-primary">Découvrir</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="assets/images/voliere.jpg" class="card-img-top" alt="Volière">
                    <div class="card-body">
                        <h5 class="card-title">Volière</h5>
                        <a href="habitat_detail.php?habitat=voliere" class="btn btn-primary">Découvrir</a>
                    </div>
                </div>
            </div>
        </div>

        <h2>Services</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="assets/images/restauration.jpg" class="card-img-top" alt="Restauration">
                    <div class="card-body">
                        <h5 class="card-title">Restauration</h5>
                        <p class="card-text">Profitez de nos restaurants et snacks.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="assets/images/visite_guidee.jpg" class="card-img-top" alt="Visite guidée">
                    <div class="card-body">
                        <h5 class="card-title">Visite guidée</h5>
                        <p class="card-text">Découvrez le zoo avec un guide expert.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="assets/images/petit_train.jpg" class="card-img-top" alt="Visite en petit train">
                    <div class="card-body">
                        <h5 class="card-title">Visite en petit train</h5>
                        <p class="card-text">Parcourez le zoo en petit train.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.amazonaws.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>
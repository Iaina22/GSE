<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Exemple</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body>

<nav class="navbar navbar-expand-lg bg-light shadow-sm px-4">
    <a class="navbar-brand" href="#">
        <i class="bi bi-house-door fs-3 text-primary"></i>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">

        <!-- Left -->
        <ul class="navbar-nav me-auto">

            <!-- Salle (6 options) -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Salle</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Salle 1</a></li>
                    <li><a class="dropdown-item" href="#">Salle 2</a></li>
                    <li><a class="dropdown-item" href="#">Salle 3</a></li>
                    <li><a class="dropdown-item" href="#">Salle 4</a></li>
                    <li><a class="dropdown-item" href="#">Salle 5</a></li>
                    <li><a class="dropdown-item" href="#">Salle 6</a></li>
                </ul>
            </li>

            <!-- Offre (4 options) -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Offre</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Offre 1</a></li>
                    <li><a class="dropdown-item" href="#">Offre 2</a></li>
                    <li><a class="dropdown-item" href="#">Offre 3</a></li>
                    <li><a class="dropdown-item" href="#">Offre 4</a></li>
                </ul>
            </li>

            <!-- Matériel & Réservation sans dropdown -->
            <li class="nav-item">
                <a class="nav-link" href="#">Matériel utiliser</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">Réservation</a>
            </li>
        </ul>

        <!-- Right icons -->
        <div class="d-flex gap-3">
            <i class="bi bi-person fs-4 text-primary"></i>
            <i class="bi bi-gear fs-4 text-primary"></i>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Thème Livre</title>
    <!-- Lien vers Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Lien vers FontAwesome pour les icônes -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        .navbar-book-theme {
            background-color: #f5f5dc; /* Couleur beige pour rappeler le papier */
            font-family: 'Garamond', serif; /* Police classique pour un thème de livre */
        }
        .navbar-book-theme .nav-link {
            color: #5a4a3b; /* Couleur marron pour les liens */
        }
        .navbar-book-theme .nav-link:hover {
            color: #3b2a1a; /* Couleur marron foncé au survol */
        }
        .navbar-brand img {
            height: 40px; /* Ajuster la taille du logo */
        }
        .sidebar {
            background-color: #f5f5dc;
            padding: 15px;
            height: 100vh;
            position: fixed;
        }
        .sidebar .nav-link {
            color: #5a4a3b;
            margin-bottom: 10px;
        }
        .sidebar .nav-link:hover {
            color: #3b2a1a;
        }
        .content {
            margin-left: 220px;
            padding: 20px;
        }
        .card {
            font-family: 'Garamond', serif;
        }
        .card-header {
            background-color: #5a4a3b;
            color: white;
        }
    </style>
</head>
<body>

<nav style="position: fixed ; display:flex; justify-content:center; width:100%; z-index: 1000; "  class="navbar navbar-expand-lg navbar-book-theme" >

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto gap-2">
            <li class="nav-item">
                <a class="nav-link" href="#">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Profil</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-dark" href="#">Auteurs</a>
            </li>
        </ul>
    </div>
</nav>

    <div class="sidebar" style="top:3.5rem">
        <h5>Menu</h5>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-book"></i> Livres</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-users"></i> Utilisateurs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-chart-line"></i> Statistiques</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-cogs"></i> Paramètres</a>
            </li>
        </ul>
    </div>





<!-- Lien vers Bootstrap JS et jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



</body>
</html>

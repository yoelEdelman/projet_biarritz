<nav class="col-3 py-2 categories-nav">
<!--    <p class="h2 text-center">Salut --><?//= $_SESSION['user']['first_name']; ?><!-- !</p>-->
    <a class="d-block btn btn-danger mb-4 mt-2" href="/index.php?logout">Déconnexion</a>
    <a class="d-block btn btn-warning mb-4 mt-2" href="/index.php">Site</a>
    <ul>
        <li><a href="index.php?page=admin-events-list">Gestion des evenement </a></li>
        <li><a href="index.php?page=admin-services-list">Gestion des services </a></li>
        <li><a href="index.php?page=admin-categories-list">Gestion des catégories </a></li>
        <li><a href="index.php?page=admin-addresses-list">Gestion des addresses </a></li>
        <li><a href="index.php?page=admin-users-list">Gestion des utilisateurs </a></li>

    </ul>
</nav>
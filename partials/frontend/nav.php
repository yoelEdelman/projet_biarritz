<nav class="nav">
    <div class="container">
        <div class="bars">
            <a href="#" class="hamburger"><i class="fas fa-bars"></i></a>
            <a href="#" class="cross"><i class="fas fa-times"></i></a>
        </div>
        <div class="menu hide-menu">
            <a href="index.php">accueil</a>
            <a href="index.php?page=history">histoire</a>
            <a href="index.php?page=services">services</a>
            <a href="index.php?page=events">evenements</a>
            <a href="index.php?page=contact">contact</a>
<!--            <a href="index.php?page=login">connexion</a>-->
            <?php if (isset($_SESSION['user'])): ?>
                <!-- ici le boutton de déconnexion est un lien allant vers l'index qui envoie le paramètre "logout" via URL -->
                <a href="index.php?page=account">Mon compte</a>
                <?php if ($_SESSION['user']['isAdmin'] == 1): ?>
                    <a href="index.php?page=admin">Administration</a>
                <?php endif; ?>
                <a href="index.php?logout">Déconnexion</a>

                <!-- Sinon afficher un boutton de connexion -->
            <?php else: ?>
                <a href="index.php?page=login">Connexion</a>
            <?php endif; ?>
        </div>
        <div class="nav-links">
            <a href="index.php">accueil</a>
            <a href="index.php?page=history">histoire</a>
            <a href="index.php?page=services">services</a>
        </div>

        <div class="nav-links">
            <a href="index.php?page=events">evenements</a>
            <a href="index.php?page=contact">contact</a>
<!--            <a href="index.php?page=login">connexion</a>-->
            <?php if (isset($_SESSION['user'])): ?>
                <a class="my-account" href="index.php?page=account">Mon compte</a>

                <!-- Sinon afficher un boutton de connexion -->
            <?php else: ?>
                <a href="index.php?page=login">Connexion</a>
            <?php endif; ?>
        </div>
    </div>
</nav>
<?php if (isset($_SESSION['user'])): ?>
    <ul class="menu-connected hide-menu">
        <?php if ($_SESSION['user']['isAdmin'] == 1): ?>
            <li><a href="index.php?page=admin">Administration</a></li>
        <?php endif; ?>

        <li><a href="index.php?logout">Déconnexion</a></li>
    </ul>
<?php endif; ?>


<script>
    let menuConnected = document.querySelector('.menu-connected')
    let myAccount = document.querySelector('.my-account')

    if (myAccount){
        myAccount.addEventListener("mouseover", function (e) {
            // e.stopPropagation()

            // menuConnected.style.display = "block"
            menuConnected.classList.remove('hide-menu')

            e.stopPropagation()

        })
    }

    if (menuConnected){
        menuConnected.addEventListener("mouseover", function (e) {
            // e.stopPropagation()

            menuConnected.style.display = "block"
            menuConnected.classList.remove('hide-menu')


            e.stopPropagation()

        })


        menuConnected.addEventListener("mouseout", function (e) {
            menuConnected.classList.add('hide-menu')

            // menuConnected.style.display = "none"

            e.stopPropagation()

        })
    }




</script>







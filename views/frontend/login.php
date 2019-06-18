<?php $title = ''; ?>
<?php ob_start(); ?>
<main>
    <?php require_once 'partials/frontend/logo.php';?>

    <?php require_once 'partials/frontend/nav.php';?>
    <section class="login">
        <div class="form-container">
                <?php if (isset($_GET['action']) && $_GET['action'] == 'forgot-password') :?>
                <form action="index.php?page=login&action=forgot-password" method="post" enctype="multipart/form-data">

                <p>Veuillez inserer votre addresse mail liée a votre compte</p>
                <div>
                    <label for="email"></label>
                    <input type="text" placeholder="Email" name="email" id="email">
                </div>

                    <?php if (!empty($warnings)): ?>
                        <?php foreach($warnings as $key => $warning): ?>
                            <div class="error-message">
                                <?= $warning; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                <div>
                    <input type="submit" name="new-password" value="envoyer">
                </div>
                <?php else :?>
                <form action="index.php?page=login" method="post" enctype="multipart/form-data">

                <h3>CONNEXION</h3>
                <div>
                    <label for="email"></label>
                    <input type="text" placeholder="Email" name="email" id="email">
                </div>

                <div>
                    <label for="password"></label>
                    <input type="password" placeholder="Mot de passe" name="password" id="password">
                </div>

                <div class="forgot-pwd">
                    <a href="index.php?page=login&action=forgot-password">Mot de passe oubliée ?</a>
                </div>

                <?php if (!empty($warnings)): ?>
                    <?php foreach($warnings as $key => $warning): ?>
                        <div class="error-message">
                            <?= $warning; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <?php if (!empty($_SESSION['success'])): ?>
                    <?php foreach($_SESSION['success'] as $key => $success): ?>
                        <div class="success-message">
                            <?= $success; ?>
                        </div>
                    <?php endforeach; ?>
                    <?php unset($_SESSION['success']); ?>
                <?php endif; ?>

                <div>
                    <input type="submit" name="login" value="envoyer">
                </div>

                <?php endif; ;?>

            </form>
        </div>
    </section>
    <?php require_once 'partials/frontend/footer.php';?>
</main>

<script src="../../assets/js/menu-burger.js"></script>
<?php $content = ob_get_clean(); ?>
<?php require 'layout.php'; ?>


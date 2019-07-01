<?php $title = 'index'; ?>
<?php ob_start(); ?>
<main class="index">
    <?php require_once 'partials/frontend/header.php';?>

    <?php require_once 'partials/frontend/slider.php';?>

    <?php require_once 'partials/frontend/footer.php';?>
</main>
<?php $content = ob_get_clean(); ?>
<?php require 'layout.php'; ?>

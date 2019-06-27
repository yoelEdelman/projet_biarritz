<?php $title = ''; ?>
<?php ob_start(); ?>

    <main class="index">
        <?php require_once 'partials/frontend/header.php';?>

        <?php require_once 'partials/frontend/slider.php';?>

        <?php require_once 'partials/frontend/footer.php';?>
    </main>

<!-- scripts -->
<script src="../../assets/js/header.js"></script>
<script src="../../assets/js/slider.js"></script>
<!--<script src="../../assets/js/menu-burger.js"></script>-->





<!--<script src="../../assets/js/modal.js"></script>-->
<!--<script src="../../assets/js/test-modal-ajax.js"></script>-->

<?php $content = ob_get_clean(); ?>
<?php require 'layout.php'; ?>

<?php $title = ''; ?>
<?php ob_start(); ?>
    <main>
        <?php require_once 'partials/frontend/logo.php';?>

        <?php require_once 'partials/frontend/nav.php';?>
        <section class="story">
            <h1>histoire</h1>
            <div class="story-1">
                <div>
                    <img src="../../assets/img/img-story1.jpg" alt="">
                </div>
                <div>Du poste de traite à la mission, de la seigneurie au
                    village, du village préindustriel à la ville industrielle,
                    Rivière-du-Loup s’est développée au fil des siècles,
                    héritant d’un patrimoine bâti exceptionnel. Laissez-
                    nous vous raconter sa grande histoire
                    Rivière-du-Loup s’est développée au fil des siècles,
                    héritant d’un patrimoine bâti exceptionnel. Laissez-
                    nous vous raconter sa grande histoire……</div>
            </div>
            <div class="story-2">
                <div>
                    <img src="../../assets/img/img-story2.jpg" alt="">
                </div>
                <div>Du poste de traite à la mission, de la seigneurie au village, du village préindustriel à la ville industrielle, Rivière-du-Loup
                    s’est développée au fil des siècles, héritant d’un patrimoine bâti exceptionnel. Laissez-nous vous raconter sa grande
                    histoire Rivière-du-Loup s’est développée au fil des siècles, héritant d’un patrimoine bâti exceptionnel. Laissez-nous
                    vous raconter sa grande histoire……</div>
            </div>
            <div class="story-3">
                <div class="ok">Du poste de traite à la mission, de la seigneurie au village, du village préindustriel à la ville industrielle, Rivière-du-Loup s’est développée au fil des siècles, héritant d’un patrimoine bâti exceptionnel. Laissez-nous vous raconter sa grande histoire
                    Rivière-du-Loup s’est développée au fil des siècles, héritant d’un patrimoine bâti exceptionnel. Laissez-nous vous raconter sa grande histoire……</div>
                <div>
                    <img src="../../assets/img/img-story3.jpg" alt="">
                </div>
            </div>
        </section>
        <?php require_once 'partials/frontend/footer.php';?>

    </main>
<script src="../../assets/js/menu-burger.js"></script>

<?php $content = ob_get_clean(); ?>
<?php require 'layout.php'; ?>


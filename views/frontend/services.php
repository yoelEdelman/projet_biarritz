<?php $title = ''; ?>
<?php ob_start(); ?>
    <main>

        <?php require_once 'partials/frontend/logo.php';?>

        <?php require_once 'partials/frontend/nav.php';?>
        <section class="services">
            <h1>services</h1>
            <div class="service">
                <div>
                    <img src="/assets/img/csm_Hugo_d46ed01317.jpg" alt="">
                </div>
                <div>
                    <h2>Éducation et Jeunesse</h2>
                    <p>Accueille, informe les personnes âgées, handicapées ou en difficulté. Instruit les demandes d’aide sociale légale et facultative (RSA, allocation personnalisée d’autonomie…).</p>
                    <a href="#">en savoir plus</a>
                </div>
            </div>

            <div class="service">
                <div>
                    <img src="/assets/img/csm_Hugo_d46ed01317.jpg" alt="">
                </div>
                <div>
                    <h2>Éducation et Jeunesse</h2>
                    <p>Accueille, informe les personnes âgées, handicapées ou en difficulté. Instruit les demandes d’aide sociale légale et facultative (RSA, allocation personnalisée d’autonomie…).</p>
                    <a href="#">en savoir plus</a>
                </div>
            </div>

            <div class="service">
                <div>
                    <img src="/assets/img/csm_Hugo_d46ed01317.jpg" alt="">
                </div>
                <div>
                    <h2>Éducation et Jeunesse</h2>
                    <p>Accueille, informe les personnes âgées, handicapées ou en difficulté. Instruit les demandes d’aide sociale légale et facultative (RSA, allocation personnalisée d’autonomie…).</p>
                    <a href="#">en savoir plus</a>
                </div>
            </div>

        </section>
        <?php require_once 'partials/frontend/footer.php';?>

    </main>
<script src="../../assets/js/menu-burger.js"></script>

<?php $content = ob_get_clean(); ?>
<?php require 'layout.php'; ?>

<?php $title = ''; ?>
<?php ob_start(); ?>
<main>
    <?php require_once 'partials/frontend/logo.php';?>
    <?php require_once 'partials/frontend/nav.php';?>
    <section class="services">
        <h1>services</h1>
        <?php foreach ($services as $service):?>
            <div class="service">
                <div>
                    <?php $medias = explode(',', $service['name']);?>
                    <img class="" src="/assets/img/<?= $medias[0];?>" alt="">
                </div>
                <div>
                    <h2><?= $service['title'];?></h2>
                    <p><?= $service['summary'];?></p>
                    <a href="#jsModal" data-service-id="<?= $service['id'];?>" id="popup" class="jsModalTrigger">en savoir plus</a>
                </div>
            </div>
        <?php endforeach;?>

        <div id="jsModal" class="modal">
            <div class="modal__overlay jsOverlay"></div>
            <div class="modal__container modal-content">
                <div class="top-modal-service-content">
                    <!-- slider container -->
                    <div id="slider-modal-container">

                    </div>
                    <div>
                        <h3 class="title"></h3>
                        <p></p>
                    </div>
                </div>
                <div class="bottom-modal-content">
                    <div>
                        <iframe class="modal-map" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    <div class="service-info">
                        <p></p>
                        <p></p>
                        <p></p>
                        <a href="#">Itinéraire</a>
                    </div>
                </div>
                <button class="modal__close jsModalClose">&#10005;</button>
            </div>
        </div>

    </section>
    <?php require_once 'partials/frontend/footer.php';?>
</main>
<script src="../../assets/js/test-modal-ajax.js"></script>
<script src="../../assets/js/modal-slider.js"></script>


<?php $content = ob_get_clean(); ?>
<?php require 'layout.php'; ?>

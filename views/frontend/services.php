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
<!--                        --><?php //foreach ($medias as $media):?>
                            <img class="" src="/assets/img/<?= $medias[0];?>" alt="">
<!--                        --><?php //endforeach;?>
<!--                        <img class="" src="/assets/img/--><?//= $service['name'];?><!--" alt="">-->
                    </div>
                    <div>
                        <h2><?= $service['title'];?></h2>
                        <p><?= $service['summary'];?></p>
                        <a href="#jsModal" data-service-id="<?= $service['id'];?>" id="popup" class="jsModalTrigger">en savoir plus</a>
                    </div>
                </div>
            <?php endforeach;?>

<!--            <a href="#jsModal" id="popup" class="jsModalTrigger">Trigger</a>-->

            <div id="jsModal" class="modal">
                <div class="modal__overlay jsOverlay"></div>
                <div class="modal__container modal-content">
                    <div class="top-modal-service-content">
                        <!-- slider container -->
                        <div id="slider-modal-container">
                                <!-- arrows -->
<!--                                <div id="arrows-wrapper" class="">-->
                                    <!-- previous arrow -->
<!--                                    <i class="fas fa-chevron-left slider-arrow center_y" id="arrow-prev"></i>-->
<!--                                    -->
                                    <!-- next arrow -->
<!--                                    <i class="fas fa-chevron-right slider-arrow center_y" id="arrow-next"></i>-->
<!--                                </div>-->
<!--                            <img class="slide fade modal-img" src="../../assets/img/img-story1.jpg" alt="">-->
                        </div>
                        <div>
                            <h3 class="title"></h3>
                            <p></p>
                        </div>
                    </div>
                    <div class="bottom-modal-content">
                        <div>
                            <iframe class="modal-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2894.9180361606964!2d-1.5609870489913704!3d43.48318087132386!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd516ad81bb912b5%3A0x297f061521e8d6c6!2s12+Avenue+Edouard+VII%2C+64200+Biarritz!5e0!3m2!1sfr!2sfr!4v1556041575817!5m2!1sfr!2sfr"  frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                        <div class="service-info">
                            <p></p>
                            <p>tel</p>
                            <p>horraires</p>
                            <a href="#">Itinéraire</a>
                        </div>
                    </div>
                    <button class="modal__close jsModalClose">&#10005;</button>
                </div>
            </div>

        </section>
        <?php require_once 'partials/frontend/footer.php';?>

    </main>
<script src="../../assets/js/menu-burger.js"></script>
<script src="../../assets/js/modal.js"></script>
<script src="../../assets/js/test-modal-ajax.js"></script>

<script src="../../assets/js/modal-slider.js"></script>


<?php $content = ob_get_clean(); ?>
<?php require 'layout.php'; ?>

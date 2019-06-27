<?php $title = ''; ?>
<?php ob_start(); ?>
<main>
    <?php require_once 'partials/frontend/logo.php';?>
    <?php require_once 'partials/frontend/nav.php';?>
    <section class="events">
        <section>
            <section class="eventContainer">
                <div class="container">
                    <div class="dateSelected"></div>
                    <div id="calendar1-wrapper2"></div>
                    <span class="calendar2-msg"></span>
                </div>
                <section class="forEvents"></section>
            </section>
        </section>

        <section id="eventContainer">
            <h1>evenements</h1>
            <?php foreach ($events as $event):?>
            <div class="event">
                <div>
                    <?php $medias = explode(',', $event['name']);?>
                    <img class="" src="/assets/img/<?= $medias[0];?>" alt="">
                </div>
                <div>
                    <h3><?= $event['category_name'];?></h3>
                    <h2><?= $event['title'];?></h2>
                    <p><?= $event['summary'];?></p>
                    <a href="#jsModal" data-event-id="<?= $event['id'];?>" id="popup" class="jsModalTrigger">en savoir plus</a>
                </div>
            </div>
            <?php endforeach;?>

            <div id="jsModal" class="modal">
                <div class="modal__overlay jsOverlay"></div>
                <div class="modal__container modal-content">
                    <div class="top-modal-event-content">
                        <!-- slider container -->
                        <div id="slider-modal-container" class="events-slider-modal-container">
                        </div>
                        <div>
                            <h4></h4>
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
    </section>
    <?php require_once 'partials/frontend/footer.php';?>
</main>
<script src="../../assets/js/datepicker.js"></script>
<script src="../../assets/js/test-modal-ajax.js"></script>
<script src="../../assets/js/modal-slider.js"></script>
<?php $content = ob_get_clean(); ?>
<?php require 'layout.php'; ?>


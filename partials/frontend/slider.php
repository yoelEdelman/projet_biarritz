<!-- slider container -->
<section id="slider-container">
    <!-- arrows -->
    <div id="arrows-wrapper" class="">
        <!-- previous arrow -->
        <i class="fas fa-chevron-left slider-arrow center_y" id="arrow-prev"></i>
        <!-- dots -->
        <div id="dots-wrapper" class="center_x">
            <!-- dot navigation for each slide -->
            <?php foreach ($events as $event) :?>
                <i class="fal dot-navigation"></i>
            <?php endforeach; ?>
        </div>
        <!-- next arrow -->
        <i class="fas fa-chevron-right slider-arrow center_y" id="arrow-next"></i>
    </div>
    <?php foreach ($events as $event) :?>
        <?php $medias = explode(',', $event['name']);?>
        <div class="slide fade" style="background-image: url(<?= 'assets/img/'.$medias[0];; ?>); ">
            <!-- slide image -->
            <div>
                <h3><?= $event['category_name']; ?></h3>
                <h2><?= $event['title']; ?></h2>
                <p><?= $event['summary']; ?></p>
                <a href="#jsModal" data-event-id="<?= $event['id'];?>" id="popup" class="jsModalTrigger">En savoir plus</a>
            </div>

        </div>
<!--        <div class="div40px"></div>-->
    <?php endforeach; ?>



    <div id="jsModal" class="modal">
        <div class="modal__overlay jsOverlay"></div>
        <div class="modal__container modal-content">
            <div class="top-modal-event-content">
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
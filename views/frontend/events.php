<?php $title = ''; ?>
<?php ob_start(); ?>
<main>

    <?php require_once 'partials/frontend/logo.php';?>

    <?php require_once 'partials/frontend/nav.php';?>
    <section class="events">
        <section>
            <!--<section class="imgUp">-->
            <!--    <div class="forTitleUp">-->
            <!--        <span class="pageHomeEvent">Événements</span>-->
            <!--    </div>-->
            <!--</section>-->

            <!--<h1 class="eventPages">Nos événements</h1>-->
<!--            <div class="dateSelected"></div>-->





            <section class="eventContainer">
                <div class="container">
                    <div class="dateSelected"></div>
<!--                    <div id="calendar2">-->
                        <div id="calendar1-wrapper2"></div>
                        <span class="calendar2-msg"></span>
<!--                    </div>-->
                </div>
                <section class="forEvents"></section>
            </section>





            <!--<div class="onMap">-->
            <!--    <div class="forCloser">-->
            <!--        <span class="closerOnMap">-->
            <!--            <i class="fas fa-times"></i>-->
            <!--        </span>-->
            <!--    </div>-->
            <!--    <div class="insideOnMap">-->
            <!--        <div class="insideLeft">-->
            <!--            <img class="imgOnMap">-->
            <!--            <div class="titleOnMap">Mairie</div>-->
            <!--            <div class="adrressOnMap">12 rie fvzs ko,</div>-->
            <!--        </div>-->
            <!--        <div class="insideRight"></div>-->
            <!--    </div>-->
            <!---->
            <!--</div>-->
        </section>
        <section>

            <h1>evenements</h1>
            <?php foreach ($events as $event):?>
            <div class="event">
                <div>
                    <img src="/assets/img/csm_Hugo_d46ed01317.jpg" alt="">
                </div>
                <div>
                    <h3>type d'evenement</h3>
                    <h2><?= $event->getTitle();?></h2>
                    <p><?= $event->getSummary();?></p>
                    <a href="#">en savoir plus</a>
                </div>
            </div>
            <?php endforeach;?>

            <div class="event">
                <div>
                    <img src="/assets/img/csm_Hugo_d46ed01317.jpg" alt="">
                </div>
                <div>
                    <h3>type d'evenement</h3>
                    <h2>evenement</h2>
                    <p>Accueille, informe les personnes âgées, handicapées ou en difficulté. Instruit les demandes d’aide sociale légale et facultative (RSA, allocation personnalisée d’autonomie…).</p>
                    <a href="#">en savoir plus</a>
                </div>
            </div>

            <div class="event">
                <div>
                    <img src="/assets/img/csm_Hugo_d46ed01317.jpg" alt="">
                </div>
                <div>
                    <h3>type d'evenement</h3>
                    <h2>evenement</h2>
                    <p>Accueille, informe les personnes âgées, handicapées ou en difficulté. Instruit les demandes d’aide sociale légale et facultative (RSA, allocation personnalisée d’autonomie…).</p>
                    <a href="#">en savoir plus</a>
                </div>
            </div>

            <div class="event">
                <div>
                    <img src="/assets/img/csm_Hugo_d46ed01317.jpg" alt="">
                </div>
                <div>
                    <h3>type d'evenement</h3>
                    <h2>evenement</h2>
                    <p>Accueille, informe les personnes âgées, handicapées ou en difficulté. Instruit les demandes d’aide sociale légale et facultative (RSA, allocation personnalisée d’autonomie…).</p>
                    <a href="#">en savoir plus</a>
                </div>
            </div>

            <div class="event">
                <div>
                    <img src="/assets/img/csm_Hugo_d46ed01317.jpg" alt="">
                </div>
                <div>
                    <h3>type d'evenement</h3>
                    <h2>evenement</h2>
                    <p>Accueille, informe les personnes âgées, handicapées ou en difficulté. Instruit les demandes d’aide sociale légale et facultative (RSA, allocation personnalisée d’autonomie…).</p>
                    <a href="#">en savoir plus</a>
                </div>
            </div>

            <div class="event">
                <div>
                    <img src="/assets/img/csm_Hugo_d46ed01317.jpg" alt="">
                </div>
                <div>
                    <h3>type d'evenement</h3>
                    <h2>evenement</h2>
                    <p>Accueille, informe les personnes âgées, handicapées ou en difficulté. Instruit les demandes d’aide sociale légale et facultative (RSA, allocation personnalisée d’autonomie…).</p>
                    <a href="#">en savoir plus</a>
                </div>
            </div>
        </section>
    </section>

    <?php require_once 'partials/frontend/footer.php';?>


</main>
<script src="../../assets/js/menu-burger.js"></script>
<script src="../../assets/js/datepicker.js"></script>

<?php $content = ob_get_clean(); ?>
<?php require 'layout.php'; ?>


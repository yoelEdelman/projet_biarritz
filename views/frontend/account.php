<?php $title = ''; ?>
<?php ob_start(); ?>
<main>

    <?php require_once 'partials/frontend/logo.php';?>

    <?php require_once 'partials/frontend/nav.php';?>
    <section class="account">
        <section class="profil">

            <h2>Profil</h2>
            <div>
                <p>NOM</p>
                <p>PRENOM</p>
                <p>EMAIL</p>
                <p>ADDRESSE</p>
                <p>NUMERO FIXE</p>
                <p>NUMERO MOBILE</p>
            </div>








        </section>

        <section class="bills">
            <h2>Mes Factures</h2>
            <div>
                <!--            --><?php //foreach ($bills as $bill):?>
                <div class="bill">
                    <p>Facture </p>
                    <p>du 01/05/2019 au 01/06/2019</p>
                    <p>IMPAYÉ</p>
                    <a href="#" id=""><i class="fas fa-money-bill-wave-alt"></i></a>
                    <a href="#" id=""><i class="fas fa-arrow-alt-circle-down"></i></a>
                    <!--                    <p>--><?//= $bill['category_name'];?><!--</p>-->
                    <!--                    <p>--><?//= $bill['title'];?><!--</p>-->
                    <!--                    <p>--><?//= $bill['summary'];?><!--</p>-->
                    <!--                    <a href="#" id="--><?//= $bill['id'];?><!--">en savoir plus</a>-->
                    <!--                    <a href="#" id="--><?//= $bill['id'];?><!--">en savoir plus</a>-->
                </div>
                <!--            --><?php //endforeach;?>
            </div>
        </section>
    </section>

    <?php require_once 'partials/frontend/footer.php';?>


</main>
<script src="../../assets/js/menu-burger.js"></script>
<script src="../../assets/js/datepicker.js"></script>
<script src="../../assets/js/modal.js"></script>
<script src="../../assets/js/test-modal-ajax.js"></script>

<script src="../../assets/js/modal-slider.js"></script>



<?php $content = ob_get_clean(); ?>
<?php require 'layout.php'; ?>


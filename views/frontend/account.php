<?php $title = ''; ?>
<?php ob_start(); ?>
<main>

    <?php require_once 'partials/frontend/logo.php';?>

    <?php require_once 'partials/frontend/nav.php';?>
    <section class="account">
        <section class="profil">

            <h2>Profil</h2>
            <div>
                <p><?= $user['last_name'];?></p>
                <p><?= $user['first_name'];?></p>
                <p><?= $user['email'];?></p>
                <p><?= $user['address'];?> <?= $user['zip_code'];?> <?= $user['city'];?> <?= $user['country'];?></p>
                <p><?= $user['home_number'];?></p>
                <p><?= $user['mobile_number'];?></p>
            </div>








        </section>

        <section class="bills">
            <h2>Mes Factures</h2>
            <div>
                <?php foreach ($bills as $bill):?>
                    <div class="bill">
                        <p>Facture </p>
                        <p><?= $bill['formated_bill_from'];?> au <?= $bill['formated_bill_to'];?></p>
                        <p><?= $bill['paid'] == 0 ? 'PAYÉ' : 'IMPAYÉ';?></p>
                        <p><?= $bill['amount_due'];?> <i class="fas fa-euro-sign"></i></p>
                        <a href="#" id=""><i class="fas fa-money-bill-wave-alt"></i></a>
                        <a href="../assets/pdf/<?= $bill['name'];?>" target="_blank" id=""><i class="fas fa-arrow-alt-circle-down"></i></a>
                    </div>
                <?php endforeach;?>
            </div>
        </section>
    </section>

    <?php require_once 'partials/frontend/footer.php';?>


</main>
<!--<script src="../../assets/js/menu-burger.js"></script>-->
<script src="../../assets/js/datepicker.js"></script>
<!--<script src="../../assets/js/modal.js"></script>-->
<script src="../../assets/js/test-modal-ajax.js"></script>

<script src="../../assets/js/modal-slider.js"></script>



<?php $content = ob_get_clean(); ?>
<?php require 'layout.php'; ?>


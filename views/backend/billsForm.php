<?php $title = 'Administration des factures - !'; ?>
<?php ob_start(); ?>
<div class="container-fluid">
    <?php require '././partials/backend/header.php'; ?>
    <div class="row my-3 index-content">
        <?php require '././partials/backend/nav.php'; ?>
        <section class="col-9">
            <header class="pb-3">
                <h4>Ajouter une facture</h4>
            </header>

            <?php if (!empty($errors)): ?>
                <?php foreach($errors as $key => $error): ?>
                    <div class="bg-danger text-white p-2 mb-4">
                        <?= $error; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

                <form action="index.php?page=admin-bills-form" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="bill_from">Facture du : <b class="text-danger">*</b></label>
                        <input class="form-control"  type="date" placeholder="Facture du" name="bill_from" id="bill_from" value="<?= isset($_POST['bill_from']) ? htmlentities($_POST['bill_from']) : '';?>"/>
                    </div>

                    <div class="form-group">
                        <label for="bill_to">Facture au : <b class="text-danger">*</b></label>
                        <input class="form-control"  type="date" placeholder="Facture au" name="bill_to" id="bill_to" value="<?= isset($_POST['bill_to']) ? htmlentities($_POST['bill_to']) : '';?>"/>
                    </div>

                    <div class="form-group">
                        <label for="amount_due">Somme due : <b class="text-danger">*</b></label>
                        <input class="form-control"  type="text" placeholder="Somme due" name="amount_due" id="amount_due" value="<?= isset($_POST['amount_due']) ? htmlentities($_POST['amount_due']) : '';?>"/>
                    </div>

                    <div class="form-group">
                        <label for="bill">Facture : <b class="text-danger">*</b></label>
                        <input multiple class="form-control" type="file" name="bill" id="bill"/>
                    </div>

                    <div class="form-group">
                        <label for="paid"> Payé ?</label>
                        <select class="form-control" name="paid" id="paid">
                            <option selected="selected" value="0" >Non</option>
                            <option value="1" >Oui</option>
                        </select>
                    </div>

                    <?php if (isset($_GET['user-id'])): ?>
                        <div class="form-group">
                            <input class="form-control" type="hidden" name="user-id" id="user-id" value="<?= $_GET['user-id']; ?>"/>
                        </div>
                    <?php endif;?>

                    <div class="text-right">
                        <p class="text-danger">* champs requis</p>
                        <input class="btn btn-success" type="submit" name="save" value="Enregistrer" />
                    </div>
                </form>
        </section>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require 'layout.php'; ?>

<?php $title = 'Administration des objets - !'; ?>
<?php ob_start(); ?>
<div class="container-fluid">
    <?php require '././partials/backend/header.php'; ?>
    <div class="row my-3 index-content">
        <?php require '././partials/backend/nav.php'; ?>
        <section class="col-9">

            <header class="pb-3">
                <h4><?= (isset($_GET['object-id'])) ? 'Modifier un objet' : 'Ajouter un objet' ;?></h4>
            </header>

            <?php if (!empty($errors)): ?>
                <?php foreach($errors as $key => $error): ?>
                    <div class="bg-danger text-white p-2 mb-4">
                        <?= $error; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

            <div class="tab-content">
                <div class="tab-pane container-fluid active" id="infos" role="tabpanel">
                    <?php if (isset($_GET['object-id'])): ?>
                        <form action="index.php?page=admin-objects-form&object-id=<?= $object['id'];?>&action=edit" method="post" enctype="multipart/form-data">
                    <?php else: ?>
                        <form action="index.php?page=admin-objects-form" method="post" enctype="multipart/form-data">
                    <?php endif; ?>

                            <div class="form-group">
                                <label for="object">Objet : <b class="text-danger">*</b></label>
                                <input class="form-control"  type="text" placeholder="Objet" name="object_name" id="object" value="<?= isset($object) ? htmlentities($object['object_name']) : '';?>" />
                            </div>

                            <?php if (isset($_GET['object-id'])): ?>
                                <input class="form-control" type="hidden" name="object-id" id="object-id" value="<?= $object['id']; ?>"/>
                            <?php endif;?>

                            <div class="text-right">
                                <?php if (isset($_GET['object-id'])): ?>
                                    <p class="text-danger">* champs requis</p>
                                    <input class="btn btn-success" type="submit" name="update" value="Mettre a jour" />
                                <?php else: ?>
                                    <p class="text-danger">* champs requis</p>
                                    <input class="btn btn-success" type="submit" name="save" value="Enregistrer" />
                                <?php endif; ?>
                            </div>
                        </form>
                </div>
            </div>
        </section>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require 'layout.php'; ?>

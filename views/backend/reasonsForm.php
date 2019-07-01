<?php $title = 'Administration des raisons - !'; ?>
<?php ob_start(); ?>
<div class="container-fluid">
    <?php require '././partials/backend/header.php'; ?>
    <div class="row my-3 index-content">
        <?php require '././partials/backend/nav.php'; ?>
        <section class="col-9">

            <header class="pb-3">
                <h4><?= (isset($_GET['reason-id'])) ? 'Modifier une raison' : 'Ajouter une raison' ;?></h4>
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
                    <?php if (isset($_GET['reason-id'])): ?>
                        <form action="index.php?page=admin-reasons-form&reason-id=<?= $reason['id'];?>&action=edit" method="post" enctype="multipart/form-data">
                    <?php else: ?>
                        <form action="index.php?page=admin-reasons-form" method="post" enctype="multipart/form-data">
                    <?php endif; ?>

                            <div class="form-group">
                                <label for="objects"> Objets <b class="text-danger">*</b></label>
                                <select multiple class="form-control" name="objects" id="objects" multiple="multiple">
                                    <?php foreach($objects as $key => $object): ?>
                                        <option value="<?= $object['id'];?>"
                                            <?php if (isset($_GET['reason-id']) && $object['id'] == $reason['object_id']): ?>
                                                selected="selected"
                                            <?php endif;?>
                                        ><?= $object['object_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="reason">Raison : <b class="text-danger">*</b></label>
                                <input class="form-control"  type="text" placeholder="Raison" name="reason_name" id="reason" value="<?= isset($reason) ? htmlentities($reason['reason_name']) : '';?>" />
                            </div>

                            <?php if (isset($_GET['reason-id'])): ?>
                                <input class="form-control" type="hidden" name="reason-id" id="reason-id" value="<?= $reason['id']; ?>"/>
                            <?php endif;?>

                            <div class="text-right">
                                <?php if (isset($_GET['reason-id'])): ?>
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

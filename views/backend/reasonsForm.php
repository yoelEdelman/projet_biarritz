<?php $title = 'Administration des raisons -  !'; ?>
<?php ob_start(); ?>
    <div class="container-fluid">
        <?php require '././partials/backend/header.php'; ?>
        <div class="row my-3 index-content">
            <?php require '././partials/backend/nav.php'; ?>
            <section class="col-9">
                <header class="pb-3">
                    <!-- Si $service existe, on affiche "Modifier" SINON on affiche "Ajouter" -->
                    <h4><?= (isset($_GET['reason-id'])) ? 'Modifier une raison' : 'Ajouter une raison' ;?></h4>
                </header>
                <!-- on verifie si le tableau $warnings n'est pas vide pour afficher les massages a l'interieur d'une condition pour gagner en performance-->
                <?php if (!empty($errors)): ?>
                    <?php foreach($errors as $key => $error): ?>
                        <div class="bg-danger text-white p-2 mb-4">
                            <?= $error; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <ul class="nav nav-tabs justify-content-center nav-fill" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#infos" role="tab">Infos</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane container-fluid active" id="infos" role="tabpanel">
                        <!-- Si $service existe, chaque champ du formulaire sera pré-remplit avec les informations de l'evenemet -->
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

                                <!-- Si $article existe, on ajoute un champ caché contenant l'id de l'article à modifier pour la requête UPDATE -->
                                <?php if (isset($_GET['reason-id'])): ?>
                                    <input class="form-control" type="hidden" name="reason-id" id="reason-id" value="<?= $reason['id']; ?>"/>
                                <?php endif;?>

                                <!-- Si $article existe, on affiche un lien de mise à jour -->
                                <div class="text-right">
                                    <?php if (isset($_GET['reason-id'])): ?>
                                        <p class="text-danger">* champs requis</p>
                                        <input class="btn btn-success" type="submit" name="update" value="Mettre a jour" />
                                        <!-- Si $article n'existe pas, on affiche un lien pour enrengister -->
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
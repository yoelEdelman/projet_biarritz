<?php $title = 'Administration des services -  !'; ?>
<?php ob_start(); ?>
    <div class="container-fluid">
        <?php require '././partials/backend/header.php'; ?>
        <div class="row my-3 index-content">
            <?php require '././partials/backend/nav.php'; ?>
            <section class="col-9">
                <header class="pb-3">
                    <!-- Si $service existe, on affiche "Modifier" SINON on affiche "Ajouter" -->
                    <h4><?= (isset($_GET['service-id'])) ? 'Modifier un service' : 'Ajouter un service' ;?></h4>
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
                    <?php if (isset($_GET['service-id'])): ?>
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#infos" role="tab">Infos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#images" role="tab">Images</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#infos" role="tab">Infos</a>
                        </li>
                    <?php endif; ?>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane container-fluid active" id="infos" role="tabpanel">
                        <!-- Si $service existe, chaque champ du formulaire sera pré-remplit avec les informations de l'evenemet -->
                        <?php if (isset($_GET['service-id'])): ?>
                        <form action="index.php?page=admin-services-form&service-id=<?= $service['id'];?>&action=edit" method="post" enctype="multipart/form-data">
                            <?php else: ?>
                            <form action="index.php?page=admin-services-form" method="post" enctype="multipart/form-data">
                                <?php endif; ?>
                                <div class="form-group">
                                    <label for="title">Titre : <b class="text-danger">*</b></label>
                                    <input class="form-control"  type="text" placeholder="Titre" name="title" id="title" value="<?= isset($service) ? htmlentities($service['title']) : '';?>" />
                                </div>

                                <div class="form-group">
                                    <label for="summary">Résumé :</label>
                                    <input class="form-control"  type="text" placeholder="Résumé" name="summary" id="summary" value="<?= isset($service) ? htmlentities($service['summary']) : '';?>" />
                                </div>

                                <div class="form-group">
                                    <label for="content">Contenu :</label>
                                    <textarea class="form-control" name="content" id="content" placeholder="Contenu" ><?= isset($service) ? htmlentities($service['content']) : '';?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="image">Image : <b class="text-danger">*</b></label>
                                    <input multiple class="form-control" type="file" name="media[]" id="image" value="<?//= $image; ?>"/>
                                    <?php if (isset($_GET['service-id']) AND !empty($service['name'])): ?>
                                        <?php $medias = explode(',', $service['name']);?>
                                        <?php foreach ($medias as $media):?>
                                            <img class="img-fluid py-4" src="../assets/img/<?= $media; ?>" alt="" />
                                        <?php endforeach;?>
                                        <input type="hidden" name="current_medias" value="<?= $service['name']; ?>" />
                                    <?php endif;?>
                                </div>

                                <div class="form-group">
                                    <label for="phone_number">Numero de telephone: <b class="text-danger">*</b></label>
                                    <input class="form-control"  type="number" name="phone_number" id="phone_number" value="<?= isset($service) ? htmlentities($service['phone_number']) : '';?>" />
                                </div>

                                <div class="form-group">
                                    <label for="opening_days">Jours d'ouverture: <b class="text-danger">*</b></label>
                                    <input class="form-control"  type="text" name="opening_days" id="opening_days" value="<?= isset($service) ? htmlentities($service['opening_days']) : '';?>" />
                                </div>

                                <div class="form-group">
                                    <label for="hours_from">Horraires d'ouverture: <b class="text-danger">*</b></label>
                                    <input class="form-control"  type="time" name="hours_from" id="hours_from" value="<?= isset($service) ? htmlentities($service['hours_from']) : '';?>" />
                                </div>

                                <div class="form-group">
                                    <label for="hours_to">Horraires de fermeture: <b class="text-danger">*</b></label>
                                    <input class="form-control"  type="time" name="hours_to" id="hours_to" value="<?= isset($service) ? htmlentities($service['hours_to']) : '';?>" />
                                </div>


                                <div class="form-group">
                                    <label for="is_published"> Publié ?</label>
                                    <select class="form-control" name="is_published" id="is_published">
                                        <?php if (isset($_GET['service-id'])):?>
                                            <?php if ($service['is_published'] == 0): ?>
                                                <option selected="selected" value="<?= $service['is_published'];?>">Non</option>
                                                <option value="1">Oui</option>
                                            <?php else: ?>
                                                <option value="0">Non</option>
                                                <option selected="selected" value="<?= $service['is_published'];?>">Oui</option>
                                            <?php endif;?>
                                        <?php else: ?>
                                            <option selected="selected" value="0" >Non</option>
                                            <option value="1" >Oui</option>
                                        <?php endif; ?>
                                    </select>
                                </div>











                                <div class="form-group">
                                    <label for="address">Addresse: <b class="text-danger">*</b></label>
                                    <input class="form-control"  type="text" name="address" id="address" value="<?= isset($service) ? htmlentities($service['address']) : '';?>" />
                                </div>

                                <div class="form-group">
                                    <label for="zip_code">Code postal: <b class="text-danger">*</b></label>
                                    <input class="form-control"  type="text" name="zip_code" id="zip_code" value="<?= isset($service) ? htmlentities($service['zip_code']) : '';?>" />
                                </div>

                                <div class="form-group">
                                    <label for="city">Ville: <b class="text-danger">*</b></label>
                                    <input class="form-control"  type="text" name="city" id="city" value="<?= isset($service) ? htmlentities($service['city']) : '';?>" />
                                </div>

                                <div class="form-group">
                                    <label for="country">Pays: </b></label>
                                    <input class="form-control"  type="text" placeholder="France" name="country" id="country" value="<?= isset($service) ? htmlentities($service['country']) : '';?>" />
                                </div>

                                <div class="form-group">
                                    <label for="location">Localisation: </label>
                                    <input class="form-control"  type="text" name="location" id="location" value="<?= isset($service) ? htmlentities($service['location']) : '';?>" />
                                </div>




                                <!-- Si $article existe, on ajoute un champ caché contenant l'id de l'article à modifier pour la requête UPDATE -->
                                <?php if (isset($_GET['service-id'])): ?>
                                    <input class="form-control" type="hidden" name="service-id" id="service-id" value="<?= $service['id']; ?>"/>
                                    <input class="form-control" type="hidden" name="address-id" id="address-id" value="<?= $service['address_id']; ?>"/>
                                <?php endif;?>

                                <!-- Si $article existe, on affiche un lien de mise à jour -->
                                <div class="text-right">
                                    <?php if (isset($_GET['service-id'])): ?>
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
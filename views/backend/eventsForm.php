<?php $title = 'Administration des evenement - !'; ?>
<?php ob_start(); ?>
<div class="container-fluid">
    <?php require '././partials/backend/header.php'; ?>
    <div class="row my-3 index-content">
        <?php require '././partials/backend/nav.php'; ?>
        <section class="col-9">

            <header class="pb-3">
                <h4><?= (isset($_GET['event-id'])) ? 'Modifier un evenement' : 'Ajouter un evenement' ;?></h4>
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
                    <?php if (isset($_GET['event-id'])): ?>
                        <form action="index.php?page=admin-events-form&event-id=<?= $event['id'];?>&action=edit" method="post" enctype="multipart/form-data">
                    <?php else: ?>
                        <form action="index.php?page=admin-events-form" method="post" enctype="multipart/form-data">
                    <?php endif; ?>

                            <div class="form-group">
                                <label for="title">Titre : <b class="text-danger">*</b></label>
                                <input class="form-control"  type="text" placeholder="Titre" name="title" id="title" value="<?= isset($event) ? htmlentities($event['title']) : '';?>" />
                            </div>

                            <div class="form-group">
                                <label for="summary">Résumé :</label>
                                <input class="form-control"  type="text" placeholder="Résumé" name="summary" id="summary" value="<?= isset($event) ? htmlentities($event['summary']) : '';?>" />
                            </div>

                            <div class="form-group">
                                <label for="content">Contenu :</label>
                                <textarea class="form-control" name="content" id="content" placeholder="Contenu" ><?= isset($event) ? htmlentities($event['content']) : '';?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="image">Image : <b class="text-danger">*</b></label>
                                <input multiple class="form-control" type="file" name="media[]" id="image" value="<?//= $image; ?>"/>
                                <?php if (isset($_GET['event-id']) AND !empty($event['name'])): ?>
                                    <?php $medias = explode(',', $event['name']);?>
                                    <?php foreach ($medias as $media):?>
                                        <img class="img-fluid py-4" src="../assets/img/<?= $media; ?>" alt="" />
                                    <?php endforeach;?>
                                    <input type="hidden" name="current_medias" value="<?= $event['name']; ?>" />
                                <?php endif;?>
                            </div>

                            <div class="form-group">
                                <label for="categories"> Catégorie <b class="text-danger">*</b></label>
                                <select multiple class="form-control" name="categories" id="categories" multiple="multiple">
                                    <?php foreach($categories as $key => $category): ?>
                                        <option value="<?= $category['id'];?>"
                                            <?php if (isset($_GET['event-id']) && $category['id'] == $event['category_id']): ?>
                                                selected="selected"
                                            <?php endif;?>
                                        ><?= $category['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="event_date">Date de l'evenement: <b class="text-danger">*</b></label>
                                <input class="form-control"  type="date" name="event_date" id="event_date" value="<?= isset($event) ? htmlentities($event['event_date']) : '';?>" />
                            </div>

                            <div class="form-group">
                                <label for="event_time">Heure de l'evenement: <b class="text-danger">*</b></label>
                                <input class="form-control"  type="time" name="event_time" id="event_time" value="<?= isset($event) ? htmlentities($event['event_time']) : '';?>" />
                            </div>

                            <div class="form-group">
                                <label for="phone_number">Numero: <b class="text-danger">*</b></label>
                                <input class="form-control"  type="text" name="phone_number" id="phone_number" value="<?= isset($event) ? htmlentities($event['phone_number']) : '';?>" />
                            </div>

                            <div class="form-group">
                                <label for="is_published"> Publié ?</label>
                                <select class="form-control" name="is_published" id="is_published">
                                    <?php if (isset($_GET['event-id'])):?>
                                        <?php if ($event['is_published'] == 0): ?>
                                            <option selected="selected" value="<?= $event['is_published'];?>">Non</option>
                                            <option value="1">Oui</option>
                                        <?php else: ?>
                                            <option value="0">Non</option>
                                            <option selected="selected" value="<?= $event['is_published'];?>">Oui</option>
                                        <?php endif;?>
                                    <?php else: ?>
                                        <option selected="selected" value="0" >Non</option>
                                        <option value="1" >Oui</option>
                                    <?php endif; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="published_at">Date de publication: <b class="text-danger">*</b></label>
                                <input class="form-control"  type="date" name="published_at" id="published_at" value="<?= isset($event) ? htmlentities($event['published_at']) : '';?>" />
                            </div>

                            <div class="form-group">
                                <label for="address">Addresse: <b class="text-danger">*</b></label>
                                <input class="form-control"  type="text" name="address" id="address" value="<?= isset($event) ? htmlentities($event['address']) : '';?>" />
                            </div>

                            <div class="form-group">
                                <label for="zip_code">Code postal: <b class="text-danger">*</b></label>
                                <input class="form-control"  type="text" name="zip_code" id="zip_code" value="<?= isset($event) ? htmlentities($event['zip_code']) : '';?>" />
                            </div>

                            <div class="form-group">
                                <label for="city">Ville: <b class="text-danger">*</b></label>
                                <input class="form-control"  type="text" name="city" id="city" value="<?= isset($event) ? htmlentities($event['city']) : '';?>" />
                            </div>

                            <div class="form-group">
                                <label for="country">Pays: </b></label>
                                <input class="form-control"  type="text" placeholder="France" name="country" id="country" value="<?= isset($event) ? htmlentities($event['country']) : '';?>" />
                            </div>

                            <div class="form-group">
                                <label for="location">Localisation: </label>
                                <input class="form-control"  type="text" name="location" id="location" value="<?= isset($event) ? htmlentities($event['location']) : '';?>" />
                            </div>

                            <?php if (isset($_GET['event-id'])): ?>
                                <input class="form-control" type="hidden" name="event_id" id="event_id" value="<?= $event['id']; ?>"/>
                                <input class="form-control" type="hidden" name="address-id" id="address-id" value="<?= $event['address_id']; ?>"/>
                            <?php endif;?>

                            <div class="text-right">
                                <?php if (isset($_GET['event-id'])): ?>
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

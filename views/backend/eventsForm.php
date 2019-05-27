<?php $title = 'Administration des evenement -  !'; ?>
<?php ob_start(); ?>
    <div class="container-fluid">
        <?php require '././partials/backend/header.php'; ?>
        <div class="row my-3 index-content">
            <?php require '././partials/backend/nav.php'; ?>
            <section class="col-9">
                <header class="pb-3">
                    <!-- Si $event existe, on affiche "Modifier" SINON on affiche "Ajouter" -->
                    <h4><?= (isset($_GET['event-id'])) ? 'Modifier un evenement' : 'Ajouter un evenement' ;?></h4>
                </header>
                <!-- on verifie si le tableau $warnings n'est pas vide pour afficher les massages a l'interieur d'une condition pour gagner en performance-->
<!--                --><?php //if (!empty($warnings)): ?>
<!--                    --><?php //foreach($warnings as $key => $warning): ?>
<!--                        <div class="bg-danger text-white p-2 mb-4">-->
<!--                            --><?//= $warning; ?>
<!--                        </div>-->
<!--                    --><?php //endforeach; ?>
<!--                --><?php //endif; ?>
                <ul class="nav nav-tabs justify-content-center nav-fill" role="tablist">
                    <?php if (isset($_GET['event-id'])): ?>
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
                        <!-- Si $event existe, chaque champ du formulaire sera pré-remplit avec les informations de l'evenemet -->
                        <?php if (isset($_GET['event-id'])): ?>
                        <form action="index.php?page=admin-events-form&event-id=<?= $event->getId();?>&action=edit" method="post" enctype="multipart/form-data">
                            <?php else: ?>
                            <form action="index.php?page=admin-events-form" method="post" enctype="multipart/form-data">
                                <?php endif; ?>
                                <div class="form-group">
                                    <label for="title">Titre : <b class="text-danger">*</b></label>
                                    <input class="form-control"  type="text" placeholder="Titre" name="title" id="title" value="<?= isset($event) ? htmlentities($event->getTitle()) : '';?>" />
                                </div>

                                <div class="form-group">
                                    <label for="summary">Résumé :</label>
                                    <input class="form-control"  type="text" placeholder="Résumé" name="summary" id="summary" value="<?= isset($event) ? htmlentities($event->getSummary()) : '';?>" />
                                </div>

                                <div class="form-group">
                                    <label for="content">Contenu :</label>
                                    <textarea class="form-control" name="content" id="content" placeholder="Contenu" ><?= isset($event) ? htmlentities($event->getContent()) : '';?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="event_date">Date de l'evenement: <b class="text-danger">*</b></label>
                                    <input class="form-control"  type="date" name="event_date" id="event_date" value="<?= isset($event) ? htmlentities($event->event_date) : '';?>" />
                                </div>

                                <div class="form-group">
                                    <label for="event_time">Heure de l'evenement: <b class="text-danger">*</b></label>
                                    <input class="form-control"  type="time" name="event_time" id="event_time" value="<?= isset($event) ? htmlentities($event->event_time) : '';?>" />
                                </div>

                                <div class="form-group">
                                    <label for="numero">Numero: <b class="text-danger">*</b></label>
                                    <input class="form-control"  type="text" name="numero" id="numero" value="<?= isset($event) ? htmlentities($event->phone_number) : '';?>" />
                                </div>

                                <div class="form-group">
                                    <label for="is_published"> Publié ?</label>
                                    <select class="form-control" name="is_published" id="is_published">
                                        <?php if (isset($_GET['event-id'])):?>
                                            <?php if ($event->is_published == 0): ?>
                                                <option selected="selected" value="<?= $event->is_published;?>">Non</option>
                                                <option value="1">Oui</option>
                                            <?php else: ?>
                                                <option value="0">Non</option>
                                                <option selected="selected" value="<?= $event->is_published;?>">Oui</option>
                                            <?php endif;?>
                                        <?php else: ?>
                                            <option selected="selected" value="0" >Non</option>
                                            <option value="1" >Oui</option>
                                        <?php endif; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="published_at">Date de publication: <b class="text-danger">*</b></label>
                                    <input class="form-control"  type="date" name="published_at" id="published_at" value="<?= isset($event) ? htmlentities($event->published_at) : '';?>" />
                                </div>



                                <div class="form-group">
                                    <label for="image">Image :</label>
                                    <input class="form-control" type="file" name="image" id="image" value="<?= $image; ?>"/>
                                    <?php if (isset($_GET['article_id']) AND !empty($article['image'])): ?>
                                        <img class="img-fluid py-4" src="../assets/img/<?= $article['image']; ?>" alt="" />
                                        <input type="hidden" name="current-image" value="<?= $article['image'] ?>" />
                                    <?php endif;?>
                                </div>

                                <div class="form-group">
                                    <label for="categories"> Catégorie <b class="text-danger">*</b></label>
                                    <select multiple class="form-control" name="categories[]" id="categories" multiple="multiple">
                                        <?php foreach($categories as $key => $category): ?>
                                            <option value="<?= $category['id'];?>"
                                                <?php foreach($selected as $keys => $select): ?>
                                                    <?php if (isset($_GET['article_id']) AND in_array($category['id'],$select)): ?>
                                                        selected="selected"
                                                        <?php break; ?>
                                                    <?php endif;?>
                                                <?php endforeach; ?>
                                            ><?= $category['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <!-- Si $article existe, on ajoute un champ caché contenant l'id de l'article à modifier pour la requête UPDATE -->
                                <?php if (isset($_GET['article_id'])): ?>
                                    <div class="form-group">
                                        <input class="form-control" type="hidden" name="article_id" id="article_id" value="<?= $article['id']; ?>"/>
                                    </div>
                                <?php endif;?>

                                <!-- Si $article existe, on affiche un lien de mise à jour -->
                                <div class="text-right">
                                    <?php if (isset($_GET['article_id'])): ?>
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

<!--                    --><?php //if (isset($_GET['article_id'])): ?>
<!--                        <div class="tab-pane container-fluid " id="images" role="tabpanel">-->
<!--                            <h5 class="mt-4">Ajouter une image :</h5>-->
<!--                            <form action="article_form.php?article_id=8&action=edit" method="post" enctype="multipart/form-data">-->
<!--                                <div class="form-group">-->
<!--                                    <label for="caption">Légende :</label>-->
<!--                                    <input class="form-control" type="text" placeholder="Légende" name="caption" id="caption" />-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="image">Fichier :</label>-->
<!--                                    <input class="form-control" type="file" name="image" id="image" />-->
<!--                                </div>-->
<!--                                <input type="hidden" name="article_id" value="8" />-->
<!--                                <div class="text-right">-->
<!--                                    <input class="btn btn-success" type="submit" name="add_image" value="Enregistrer" />-->
<!--                                </div>-->
<!--                            </form>-->
<!--                            <div class="row">-->
<!--                                <h5 class="col-12 pb-4">Liste des images :</h5>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    --><?php //endif;?>
                </div>
            </section>
        </div>
    </div>
<?php $content = ob_get_clean(); ?>
<?php require 'layout.php'; ?>
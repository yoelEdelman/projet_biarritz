<?php $title = 'Administration des catégories - !'; ?>
<?php ob_start(); ?>
<div class="container-fluid">
    <?php require './partials/backend/header.php'; ?>
    <div class="row my-3 index-content">
        <?php require './partials/backend/nav.php'; ?>
        <section class="col-9">

            <header class="pb-3">
                <h4><?= (isset($_GET['category-id'])) ? 'Modifier une catégorie' : 'Ajouter une catégorie'; ?></h4>
            </header>

            <?php if (!empty($errors)): ?>
                <?php foreach($errors as $key => $error): ?>
                    <div class="bg-danger text-white p-2 mb-4">
                        <?= $error; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if (isset($_GET['category-id'])): ?>
                <form action="index.php?page=admin-categories-form&category-id=<?= $category['id'];?>&action=edit" method="post" enctype="multipart/form-data">
            <?php else: ?>
                <form action="index.php?page=admin-categories-form" method="post" enctype="multipart/form-data">
            <?php endif; ?>

                    <div class="form-group">
                        <label for="name">Nom : <b class="text-danger">*</b></label>
                        <input class="form-control"  type="text" placeholder="Nom" name="name" id="name" value="<?= isset($category) ? htmlentities($category['name']) : '';?>"/>
                    </div>

                    <?php if (isset($_GET['category-id'])): ?>
                        <div class="form-group">
                            <input class="form-control" type="hidden" name="category-id" id="category_id" value="<?= $category['id'];?>"/>
                        </div>
                    <?php endif;?>

                    <div class="text-right">
                        <?php if (isset($_GET['category-id'])): ?>
                            <p class="text-danger">* champs requis</p>
                            <input class="btn btn-success" type="submit" name="update" value="Mettre a jour" />
                        <?php else: ?>
                            <p class="text-danger">* champs requis</p>
                            <input class="btn btn-success" type="submit" name="save" value="Enregistrer" />
                        <?php endif; ?>
                    </div>
                </form>
        </section>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require 'layout.php'; ?>

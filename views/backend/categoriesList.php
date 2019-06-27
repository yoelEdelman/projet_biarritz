<?php $title = 'Administration des catégories - !'; ?>
<?php ob_start(); ?>
<div class="container-fluid">
    <?php require '././partials/backend/header.php'; ?>
    <div class="row my-3 index-content">
        <?php require '././partials/backend/nav.php'; ?>
        <section class="col-9">

            <header class="pb-4 d-flex justify-content-between">
                <h4>Liste des catégories</h4>
                <a class="btn btn-primary" href="index.php?page=admin-categories-form">Ajouter une catégorie</a>
            </header>

            <?php if (!empty($_SESSION['success'])): ?>
                <?php foreach($_SESSION['success'] as $key => $success): ?>
                    <div class="bg-success text-white p-2 mb-4">
                        <?= $success; ?>
                    </div>
                <?php endforeach; ?>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($categories as $key => $category): ?>
                    <tr>
                        <th><?= $category['id'];?></th>
                        <td><?= $category['name'];?></td>
                        <td>
                            <a href="index.php?page=admin-categories-form&category-id=<?= $category['id'];?>&action=edit" class="btn btn-warning">Modifier</a>
                            <a onclick="return confirm('Are you sure?')" href="index.php?page=admin-categories-list&category-id=<?= $category['id'];?>&action=delete" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require 'layout.php'; ?>


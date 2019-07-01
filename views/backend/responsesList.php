<?php $title = 'Administration des reponses - !'; ?>
<?php ob_start(); ?>
<div class="container-fluid">
    <?php require '././partials/backend/header.php'; ?>
    <div class="row my-3 index-content">
        <?php require '././partials/backend/nav.php'; ?>
        <section class="col-9">

            <header class="pb-4 d-flex justify-content-between">
                <h4>Liste des reponses</h4>
                <a class="btn btn-primary" href="index.php?page=admin-responses-form">Ajouter une reponse</a>
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
                    <th>Reponse</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($responses as $response): ?>
                    <tr>
                        <th><?= $response['id'];?></th>
                        <td><?= $response['answer'];?></td>
                        <td>
                            <a href="index.php?page=admin-responses-form&response-id=<?= $response['id'];?>&action=edit" class="btn btn-warning">Modifier</a>
                            <a onclick="return confirm('Are you sure?')" href="index.php?page=admin-responses-list&response-id=<?= $response['id'];?>&action=delete" class="btn btn-danger">Supprimer</a>
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

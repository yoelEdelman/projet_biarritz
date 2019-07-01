<?php $title = 'Administration des services -  !'; ?>
<?php ob_start(); ?>
<div class="container-fluid">
    <?php require '././partials/backend/header.php'; ?>
    <div class="row my-3 index-content">
        <?php require '././partials/backend/nav.php'; ?>
        <section class="col-9">
            <header class="pb-4 d-flex justify-content-between">
                <h4>Liste des services</h4>
                <a class="btn btn-primary" href="index.php?page=admin-services-form">Ajouter un service</a>
            </header>

            <?php if (!empty($_SESSION['success'])): ?>
                <?php foreach($_SESSION['success'] as $key => $success): ?>
                    <div class="bg-success text-white p-2 mb-4">
                        <?= $success; ?>
                    </div>
                <?php endforeach; ?>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>

            <?php if (!empty($errors)): ?>
                <?php foreach($errors as $key => $error): ?>
                    <div class="bg-danger text-white p-2 mb-4">
                        <?= $error; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Titre</th>
                    <th>Publié</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($services as $service): ?>
                    <tr>
                        <th><?= $service['id'];?></th>
                        <td><?= $service['title'];?></td>
                        <td><?= ($service['is_published'] == 0) ? 'non' : 'oui' ;?></td>
                        <td>
                            <a href="index.php?page=admin-services-form&service-id=<?= $service['id'];?>&action=edit" class="btn btn-warning">Modifier</a>
                            <a onclick="return confirm('Are you sure?')" href="index.php?page=admin-services-list&service-id=<?= $service['id'];?>&action=delete" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php if (isset($_GET['service-id']) AND !empty($service['name'])): ?>
                <input type="hidden" name="current-medias" value="<?= $service['name']; ?>" />
            <?php endif;?>
        </section>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require 'layout.php'; ?>


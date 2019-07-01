<?php $title = 'Administration des utilisateurs - !'; ?>
<?php ob_start(); ?>
<div class="container-fluid">
    <?php require '././partials/backend/header.php'; ?>
    <div class="row my-3 index-content">
        <?php require '././partials/backend/nav.php'; ?>
        <section class="col-9">

            <header class="pb-4 d-flex justify-content-between">
                <h4>Liste des utilisateurs</h4>
                <a class="btn btn-primary" href="index.php?page=admin-users-form">Ajouter un utilisateur</a>
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
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Admin</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($users as $key => $user): ?>
                    <tr>
                        <th><?= $user['id']; ?></th>
                        <td><?= $user['first_name']; ?></td>
                        <td><?= $user['last_name']; ?></td>
                        <td><?= $user['email']; ?></td>
                        <td><?= ($user['is_admin'] == 0) ? 'non' : 'oui' ; ?></td>
                        <td>
                            <a href="index.php?page=admin-bills-form&user-id=<?= $user['id']; ?>" class="btn btn-info">Assigner une facture</a>
                            <a href="index.php?page=admin-users-form&user-id=<?= $user['id']; ?>&action=edit" class="btn btn-warning">Modifier</a>
                            <a onclick="return confirm('Are you sure?')" href="index.php?page=admin-users-list&user-id=<?= $user['id']; ?>&action=delete" class="btn btn-danger">Supprimer</a>
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

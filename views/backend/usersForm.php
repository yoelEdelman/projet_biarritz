<?php $title = 'Administration des utilisateurs - !'; ?>
<?php ob_start(); ?>
<div class="container-fluid">
    <?php require '././partials/backend/header.php'; ?>
    <div class="row my-3 index-content">
        <?php require '././partials/backend/nav.php'; ?>
        <section class="col-9">

            <header class="pb-3">
                <h4><?= (isset($_GET['user-id'])) ? 'Modifier un utilisateur' : 'Ajouter un utilisateur' ;?></h4>
            </header>

            <?php if (!empty($errors)): ?>
                <?php foreach($errors as $key => $error): ?>
                    <div class="bg-danger text-white p-2 mb-4">
                        <?= $error; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if (isset($_GET['user-id'])): ?>
                <form action="index.php?page=admin-users-form&user-id=<?= $user['id'];?>&action=edit" method="post" enctype="multipart/form-data">
            <?php else: ?>
                <form action="index.php?page=admin-users-form" method="post" enctype="multipart/form-data">
            <?php endif; ?>

                    <div class="form-group">
                        <label for="last_name">Nom de famille : <b class="text-danger">*</b></label>
                        <input class="form-control"  type="text" placeholder="Nom de famille" name="last_name" id="last_name" value="<?= isset($user) ? htmlentities($user['last_name']) : '';?>"/>
                    </div>

                    <div class="form-group">
                        <label for="first_name">Prénom : <b class="text-danger">*</b></label>
                        <input class="form-control"  type="text" placeholder="Prénom" name="first_name" id="first_name" value="<?= isset($user) ? htmlentities($user['first_name']) : '';?>"/>
                    </div>

                    <div class="form-group">
                        <label for="email">Email : <b class="text-danger">*</b></label>
                        <input class="form-control"  type="email" placeholder="Email" name="email" id="email" value="<?= isset($user) ? htmlentities($user['email']) : '';?>"/>
                    </div>

                    <div class="form-group">
                        <label for="dob">Date de naissance : <b class="text-danger">*</b></label>
                        <input class="form-control" type="date" placeholder="Date de naissance" name="dob" id="dob" value="<?= isset($user) ? htmlentities($user['dob']) : '';?>"/>
                    </div>

                    <div class="form-group">
                        <label for="home-number">Numero fixe :</label>
                        <input class="form-control" type="text" placeholder="Numero fixe" name="home_number" id="home-number" value="<?= isset($user) ? htmlentities($user['home_number']) : '';?>"/>
                    </div>

                    <div class="form-group">
                        <label for="mobile-number">Numero mobile :</label>
                        <input class="form-control" type="text" placeholder="Numero mobile" name="mobile_number" id="mobile-number" value="<?= isset($user) ? htmlentities($user['mobile_number']) : '';?>"/>
                    </div>

                    <div class="form-group">
                        <label for="address">Addresse: <b class="text-danger">*</b></label>
                        <input class="form-control"  type="text" name="address" id="address" value="<?= isset($user) ? htmlentities($user['address']) : '';?>" />
                    </div>

                    <div class="form-group">
                        <label for="zip_code">Code postal: <b class="text-danger">*</b></label>
                        <input class="form-control"  type="text" name="zip_code" id="zip_code" value="<?= isset($user) ? htmlentities($user['zip_code']) : '';?>" />
                    </div>

                    <div class="form-group">
                        <label for="city">Ville: <b class="text-danger">*</b></label>
                        <input class="form-control"  type="text" name="city" id="city" value="<?= isset($user) ? htmlentities($user['city']) : '';?>" />
                    </div>

                    <div class="form-group">
                        <label for="country">Pays: </b></label>
                        <input class="form-control"  type="text" placeholder="France" name="country" id="country" value="<?= isset($user) ? htmlentities($user['country']) : '';?>" />
                    </div>

                    <div class="form-group">
                        <label for="is_admin"> Admin ?</label>
                        <select class="form-control" name="is_admin" id="is_admin">
                            <?php if (isset($_GET['user-id'])): ?>
                                <?php if ($user['is_admin'] == 0): ?>
                                    <option selected="selected" value="<?= $user['is_admin']; ?>" >Non</option>
                                    <option value="1">Oui</option>
                                <?php else: ?>
                                    <option value="0" >Non</option>
                                    <option selected="selected" value="<?= $user['is_admin']; ?>">Oui</option>
                                <?php endif;?>
                            <?php else: ?>
                                <option selected="selected" value="0" >Non</option>
                                <option value="1" >Oui</option>
                            <?php endif; ?>
                        </select>
                    </div>

                    <?php if (isset($_GET['user-id'])): ?>
                        <div class="form-group">
                            <input class="form-control" type="hidden" name="user-id" id="user-id" value="<?= $user['id']; ?>"/>
                            <input class="form-control" type="hidden" name="address-id" id="address-id" value="<?= $user['address_id']; ?>"/>
                        </div>
                    <?php endif;?>

                    <div class="text-right">
                        <?php if (isset($_GET['user-id'])): ?>
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


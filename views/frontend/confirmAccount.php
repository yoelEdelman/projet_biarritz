<?php $title = 'confirmation de compte'; ?>
<?php ob_start(); ?>
<main>
    <?php require_once 'partials/frontend/logo.php';?>
    <?php require_once 'partials/frontend/nav.php';?>
    <section class="confirm-account">
        <div class="confirm-account-form-container">
            <form action="index.php?page=confirm-account" method="post" enctype="multipart/form-data">

                <p>Vérifier que toutes vos informations sont correctes</p>

                <div class="form-organiser">
                    <div class="inputs-container">
                        <label for="last_name">Nom de famille :</label>
                        <input class="form-control"  type="text" placeholder="Nom de famille" name="last_name" id="last_name" value="<?= isset($accountDetails) ? htmlentities($accountDetails['last_name']) : '';?>" disabled="disabled"/>
                    </div>

                    <div class="inputs-container">
                        <label for="first_name">Prénom :</label>
                        <input class="form-control"  type="text" placeholder="Prénom" name="first_name" id="first_name" value="<?= isset($accountDetails) ? htmlentities($accountDetails['first_name']) : '';?>" disabled="disabled"/>
                    </div>

                    <div class="inputs-container">
                        <label for="email">Email :</label>
                        <input class="form-control"  type="email" placeholder="Email" name="email" id="email" value="<?= isset($accountDetails) ? htmlentities($accountDetails['email']) : '';?>" disabled="disabled"/>
                    </div>

                    <div class="inputs-container">
                        <label for="dob">Date de naissance :</label>
                        <input class="form-control" type="date" placeholder="Date de naissance" name="dob" id="dob" value="<?= isset($accountDetails) ? htmlentities($accountDetails['dob']) : '';?>" disabled="disabled"/>
                    </div>

                    <div class="inputs-container">
                        <label for="home-number">Numero fixe :</label>
                        <input class="form-control" type="text" placeholder="Numero fixe" name="home_number" id="home-number" value="<?= isset($accountDetails) ? htmlentities($accountDetails['home_number']) : '';?>" disabled="disabled"/>
                    </div>
                </div>
                
                <div class="form-organiser">
                    <div class="inputs-container">
                        <label for="mobile-number">Numero mobile :</label>
                        <input class="form-control" type="text" placeholder="Numero mobile" name="mobile_number" id="mobile-number" value="<?= isset($accountDetails) ? htmlentities($accountDetails['mobile_number']) : '';?>" disabled="disabled"/>
                    </div>

                    <div class="inputs-container">
                        <label for="address">Addresse:</label>
                        <input class="form-control"  type="text" name="address" id="address" value="<?= isset($accountDetails) ? htmlentities($accountDetails['address']) : '';?>" disabled="disabled"/>
                    </div>

                    <div class="inputs-container">
                        <label for="zip_code">Code postal:</label>
                        <input class="form-control"  type="text" name="zip_code" id="zip_code" value="<?= isset($accountDetails) ? htmlentities($accountDetails['zip_code']) : '';?>" disabled="disabled"/>
                    </div>

                    <div class="inputs-container">
                        <label for="city">Ville:</label>
                        <input class="form-control"  type="text" name="city" id="city" value="<?= isset($accountDetails) ? htmlentities($accountDetails['city']) : '';?>" disabled="disabled"/>
                    </div>

                    <div class="inputs-container">
                        <label for="country">Pays:</label>
                        <input class="form-control"  type="text" placeholder="France" name="country" id="country" value="<?= isset($accountDetails) ? htmlentities($accountDetails['country']) : '';?>" disabled="disabled"/>
                    </div>
                </div>
                
                <?php if (!empty($errors)): ?>
                    <?php foreach($errors as $key => $error): ?>
                        <div class="error-message">
                            <?= $error; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <div class="submit-inputs-container">
                    <input type="submit" name="pass" value="passer">
                </div>

                <div class="submit-inputs-container">
                    <input type="submit" name="confirm" value="confirmer">
                </div>
            </form>
        </div>
    </section>
    <?php require_once 'partials/frontend/footer.php';?>
</main>
<?php $content = ob_get_clean(); ?>
<?php require 'layout.php'; ?>

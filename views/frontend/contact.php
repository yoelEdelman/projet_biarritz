<?php $title = 'contact'; ?>
<?php ob_start(); ?>
<main>
    <?php require_once 'partials/frontend/logo.php';?>
    <?php require_once 'partials/frontend/nav.php';?>
    <section class="contact">
        <section>
            <ul class="tabs">
                <li class="active"><a href="#signal-problem">signaler un probleme</a></li>
                <li><a href="#contact-us">contacter</a></li>
            </ul>
            <div class="tabs-content">
                <div class="tab-content active" id="signal-problem">
                    <form id="problem-form" action="index.php?page=contact" method="post" enctype="multipart/form-data">
                        <div>
                            <label for=""></label>
                            <input type="text" placeholder="adresse" name="" id="address">
                        </div>

                        <div>
                            <label for=""></label>
                            <input type="email" placeholder="email" name="" id="email">
                        </div>

                        <div>
                            <label for=""></label>
                            <select name="" id="objects">
                                <option value="" disabled selected>Select your option</option>
                                <?php foreach($objects as $key => $object): ?>
                                    <option value="<?= $object['id'];?>"><?= $object['object_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div>
                            <label for=""></label>
                            <select name="" id="reasons">
                                <option value="" disabled selected>Select your option</option>
                            </select>
                        </div>

                        <div>
                            <label for=""></label>
                            <textarea placeholder="Description de la demande…" name="" id="description"></textarea>
                        </div>

                        <div>
                            <input id="submit-problem-form" type="submit" name="" value="envoyer">
                        </div>
                    </form>
                </div>
                <div class="tab-content" id="contact-us">
                    <form id="contact-form" action="index.php?page=contact" method="post" enctype="multipart/form-data">
                        <div class="double-form-group">
                            <div>
                                <label for=""></label>
                                <input type="text" placeholder="Nom" name="" id="name">
                            </div>

                            <div>
                                <label for=""></label>
                                <input type="text" placeholder="Prénom" name="" id="first-name">
                            </div>
                        </div>

                        <div class="double-form-group">
                            <div>
                                <label for=""></label>
                                <input type="tel" placeholder="Tel ." name="" id="phone-number">
                            </div>

                            <div>
                                <label for=""></label>
                                <input type="email" placeholder="Adresse mail" name="" id="email-contact-form">
                            </div>
                        </div>

                        <div>
                            <label for=""></label>
                            <textarea placeholder="Description de la demande…" name="" id="description-contact-form"></textarea>
                        </div>

                        <div>
                            <input id="submit-contact-form" type="submit" name="" value="envoyer">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </section>
    <?php require_once 'partials/frontend/footer.php';?>
</main>
<?php $content = ob_get_clean(); ?>
<?php require 'layout.php'; ?>

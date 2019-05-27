<?php $title = ''; ?>
<?php ob_start(); ?>
    <main>
        <?php require_once 'partials/frontend/logo.php';?>

        <?php require_once 'partials/frontend/nav.php';?>
        <section class="contact">
            <section>
                <ul class="tabs">
                    <li class="active"><a href="#problem">signaler un probleme</a></li>
                    <li><a href="#mentions">contacter</a></li>
                </ul>
                <div class="tabs-content">
                    <div class="tab-content active" id="problem">
                        <form action="">
                            <div>
                                <label for=""></label>
                                <input type="text" placeholder="adresse" name="" id="">
                            </div>

                            <div>
                                <label for=""></label>
                                <input type="email" placeholder="email" name="" id="">
                            </div>

                            <div>
                                <label for=""></label>
                                <select name="" id="">
                                    <option value="" disabled selected>Select your option</option>
                                </select>
                            </div>

                            <div>
                                <label for=""></label>
                                <select name="" id="">
                                    <option value="" disabled selected>Select your option</option>
                                </select>
                            </div>

                            <div>
                                <label for=""></label>
                                <textarea placeholder="Description de la demande…" name="" id=""></textarea>
                            </div>

                            <div>
                                <input type="submit" name="" value="envoyer">
                            </div>
                        </form>
                    </div>
                    <div class="tab-content" id="mentions">
                        <form action="">
                            <div class="double-form-group">
                                <div>
                                    <label for=""></label>
                                    <input type="text" placeholder="Nom" name="" id="">
                                </div>

                                <div>
                                    <label for=""></label>
                                    <input type="text" placeholder="Prénom" name="" id="">
                                </div>
                            </div>

                            <div class="double-form-group">
                                <div>
                                    <label for=""></label>
                                    <input type="tel" placeholder="Tel ." name="" id="">
                                </div>

                                <div>
                                    <label for=""></label>
                                    <input type="email" placeholder="Adresse mail" name="" id="">
                                </div>
                            </div>

                            <div>
                                <label for=""></label>
                                <textarea placeholder="Description de la demande…" name="" id=""></textarea>
                            </div>

                            <div>
                                <input type="submit" name="" value="envoyer">
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </section>
        <?php require_once 'partials/frontend/footer.php';?>
    </main>

<script src="../../assets/js/tabs.js"></script>
<script src="../../assets/js/menu-burger.js"></script>

<script>
    // let test = document.querySelectorAll('.double-form-group')
    // for (let i = 0; i < test.length; i++){
    //     test[i].classList.remove('double-form-group')
    // }
</script>
<?php $content = ob_get_clean(); ?>
<?php require 'layout.php'; ?>



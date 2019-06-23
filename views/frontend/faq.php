<?php $title = ''; ?>
<?php ob_start(); ?>
    <main>
        <?php require_once 'partials/frontend/logo.php';?>

        <?php require_once 'partials/frontend/nav.php';?>
        <section class="faq">
            <h2>FAQ</h2>
                <?php foreach($categories as $key => $category): ?>
                    <button class="collapsible"><?= $category['name']; ?></button>
                    <div class="content">
                    <?php foreach($faqs as $key => $faq): ?>
                        <?php if ($category['id'] == $faq['category_id']): ?>
                            <button class="collapsible"><?= $faq['question']; ?></button>
                            <div class="content">
                                <p><?= $faq['answer']; ?></p>
                            </div>
<!--                        --><?php //else:?>
<!--                            <p>Il n'y a pas de question pour le moment</p>-->
<!--                        --><?php //break ;?>
                        <?php endif;?>
                    <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
        </section>
        <?php require_once 'partials/frontend/footer.php';?>

    </main>
    <script src="../../assets/js/menu-burger.js"></script>

    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.maxHeight){
                    content.style.maxHeight = null;
                } else {
                    content.style.maxHeight = content.scrollHeight*2 + "px";
                }
            });
        }
    </script>

<?php $content = ob_get_clean(); ?>
<?php require 'layout.php'; ?>
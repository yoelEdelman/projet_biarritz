<?php $title = 'faq'; ?>
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
                        <button class="collapsible to-upper"><?= $faq['question']; ?></button>
                        <div class="content">
                            <p class="to-lower"><?= $faq['answer']; ?></p>
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
<?php $content = ob_get_clean(); ?>
<?php require 'layout.php'; ?>
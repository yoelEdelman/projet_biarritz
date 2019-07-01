<!-- slider container -->
<section id="slider-container">
    <!-- arrows -->
    <div id="arrows-wrapper" class="">
        <!-- previous arrow -->
        <i class="fas fa-chevron-left slider-arrow center_y" id="arrow-prev"></i>
        <!-- dots -->
        <div id="dots-wrapper" class="center_x">
            <!-- dot navigation for each slide -->
            <?php foreach ($events as $event) :?>
                <i class="fal dot-navigation"></i>
            <?php endforeach; ?>
        </div>
        <!-- next arrow -->
        <i class="fas fa-chevron-right slider-arrow center_y" id="arrow-next"></i>
    </div>
    <?php foreach ($events as $event) :?>
        <?php $medias = explode(',', $event['name']);?>
        <div class="slide fade" style="background-image: url(<?= 'assets/img/'.$medias[0];; ?>); ">
            <!-- slide image -->
            <div>
                <h3><?= $event['category_name']; ?></h3>
                <h2><?= $event['title']; ?></h2>
                <p><?= $event['summary']; ?></p>
                <a href="index.php?page=events">En savoir plus</a>
            </div>

        </div>
    <?php endforeach; ?>
</section>
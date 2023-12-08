<div class="overlay">
    <div class="overlay-container">
        <div class="overlay-screen-container">
            <img class="overlay-screen" src="http://localhost/motaphoto/wp-content/themes/motaphoto/assets/images/screen.svg" alt="screen-icon">
        </div>
        <a href="<?php the_permalink() ?>">
            <img class="overlay-eye" src="http://localhost/motaphoto/wp-content/themes/motaphoto/assets/images/eye.svg" alt="eye-icon">
        </a>
        <div class="overlay-photo-infos">
            <div class="overlay-reference">
                <?= get_field('reference') ?>
            </div>
            <div class="overlay-category">
                <?php overlay_taxonomy('categorie'); ?>
            </div>
        </div>
    </div>
</div>
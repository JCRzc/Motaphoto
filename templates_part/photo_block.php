<?php
$related_categories = array_map(
    function ($term) {
        return $term->term_id;
    },
    get_the_terms(get_post(), 'categorie')
);

$related_photos_query_args = array(
    'posts_per_page' => 2,
    'orderby' => 'rand',
    'tax_query' => array(
        array(
            'terms' => $related_categories,
            'taxonomy' => 'categorie',
        ),
    ),
);

$related_photos_query = new WP_Query($related_photos_query_args);
?>

<h3 class="photo-block-p">Vous aimerez aussi</h3>
<div class="related-photo">
    <?php while ($related_photos_query->have_posts()) : $related_photos_query->the_post(); ?>
        <div class="related-photo-container">
            <?php
            the_post_thumbnail('large', array(
                'class' => 'post-photo-block',
                'style' => 'height: 100%; width: 100%; object-fit:cover;'
            ));
            get_template_part('templates_part/overlay');
            ?>
        </div>
    <?php endwhile; ?>
</div>

<?php wp_reset_postdata(); ?>

<div class="div-post-contact-button" type="button">
    <a href="http://localhost/motaphoto/">
        <button class="post-contact-button">Toutes les photos</button>
    </a>
</div>
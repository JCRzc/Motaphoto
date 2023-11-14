<?php
/*
Template Name: Home page
*/
?>
<?php get_header(); ?>

<!-- Hero  -->
<section class="hero-section">
    <?php
    $random_photo = new WP_Query(
        array(
            'post_type' => 'photo',
            'post_per_page' => 1,
            'orderby' => 'rand',
        )
    );
    if ($random_photo->have_posts()) :
        $random_photo->the_post();
        if (has_post_thumbnail()) : ?>
            <div class="hero">
                <h1 class="hero-title">PHOTOGRAPHE EVENT</h1>
                <?php
                the_post_thumbnail('large', ['style' => 'width: 100%; height: 100vh; object-fit: cover;']);
                ?>
            </div>
    <?php endif;
    endif;
    wp_reset_postdata();
    ?>
</section>

<!-- Filters and sort  -->
<?php
get_template_part('templates_part/filters-and-sort');
?>

<!-- Photos list  -->
<?php
$loop = new WP_Query(
    array(
        'post_type' => 'photo',
        'post_per_page' => 12,
        'orderby' => 'date',
        'order' => 'DESC',
        'paged' => 1,
    )
);
if ($loop->have_posts()) : ?>
    <div class="photo-list" id="photo-list">
        <?php while ($loop->have_posts()) :
            $loop->the_post();
            get_template_part('templates_part/photos-list');
        endwhile; ?>
    </div>
<?php endif;
wp_reset_postdata(); ?>

<!-- Pagination  -->
<div class="load-more">
    <a href="##" class="load-more-button" id="load-more-button">Charger plus</a>
</div>

<?php get_footer(); ?>